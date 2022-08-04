<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name',
        'parent_id',
        "active"

    ];

    public function products()
    {
        return $this->hasMany(Product::class, "category_id", "id");
    }

    public function category_children()
    {

        return $this->hasMany(Category::class, "parent_id", "id");
    }


    public function category_parent()
    {

        return $this->belongsTo(Category::class, "parent_id", "id");
    }
}
