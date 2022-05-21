<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope('lang', function (Builder $builder) {
            $builder->where('lang', app()->getLocale());
        });
    }
}
