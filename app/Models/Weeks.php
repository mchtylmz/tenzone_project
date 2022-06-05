<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Weeks extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'start_date',
        'end_date',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function activities(): HasMany
    {
        return $this->hasMany( Activities::class, 'week_id', 'id');
    }

    public function user(): hasOne
    {
        return $this->hasOne( User::class, 'user_id', 'id' );
    }

}
