<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_id',
        "status",
        "payment",
        "order_date",
        "order_token"


    ];


    public function customer()
    {

        return $this->belongsTo(Customer::class);
    }

    public function order_items()
    {

        return $this->hasMany(Order_items::class, "order_id", "id");
    }

    public function products()
    {

        return $this->belongsToMany(Product::class, "order_items");
    }
    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
