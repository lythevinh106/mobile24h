<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'title',
        'start_date',
        'end_date',
        'value',
        "active",
        "type"

    ];



    public function products()
    {

        return $this->belongsToMany(Product::class, "product_promotions");
    }

    // public function product_promotion()
    // {
    //     return $this->hasMany(Product_promotion::class, "promotion_id", "id");
    // }
}
