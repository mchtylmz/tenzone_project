<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookFree extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
    ];
}
