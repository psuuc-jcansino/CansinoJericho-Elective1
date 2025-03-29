<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address'
    ];

    /**
     * Get the contacts associated with the customer.
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class, 'customer_id');
    }

    /**
     * Get the opportunities associated with the customer.
     */
    public function opportunities()
    {
        return $this->hasMany(Opportunity::class, 'customer_id');
    }

    /**
     * Get the activities associated with the customer.
     */
    public function activities()
    {
        return $this->hasMany(Activity::class, 'customer_id');
    }
}
