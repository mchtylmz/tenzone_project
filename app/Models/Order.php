<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use Loggable;

    protected $fillable = [
        'type',
        'firstname',
        'lastname',
        'address',
        'email',
        'phone',
        'country',
        'city',
        'total',
        'products',
        'stripe'
    ];
}
