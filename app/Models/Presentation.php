<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // relacion uno a muchos inversa de la tabla Products
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
