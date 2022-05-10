<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
class PresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::whereHas('subcategory', function (Builder $query) {
            $query->where('presentation', 2);
        })->get();

        $presentations= ['Litro','Unidad','Normal']; 

        foreach ($products as $product) {
            foreach ($presentations as $presentation) {
                $product->presentations()->create([
                    'name' => $presentation,
                    'slug' => Str::slug($presentation),
                    'stock' => 10
                ]);
            }
        }
    }
}
