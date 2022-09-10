<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Connects;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Store::limit(6)->get();
        $blogs = Blog::limit(3)->get();

        return view('site.welcome', [
            'products' => $products,
            'blogs'    => $blogs,
        ]);
    }

    public function myaccount($route = null)
    {
        if (auth()->user()->hasRole(['parent', 'user']) && auth()->user()->plan_status == 'no' && auth()->user()->plan_id){
            return redirect()->route('plan.subscribe');
        }

        if (auth()->user()->hasRole(['parent', 'user', 'admin', 'teacher', 'theraphy'])) {
            $roleName = auth()->user()->getRoleNames()[0];
            $to_route = sprintf('%s.index', $roleName);
            if ($route) {
                $to_route = sprintf('%s.%s', $roleName, $route);
            }
            return redirect()->route($to_route);
        }

        return redirect()->route('index');
    }

    public function myprofile()
    {
        return view('panel.profile');
    }

    public function myprofile_save()
    {
        return $this->extracted(auth()->user());
    }

    public function profile(User $user)
    {
        return view('panel.user.profile', [
            'user' => $user,
            'parent' => $user->parent()->first()
        ]);
    }

    public function buy_credit()
    {
        $filter = request()->p == 'yearly' ? 'yearly' : 'monthly';
        $plans = Plan::where('type', $filter)->get();

        return view('panel.buy_credit', [
            'plans' => $plans,
            'filter' => $filter
        ]);
    }

    public function update_credit(Plan $plan)
    {
        // kart bilgilerini alıyoruz.
        $holder_name = request()->cardname;
        $card_number = request()->cardnumber;
        $month = request()->expmonth;
        $year = request()->expyear;
        $cvc = request()->cvc;

        $total = $plan->price;

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
                'description' => $plan->name,
                'payment_method' => $stripeToken['card']['id'],
                'payment_method_types' => ['card'],
                'payment_method_options' => [
                    'card' => [
                        'request_three_d_secure' => 'any'
                    ]
                ],
                'confirm' => true,
                'return_url' => route('buy.credit'),
                'metadata' => [
                    'price' => $price,
                    'currency' => $currency
                ]
            ]);
        }
            // hata oluşması durumunda hata mesajını json olarak ekrana yazdırıyoruz.
        catch (\Stripe\Exception\ApiErrorException $e) {
            return redirect()->back()->with([
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
                    'description' => $plan->name,
                    'source' => $stripeToken['card']['id']
                ]);
            }
                // hata oluşması durumunda hata mesajını json olarak ekrana yazdırıyoruz.
            catch (\Stripe\Exception\ApiErrorException $e) {
                return redirect()->back()->with([
                    'message' => $e->getMessage()
                ]);
            }

            // para çekme işleminde bir sorun olursa ekrana hata yazdırıyoruz.
            if ($charge['status'] != 'succeeded') {
                return redirect()->back()->with([
                    'message' => 'Payment Failed'
                ]);
            } else {
                // para çekme işlemi başarılı sonuçlanırsa stripe'dan dönen veriyi ekrana basıyoruz.
                Order::create([
                    'type' => 'plan',
                    'firstname' => auth()->user()->name,
                    'lastname' => auth()->user()->surname,
                    'address' => '',
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->phone,
                    'country' => '',
                    'city' => '',
                    'total' => $plan->price,
                    'products' => json_encode([
                        'name' => $plan->name,
                        'price' => $plan->price,
                        'stripe_plan' => $plan->stripe_plan,
                        'credit' => $plan->credit
                    ]),
                    'stripe' => json_encode(request()->all())
                ]);

                $user = credit(true);
                $user->plan_credit += $plan->credit;
                $user->save();

                $user->subscription($plan->id)->swap($plan->stripe_plan);

                return $this->myaccount()->with([
                    'message' => 'Successfully credit',
                ]);
            }
        }

        // eğer doğrulama sonucunda ödeme 3ds ile gerçekleşecekse kullanıcıyı stripe'ın gönderdiği 3ds ekranına yönlendiriyoruz.
        if ($setupIntent['status'] == 'requires_action') {
            return Redirect::to($setupIntent['next_action']['redirect_to_url']['url']);
        } else {
            // setupIntent işleminde bir sorun olursa ekrana hata yazdırıyoruz.
            return redirect()->back()->with([
                'message' => '3D Payment Failed'
            ]);
        }
    }

    public function profile_save(User $user)
    {
        return $this->extracted($user);
    }

    public function meet_book(Connects $meet)
    {
        if (credit() < 1) {
            return redirect()->back()->withMessage('Not enough Credit, please buy credit');
        }

        $meet->user_id = auth()->user()->id;
        $meet->credit = 1;
        $meet->save();

        $user = credit(true);
        $user->plan_credit -= 1;
        $user->save();

        return $this->myaccount('connect')->withMessage('Successfully Booked');
    }

    public function meet_cancel(Connects $meet)
    {
        $user = User::findOrFail($meet->user_id);

        $meet->user_id = null;
        $meet->credit = 0;
        $meet->meet_link = null;
        $meet->save();

        $user->plan_credit += 1;
        $user->save();

        return $this->myaccount('connect')->withMessage('Successfully Cancelled');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function extracted(User $user)
    {
        $user->name = request()->name;
        $user->surname = request()->surname;
        $user->email = request()->email;
        $user->gender = request()->gender;
        $user->dob = date('Y-m-d', strtotime(request()->dob));
        $user->save();

        return redirect()->back()->withMessage('Successfuly Updated');
    }

}
