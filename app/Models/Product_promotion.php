<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        "product_id",
        "promotion_id"
    ];


    // public function promotion()
    // {
    //     return $this->belongsTo(Promotion::class);
    // }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
