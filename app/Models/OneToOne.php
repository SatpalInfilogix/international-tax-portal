<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OneToOne extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function advisor()
    {
        return $this->belongsTo(User::class, 'advisor_id', 'id');
    }

    public function introducer()
    {
        return $this->belongsTo(User::class, 'introducer_id', 'id');
    }

    public function userAdditionalAdvisorData()
    {
        return $this->hasOne(UserAdditionalData::class, 'user_id', 'advisor_id' );
    }

    public function userAdditionalIntroducerData()
    {
        return $this->hasOne(UserAdditionalData::class, 'user_id', 'introducer_id' );
    }

}
