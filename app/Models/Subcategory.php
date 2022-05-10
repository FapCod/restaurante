<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // relacion de uno a muchos pruductos
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // relacion inversa de uno a muchos con la tabla categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //obtener el slug de product
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
