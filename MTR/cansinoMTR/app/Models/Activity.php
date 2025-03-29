<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'type',
        'description',
        'date'
    ];

    /**
     * Get the customer associated with the activity.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
