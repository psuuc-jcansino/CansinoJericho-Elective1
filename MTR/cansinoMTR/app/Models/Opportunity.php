<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'title', 'description', 'status', 'amount'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
