<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
class EditProduct extends Component
{
    public $product;
    public $brand_id = "";
    public $subcategory_id = "";
    public $category_id = "";
    public $categories = [];
    public $subcategories = [];
    public $brands = [];
    public $slug,$name;
    protected $rules=[
        'category_id' => 'required',
        'product.brand_id' => 'required',
        'product.subcategory_id' => 'required',
        'name' => 'required|unique:products,name',
        'slug' => 'required|unique:products,slug',
        'product.status' => 'required|in:1,2',
        'product.description' => '',
        'product.stock' => 'numeric',
    ];
    public function updatedCategoryId($value)
    {
        $this->subcategories = Subcategory::where('category_id', $value)->get();
        $this->brands = Brand::whereHas('categories', function (Builder $query) use ($value) {
            $query->where('category_id', $value);
        })->get();   

        $this->product->subcategory_id = '';
        $this->product->brand_id = '';
    }


    public function getSubcategoryProperty()
    {
        return Subcategory::find($this->product->subcategory_id);
    }
     // generar el slug a partir del name
     public function updatedProductName($value){
        $this->slug = Str::slug($value);
    }

    public function save(){
        $rules = $this->rules;
        $rules['name'] = 'required|unique:products,name,' . $this->product->id;
        $rules['slug'] = 'required|unique:products,slug,' . $this->product->id;
        if($this->product->subcategory_id){
            if($this->subcategory->presentation==1){
                $rules['product.stock']='required|numeric|min:1';
            }
        }
        
        $this->validate($rules);
        $this->product->slug = $this->slug;
        $this->product->save();
    }

    public function mount(Product $product)
    {
        
        $this->product = $product;
        $this->slug = $this->product->slug;
        $this->name = $this->product->name;
        $this->categories = Category::get();
        $this->category_id = $this->product->subcategory->category->id;
        $this->subcategories = Subcategory::where('category_id', $this->category_id)->get();
        $this->brands = Brand::whereHas('categories', function (Builder $query) {
            $query->where('category_id', $this->category_id);
        })->get();
        
    }
    public function render()
    {
        return view('livewire.admin.edit-product');
    }
}
