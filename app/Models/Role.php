<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [
        'name',
        'description',




    ];


    public function admins()
    {

        return $this->belongsToMany(Admin::class, "admin_roles");
    }

    public function permissions()
    {

        return $this->belongsToMany(Permission::class, "permission_roles");
    }
}
