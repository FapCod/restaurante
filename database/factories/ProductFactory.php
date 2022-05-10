<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->word(3);
        $subcategory = Subcategory::all()->random();
        $subcategory_id = Subcategory::all()->random()->id;
        $category = $subcategory->category;
        $brand_id = $category->brands->random()->id;
        $user_id = User::all()->random()->id;

        if($subcategory->presentation == 1){
            $stock = null;
        }else{
            $stock = $this->faker->numberBetween(1,100);
        }
        return [
            'name' =>$name,
            'slug' =>Str::slug($name),
            'description' =>$this->faker->text(50),
            'stock' =>$stock,
            'status' =>2,
            'subcategory_id' =>$subcategory_id,
            'brand_id' =>$brand_id,
            'user_id' =>$user_id,
        ];
    }
}
