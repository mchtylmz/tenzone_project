<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Connects;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Store;
use App\Models\User;
use App\Models\TherapistService;
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

        if (auth()->user()->hasRole(['parent', 'user', 'admin', 'teacher', 'therapy'])) {
            $roleName = auth()->user()->getRoleNames()[0];
            $to_route = sprintf('%s.index', $roleName);
            if ($route) {
                $to_route = sprintf('%s.%s', $roleName, $route);
            }
            return redirect()->route($to_route);
        }

        return redirect()->route('index');
    }
    
    
    public function terms()
    {
        return view('terms');
    }
    
    
    public function policy()
    {
        return view('policy');
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

    public function payment_therapy(Connects $meet, TherapistService $service, User $user)
    {
        // card information
        $holder_name = request()->cardname;
        $card_number = request()->cardnumber;
        $month = request()->expmonth;
        $year = request()->expyear;
        $cvc = request()->cvc;

        $total = $service->price;

        $currency = 'GBP';
        $price = $total * 100;

        // We get the stripe secret_key information from the config.
        $stripe = new \Stripe\StripeClient(
            config('stripe.secret_key')
        );

        try {
            // We obtain a token on the stripe side using the card information.
            $stripeToken = $stripe->tokens->create([
                'card' => [
                    'number' => $card_number,
                    'exp_month' => $month,
                    'exp_year' => $year,
                    'cvc' => $cvc
                ]
            ]);

            // We save the customer name and card information on the stripe side..
            $customer = $stripe->customers->create([
                'name' => $holder_name,
                'source' => $stripeToken['id']
            ]);

            // We create a setupIntent on the stripe side.
            // As a result of the setupIntent operation, the stripe is verifying whether the inserted card requires 3ds.
            // We specify the 'return_url' parameter for stripe to pass the payment result.
            // We send the price and currency values ​​in the 'metadata' section to use in the withdrawal process after the 3ds screen.
            $setupIntent = $stripe->setupIntents->create([
                'customer' => $customer['id'],
                'description' => $service->service->name,
                'payment_method' => $stripeToken['card']['id'],
                'payment_method_types' => ['card'],
                'payment_method_options' => [
                    'card' => [
                        'request_three_d_secure' => 'any'
                    ]
                ],
                'confirm' => true,
                'return_url' => route('parent.connect'),
                'metadata' => [
                    'price' => $price,
                    'currency' => $currency
                ]
            ]);
        }
            // In case of an error, we print the error message as json.
        catch (\Stripe\Exception\ApiErrorException $e) {
            return redirect()->back()->with([
                'message' => $e->getMessage()
            ]);
        }


        // If the payment will be made normally (without 3ds) as a result of the verification, we make the withdrawal directly.
        if ($setupIntent['status'] == 'succeeded') {
            try {
                $charge = $stripe->charges->create([
                    'customer' => $setupIntent['customer'],
                    'amount' => $price,
                    'currency' => $currency,
                    'description' => $service->service->name,
                    'source' => $stripeToken['card']['id']
                ]);
            }
                // In case of an error, we print the error message as json.
            catch (\Stripe\Exception\ApiErrorException $e) {
                return redirect()->back()->with([
                    'message' => $e->getMessage()
                ]);
            }

            // If there is a problem with the withdrawal process, we print an error on the screen.
            if ($charge['status'] != 'succeeded') {
                return redirect()->back()->with([
                    'message' => 'Payment Failed'
                ]);
            } else {
                // If the withdrawal is successful, we print the data returned from the stripe.
                
                $therapist_name = ' - ';
                if ($therapist = $service->user()->first()) {
                    $therapist_name = $therapist->name . ' ' . $therapist->surname;
                }
                
                Order::create([
                    'type' => 'therapy',
                    'firstname' => auth()->user()->name,
                    'lastname' => auth()->user()->surname,
                    'address' => '',
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->phone,
                    'country' => '',
                    'city' => '',
                    'total' => $service->price,
                    'products' => json_encode([
                        'name' => $service->service->name,
                        'price' => $service->price,
                        'stripe_plan' => null,
                        'credit' => 0,
                        'therapist' => $therapist_name
                    ]),
                    'stripe' => json_encode(request()->all())
                ]);


                $meet->user_id = auth()->user()->id;
                $meet->credit = 1;
                $meet->note = sprintf(
                    'Service: %s, Price: %s, Therapist (ID: %d): %s',
                    $service->service->name,
                    $service->price,
                    $service->user_id,
                    $therapist_name
                );
                $meet->save();

                return redirect()->route('parent.connect')->with('message', 'Successfully');
            }
        }

        // If the payment will be made with 3ds as a result of the verification, we direct the user to the 3ds screen sent by stripe.
        if ($setupIntent['status'] == 'requires_action') {
            return Redirect::to($setupIntent['next_action']['redirect_to_url']['url']);
        } else {
            // If there is a problem in the setupIntent process, we print an error on the screen.
            return redirect()->back()->with([
                'message' => '3D Payment Failed'
            ]);
        }
    }

    public function update_credit(Plan $plan)
    {
        // card information
        $holder_name = request()->cardname;
        $card_number = request()->cardnumber;
        $month = request()->expmonth;
        $year = request()->expyear;
        $cvc = request()->cvc;

        $total = $plan->price;

        // For example, we will withdraw $1 from the card. As stated in the stripe document, we need to multiply the value to be drawn from the card by 100.
        $currency = 'GBP';
        $price = $total * 100;

        // We get the stripe secret_key information from the config.
        $stripe = new \Stripe\StripeClient(
            config('stripe.secret_key')
        );

        try {
            // We obtain a token on the stripe side using the card information.
            $stripeToken = $stripe->tokens->create([
                'card' => [
                    'number' => $card_number,
                    'exp_month' => $month,
                    'exp_year' => $year,
                    'cvc' => $cvc
                ]
            ]);

            // We save the customer name and card information on the stripe side..
            $customer = $stripe->customers->create([
                'name' => $holder_name,
                'source' => $stripeToken['id']
            ]);

            // We create a setupIntent on the stripe side.
            // As a result of the setupIntent operation, the stripe is verifying whether the inserted card requires 3ds.
            // We specify the 'return_url' parameter for stripe to pass the payment result.
            // We send the price and currency values ​​in the 'metadata' section to use in the withdrawal process after the 3ds screen.
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
            // In case of an error, we print the error message as json.
        catch (\Stripe\Exception\ApiErrorException $e) {
            return redirect()->back()->with([
                'message' => $e->getMessage()
            ]);
        }

        // If the payment will be made normally (without 3ds) as a result of the verification, we make the withdrawal directly.
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
                // In case of an error, we print the error message as json.
            catch (\Stripe\Exception\ApiErrorException $e) {
                return redirect()->back()->with([
                    'message' => $e->getMessage()
                ]);
            }

            // If there is a problem with the withdrawal process, we print an error on the screen.
            if ($charge['status'] != 'succeeded') {
                return redirect()->back()->with([
                    'message' => 'Payment Failed'
                ]);
            } else {
                // If the withdrawal is successful, we print the data returned from the stripe.
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

                if ($user->subscription($plan->id)) {
                    $user->subscription($plan->id)->swap($plan->stripe_plan);
                } else {
                    auth()->user()->newSubscription($plan->id, $plan->stripe_plan)->create(request()->token ?? 0);
                }

                return $this->myaccount()->with([
                    'message' => 'Successfully credit',
                ]);
            }
        }

        // If the payment will be made with 3ds as a result of the verification, we direct the user to the 3ds screen sent by stripe.
        if ($setupIntent['status'] == 'requires_action') {
            return Redirect::to($setupIntent['next_action']['redirect_to_url']['url']);
        } else {
            // If there is a problem in the setupIntent process, we print an error on the screen.
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
        $meet->note = '';
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
