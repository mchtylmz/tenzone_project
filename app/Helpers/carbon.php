<?php

use Illuminate\Support\Carbon;

/**
 * @param ...$args
 * @return Carbon
 */
function carbon(...$args): Carbon
{
    Carbon::setLocale(app()->getLocale());
    return new Carbon(...$args);
}

/**
 * @param $date
 * @return string
 */
function timeAgo($date): string
{
    return carbon($date)->diffForHumans();
}
