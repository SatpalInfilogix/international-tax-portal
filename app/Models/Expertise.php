<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Expertise extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Join introducer with users table
     */
    public function introducer(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'introducer_id')
            ->join('user_additional_data', 'users.id', '=', 'user_additional_data.user_id')
            ->select(
                'users.id', 
                'users.name', 
                'user_additional_data.country', 
                'user_additional_data.company_name'
            );
    }

    /**
     * Join advisor with users table
     */
    public function advisor(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'advisor_id')
            ->join('user_additional_data', 'users.id', '=', 'user_additional_data.user_id')
            ->select(
                'users.id', 
                'users.name', 
                'user_additional_data.country', 
                'user_additional_data.company_name'
            );
    }
}
