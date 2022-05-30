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
