<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_item extends Model
{
    use HasFactory;
    protected $fillable = [
        'session_user_id',
        'product_id',
        "quantity"

    ];


    public function product()
    {

        return $this->belongsTo(Product::class);
    }


    public function session_user()
    {

        return $this->belongsTo(Session_users::class);
    }
}
