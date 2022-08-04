<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        "phone_number",
        "email",
        "other"

    ];

    public function orders()
    {

        return $this->hasMany(Order::class, "customer_id", "id");
    }
}
