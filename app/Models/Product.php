<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // relacion uno a muchos inversa de la tabla subcategories
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    // relacion uno a muchos inversa de la tabla users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relacion de uno a muchos con la tabla presentations
    public function presentations()
    {
        return $this->hasMany(Presentation::class);
    }

    // relacion de uno a muchos inversa con la tabla brands
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // relacion uno a uno polimorfica con la tabla images
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    //obtener el slug de product
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
