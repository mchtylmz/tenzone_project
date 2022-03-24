<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
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
        'gender',
        'dob',
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany( 'App\Models\User', 'parent_id', 'id' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function parent(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne( 'App\Models\User', 'id', 'parent_id' );
    }

}
