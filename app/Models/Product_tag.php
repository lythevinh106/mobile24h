<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_tag extends Model
{
    use HasFactory;
    protected $fillable = [
        "product_id",
        "tag_id"
    ];


    public function products()
    {

        return $this->belongsTo(Product::class);
    }
}
