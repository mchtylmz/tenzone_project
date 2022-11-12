<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use App\Models\User;
use App\Models\TherapyService;

class TherapistService extends Model
{
    use HasFactory;
    use Loggable;

    public function user(): hasOne
    {
        return $this->hasOne( User::class, 'id', 'user_id' );
    }

    public function service(): belongsTo
    {
        return $this->belongsTo( TherapyService::class, 'service_id', 'id' );
    }
}
