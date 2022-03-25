<?php

use Illuminate\Support\Str;

/**
 * @param $data
 * @param $rules
 * @return mixed
 */
function str_validate($data, $rules)
{
    return Str::validate($data, $rules);
}


/**
 * @param $string
 * @param $pattern
 * @return string
 */
function str_match($string, $pattern)
{
    return Str::match($string, $pattern);
}
