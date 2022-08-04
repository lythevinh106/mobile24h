<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;


    protected $fillable = [
        "key_code",
        "parent_id",
        "name",

        "description",

    ];
    public function roles()
    {

        return $this->belongsToMany(Role::class, "permission_roles");
    }
    public function permission_children()
    {
        return $this->hasMany(Permission::class, "parent_id");
    }
}
