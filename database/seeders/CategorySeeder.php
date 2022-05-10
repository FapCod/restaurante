<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Bebidas',
                'slug' => Str::slug('Bebidas'),
                'icon' => '<i class="fa-solid fa-bottle-droplet"></i>'
            ],
            [
                'name' => 'Carnes',
                'slug' => Str::slug('Carne'),
                'icon' => '<i class="fa-solid fa-drumstick-bite"></i>'
            ],
            [
                'name' => 'Abarrotes',
                'slug' => Str::slug('Abarrotes'),
                'icon' => '<i class="fa-solid fa-cart-shopping"></i>'
            ],
            [
                'name' => 'Frutas y Verduras',
                'slug' => Str::slug('Frutas y Verduras'),
                'icon' => '<i class="fa-solid fa-seedling"></i>'
            ]
        ];
        foreach ($categories as $category) {
            $category = Category::factory(1)->create($category)->first();
            $brands= Brand::factory(4)->create();
            foreach ($brands as $brand) {
                $brand->categories()->attach($category['id']);
            }

        }
    }
}
