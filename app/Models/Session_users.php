<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Session_users extends Model
{
    use HasFactory;
    protected $fillable = [
        "total",
        "user_id"


    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function cart_items()
    {
        return $this->hasMany(Cart_item::class, "session_user_id", "id");
    }
}
