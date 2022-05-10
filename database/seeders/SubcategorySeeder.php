<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subcategory;
use Illuminate\Support\Str;
class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            // Bebidas
            [
                'category_id' => 1,
                'name' => 'Cerveza',
                'slug' => Str::slug('Cerveza'),
                'presentation' => 2
            ],
            [
                'category_id' => 1,
                'name' => 'Gaseosa',
                'slug' => Str::slug('Gaseosa'),
                'presentation' => 1
            ],
            [
                'category_id' => 1,
                'name' => 'Vino',
                'slug' => Str::slug('Vino'),
                'presentation' => 2
            ],
            //Carnes
            [
                'category_id' => 2,
                'name' => 'Pollo',
                'slug' => Str::slug('Pollo'),
                'presentation' => 1
            ],
            [
                'category_id' => 2,
                'name' => 'Res',
                'slug' => Str::slug('Res'),
                
            ],
            [
                'category_id' => 2,
                'name' => 'Chancho',
                'slug' => Str::slug('Chancho'),
                
            ],
            //Abarrotes

            [
                'category_id' => 3,
                'name' => 'Aceites',
                'slug' => Str::slug('Aceites'),
                'presentation' => 1
            ],
            [
                'category_id' => 3,
                'name' => 'Arroz',
                'slug' => Str::slug('Arroz'),
                
            ],
            [
                'category_id' => 3,
                'name' => 'Fideos',
                'slug' => Str::slug('Fideos'),
                
            ],
            //Frutas y Verduras
            [
                'category_id' => 4,
                'name' => 'Papa',
                'slug' => Str::slug('Papa'),
                'presentation' => 1
                
            ],
            [
                'category_id' => 4,
                'name' => 'Camote',
                'slug' => Str::slug('Camote'),
                
            ],
            [
                'category_id' => 4,
                'name' => 'Zanahoria',
                'slug' => Str::slug('Zanahoria'),
            
            ]

        ];
        foreach ($subcategories as $subcategory) {
            Subcategory::factory(1)->create($subcategory);
        }
    }
}
