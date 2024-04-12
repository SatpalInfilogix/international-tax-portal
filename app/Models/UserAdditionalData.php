<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserAdditionalData extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Join country with counties table to get lang long
     */
    public function countryDetail(): HasOne
    {
        return $this->hasOne(Country::class, 'name', 'country');
    }
}
