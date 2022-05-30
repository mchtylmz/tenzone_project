<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Store;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        if (!$carts = session('carts')) {
            return redirect()->route('store');
        }

        $products = [];
        $total = 0;
        foreach ($carts as $cart) {
            $products[] = $product = Store::find($cart);
            $total += $product->price;
        }

        return view('site.cart', [
            'products' => $products,
            'total' => $total
        ]);
    }

    public function add($product_id)
    {
        session()->push('carts', $product_id);
        return redirect()->route('cart');
    }

    public function delete($product_id)
    {
        if (!$carts = session('carts')) {
            return redirect()->route('cart');
        }

        $new_cart = [];
        foreach ($carts as $cart) {
            if ($product_id == $cart) {
                continue;
            }
            $new_cart[] = $cart;
        }

        session()->put('carts', $new_cart);
        return redirect()->route('cart');
    }


    public function checkout()
    {
        // kart bilgilerini alıyoruz.
        $holder_name = request()->cardname;
        $card_number = request()->cardnumber;
        $month = request()->expmonth;
        $year = request()->expyear;
        $cvc = request()->cvc;

        $total = 0;
        $products = [];
        foreach (session('carts') as $cart) {
            $product = Store::find($cart);
            $products[] = [
                'title' => $product->title,
                'category' => $product->category,
                'image' => $product->image,
                'price' => $product->price,
            ];
            $total += $product->price ?? 0;
        }

        // örnek olarak karttan 1$ çekeceğiz. stripe dokümanında belirtildiği üzere karttan çekilecek değeri 100 ile çarpmamız gerekiyor.
        $currency = 'GBP';
        $price = $total * 100;

        // stripe secret_key bilgisini config'den alıyoruz.
        $stripe = new \Stripe\StripeClient(
            config('stripe.secret_key')
        );

        try {
            // kart bilgilerini kullanarak stripe tarafında bir token elde ediyoruz.
            $stripeToken = $stripe->tokens->create([
                'card' => [
                    'number' => $card_number,
                    'exp_month' => $month,
                    'exp_year' => $year,
                    'cvc' => $cvc
                ]
            ]);

            // müşteri adını ve kart bilgisini stripe tarafında kaydediyoruz.
            $customer = $stripe->customers->create([
                'name' => $holder_name,
                'source' => $stripeToken['id']
            ]);

            // stripe tarafında bir setupIntent oluşturuyoruz.
            // setupIntent işlemi sonucunda stripe, girilen kartın 3ds gerektirip gerektirmediğiyle ilgili bir doğrulama yapıyor.
            // stripe'ın ödeme sonucunu iletmesi için 'return_url' parametresini belirtiyoruz.
            // 3ds ekranı sonrası para çekme işleminde kullanmak için 'metadata' kısmında fiyat ve para birimi değerlerini gönderiyoruz.
            $setupIntent = $stripe->setupIntents->create([
                'customer' => $customer['id'],
                'description' => 'test',
                'payment_method' => $stripeToken['card']['id'],
                'payment_method_types' => ['card'],
                'payment_method_options' => [
                    'card' => [
                        'request_three_d_secure' => 'any'
                    ]
                ],
                'confirm' => true,
                'return_url' => route('cart.response'),
                'metadata' => [
                    'price' => $price,
                    'currency' => $currency
                ]
            ]);
        }
            // hata oluşması durumunda hata mesajını json olarak ekrana yazdırıyoruz.
        catch (\Stripe\Exception\ApiErrorException $e) {
            return redirect()->route('cart.response')->with([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }

        // eğer doğrulama sonucunda ödeme normal (3ds olmadan) gerçekleşecekse direkt olarak para çekme işlemini yapıyoruz.
        if ($setupIntent['status'] == 'succeeded') {
            try {
                $charge = $stripe->charges->create([
                    'customer' => $setupIntent['customer'],
                    'amount' => $price,
                    'currency' => $currency,
                    'description' => 'test',
                    'source' => $stripeToken['card']['id']
                ]);
            }
                // hata oluşması durumunda hata mesajını json olarak ekrana yazdırıyoruz.
            catch (\Stripe\Exception\ApiErrorException $e) {
                return redirect()->route('cart.response')->with([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ]);
            }

            // para çekme işleminde bir sorun olursa ekrana hata yazdırıyoruz.
            if ($charge['status'] != 'succeeded') {
                return redirect()->route('cart.response')->with([
                    'status' => 'error',
                    'message' => 'Payment Failed'
                ]);
            } else {
                // para çekme işlemi başarılı sonuçlanırsa stripe'dan dönen veriyi ekrana basıyoruz.
                $order_id = Order::create([
                    'firstname' => request()->firstname,
                    'lastname' => request()->lastname,
                    'address' => request()->address,
                    'email' => request()->email,
                    'phone' => request()->phone,
                    'country' => request()->country,
                    'city' => request()->city,
                    'total' => $total,
                    'products' => json_encode($products),
                    'stripe' => json_encode($charge)
                ])->id;
                session()->put('carts', null);
                session()->forget('carts');
                return redirect()->route('cart.response')->with([
                    'status' => 'success',
                    'message' => $charge,
                    'order_id' => $order_id,
                    'post' => request()->all()
                ]);
            }
        }

        // eğer doğrulama sonucunda ödeme 3ds ile gerçekleşecekse kullanıcıyı stripe'ın gönderdiği 3ds ekranına yönlendiriyoruz.
        if ($setupIntent['status'] == 'requires_action') {
            return Redirect::to($setupIntent['next_action']['redirect_to_url']['url']);
        } else {
            // setupIntent işleminde bir sorun olursa ekrana hata yazdırıyoruz.
            return redirect()->route('cart.response')->with([
                'status' => 'error',
                'message' => '3D Payment Failed'
            ]);
        }
    }

    public function response()
    {
        if (!session()->has('status') || !session()->has('message')) {
            return redirect()->route('cart');
        }

        return view('site.payment_response', [
            'status' => session()->has('status') ? session('status') : 'error',
            'response' => session('message'),
            'post' => session('post')
        ]);
    }
}
