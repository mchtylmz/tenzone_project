<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Database\Eloquent\Model;
use App\Models\TherapistService;

class TherapyService extends Model
{
    use HasFactory;
    use Loggable;

    public function therapist(): HasMany
    {
        return $this->HasMany( TherapistService::class, 'service_id', 'id' );
    }
}
