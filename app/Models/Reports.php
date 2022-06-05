<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reports extends Model
{
    use HasFactory;
    use Loggable;

    protected $fillable = [
        'user_id',
        'teacher_id',
        'title',
        'description',
        'watch',
        'download',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user(): hasOne
    {
        return $this->hasOne( User::class, 'id', 'user_id' );
    }

    public function teacher(): hasOne
    {
        return $this->hasOne( User::class, 'id', 'teacher_id' );
    }
}
