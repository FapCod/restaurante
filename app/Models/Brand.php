<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    // relacion de uno a muchos con la tabla de products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // relacion de muchos a muchos con la tabla categories
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
