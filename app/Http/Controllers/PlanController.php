<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function all()
    {
        return view('site.plans', [
            'plans' => Plan::all()
        ]);
    }

    public function update(Plan $plan)
    {
        auth()->user()->plan_id = $plan->id;
        auth()->user()->save();

        return redirect()->route('my.account');
    }

    public function subscribe()
    {
        $plan = Plan::find(auth()->user()->plan_id);

        return view('site.plan_subscribe', [
            'plan' => $plan,
            'intent' => auth()->user()->createSetupIntent([
                'usage' => 'on_session'
            ])
        ]);
    }

    public function checkout(Plan $plan)
    {
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

        auth()->user()->plan_status = 'yes';
        auth()->user()->plan_credit = $plan->credit;
        auth()->user()->save();

        User::where('parent_id', auth()->user()->id)->update(['plan_status' => 'yes']);

        $parent = User::find(auth()->user()->id);
        $parent->newSubscription($plan->id, $plan->stripe_plan)->create(request()->token);

        return redirect()->route('my.account');
    }
}
