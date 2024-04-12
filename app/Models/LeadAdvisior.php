<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LeadAdvisior extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Join advisor with users table
     */
    public function advisor(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'advisor_id');
    }
}
