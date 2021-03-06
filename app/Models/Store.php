<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    use Loggable;

    protected static function booted()
    {
        static::addGlobalScope('lang', function (Builder $builder) {
            $builder->where('lang', app()->getLocale());
        });
    }
}
