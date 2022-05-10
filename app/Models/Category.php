<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // relacion de uno a muchos con la tabla subcategories
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
    // relacion de muchos a muchos con la tabla brands
    public function brands()
    {
        return $this->belongsToMany(Brand::class)->withPivot('id');;
    }
    //obtener el slug de product
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
