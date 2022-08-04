<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'province_id',



    ];

    public function province()
    {

        return $this->belongsTo(Province::class, "province_id");
    }

    public function wards()
    {

        return $this->hasMany(Ward::class, "district_id", "id");
    }
}
