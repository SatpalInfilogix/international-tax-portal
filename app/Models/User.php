<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\UserAdditionalData;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded=[];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Join to get user additional information 
     */
    public function userAdditionalData()
    {
        return $this->hasOne(UserAdditionalData::class);
    }

    public function lead()
    {
        return $this->belongsTo(LeadAdvisor::class,'id', 'introducer_id');
    }
}
