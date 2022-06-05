<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Activities extends Model
{
    use HasFactory;
    use Loggable;

    protected $fillable = [
        'teacher_id',
        'week_id',
        'title',
        'type',
        'watch',
        'download'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function week(): HasOne
    {
        return $this->hasOne( Weeks::class, 'id', 'week_id' );
    }

    public function teacher(): hasOne
    {
        return $this->hasOne( User::class, 'id', 'teacher_id' );
    }

    public function submission(): hasOne
    {
        return $this->hasOne( Submissions::class, 'activite_id', 'id' );
    }
}
