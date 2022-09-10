<?php

/**
 * @return \Illuminate\Database\Eloquent\Collection
 */
function servicesList(): \Illuminate\Database\Eloquent\Collection
{
    return \App\Models\Service::all();
}
