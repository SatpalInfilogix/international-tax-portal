<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LeadAdvisor extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Join advisor with users table
     */
    public function lead(): HasOne
    {
        return $this->hasOne(Lead::class, 'id', 'lead_id');
    }

    /**
     * Join advisor with users table
     */
    public function advisor(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'advisor_id');
    }

    /**
     * Join introducer with users table
     */
    public function introducer(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'introducer_id');
    }
}
