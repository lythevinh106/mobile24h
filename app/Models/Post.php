<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'title',
        'active',
        "admin_id",
        "content",
        "feature_image", "name",
        "post_category_id",
        "name"

    ];


    public function admin()
    {

        $this->belongsTo(Admin::class);
    }
}
