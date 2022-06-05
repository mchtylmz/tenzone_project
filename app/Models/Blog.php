<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Blog extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::addGlobalScope('lang', function (Builder $builder) {
            $builder->where('lang', app()->getLocale());
        });
    }

    public function author(): hasOne
    {
        return $this->hasOne( 'App\Models\User', 'id', 'user_id' );
    }
}
