<?php


/**
 * @param $guard
 * @return \Illuminate\Contracts\Auth\Authenticatable|null
 */
function user($guard = null)
{
    return auth($guard)->user();
}

/**
 * @param $guard
 * @return \Illuminate\Contracts\Auth\Authenticatable|null
 */
function parent()
{
    return user()->parent()->first();
}

/**
 * @param $guard
 * @return \Illuminate\Contracts\Auth\Authenticatable|null
 */
function childs()
{
    return user()->childs()->get();
}

/**
 * @param $guard
 * @return \Illuminate\Contracts\Auth\Authenticatable|null
 */
function credit($model = false)
{
    if (!user()->hasAnyRole('user')) {
        if ($model) {
            return auth()->user();
        }
        return auth()->user()->plan_credit;
    }

    if ($model) {
        return parent();
    }
    return parent()->plan_credit;
}

function expire_date(\App\Models\User $user = null)
{
    if (!$user) {
        return false;
    }

    $key = 'expire_date_' . $user->id;
    if (session()->has($key)) {
        return session()->get($key);
    }

    if ($sub = $user->subscription($user->plan_id)) {
        $date = date('d M Y', $sub->asStripeSubscription()->current_period_end ?? time());
        session()->put($key, $date);
        return $date;
    }
    return false;
}



