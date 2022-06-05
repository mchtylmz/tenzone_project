<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Pharaonic\Laravel\Settings\Traits\Settingable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use Settingable;
    use SoftDeletes;
    use HasRoles;
    use Billable;
    use Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'name',
        'surname',
        'email',
        'phone',
        'gender',
        'dob',
        'plan_id',
        'plan_status',
        'email_verified_at',
        'password',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'fullname',
    ];


    /**
     * @return string
     */
    public function getFullnameAttribute(): string
    {
        return sprintf('%s %s', $this->attributes['name'], $this->attributes['surname']);
    }

    /**
     * @return string
     */
    public function getImageAttribute(): string
    {
        return sprintf('upload/users-avatar/%s', $this->original['avatar']);
    }

    /**
     * @return HasMany
     */
    public function childs(): HasMany
    {
        return $this->hasMany( 'App\Models\User', 'parent_id', 'id' );
    }

    /**
     * @return hasOne
     */
    public function parent(): hasOne
    {
        return $this->hasOne( 'App\Models\User', 'id', 'parent_id' );
    }

    public function weeks(): hasMany
    {
        return $this->hasMany( Weeks::class, 'user_id', 'id' );
    }

    public function reports(): hasMany
    {
        return $this->hasMany( Reports::class, 'user_id', 'id' );
    }

    public function meets(): hasOne
    {
        return $this->hasOne( Connects::class, 'teacher_id', 'id' );
    }

    public function connects(): hasOne
    {
        return $this->hasOne( Connects::class, 'user_id', 'id' );
    }

    public function plan()
    {
        $subscribe = $this->subscriptions()->first();
        if ($subscribe) {
            return Plan::where('stripe_plan', $subscribe->stripe_price)->first();
        }
        return false;
    }

    public function message_count(): int
    {
        return ChMessage::where('to_id', user()->id)
            ->where('seen', 0)
            ->count();
    }

}
