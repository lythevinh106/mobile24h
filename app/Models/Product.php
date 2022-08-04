<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'price_sale',
        'feature_image',
        'title',
        'content',
        'category_id',
        'active',
        "screen",
        "ram",
        "rom",
        "other",
        "company",
        "product_sale",
        "product_sale_for",
        "product_sale_online",
        "product_sale_99",
        "product_feature",
        "product_sold",
        "latest_price",
        "number_product_quantity"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product_images()
    {

        return $this->hasMany(Product_image::class, "product_id", "id");
    }



    public function Orders()
    {

        return $this->belongsToMany(Order::class, "order_items");
    }




    public function tags()
    {

        return $this->belongsToMany(Tag::class, "product_tags");
    }


    public function product_tags()
    {

        return $this->hasMany(Product_tag::class, "product_id");
    }


    public function promotions()
    {

        return $this->belongsToMany(Promotion::class, "product_promotions");
    }

    public function product_promotion()
    {
        return $this->hasMany(Product_promotion::class, "product_id", "id");
    }


    public function cart_item()
    {

        return $this->hasMany(Cart_item::class);
    }
}
