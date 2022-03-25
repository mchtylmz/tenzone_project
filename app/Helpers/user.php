<?php


/**
 * @param $guard
 * @return \Illuminate\Contracts\Auth\Authenticatable|null
 */
function user($guard = null)
{
    return auth($guard)->user();
}
