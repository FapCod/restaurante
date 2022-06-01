<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
class CreateProduct extends Component
{
    use WithFileUploads;
    public $brand_id="";
    public $subcategory_id="";
    public $category_id="";
    public $categories=[];
    public $subcategories=[];
    public $brands=[];
    public $name,$slug,$description,$stock,$status,$file;
    protected $rules=[
        'category_id' => 'required',
        'brand_id' => 'required',
        'subcategory_id' => 'required',
        'name' => 'required|unique:products',
        'slug' => 'required|unique:products',
        'status' => 'required|in:1,2'
    ];

    public function updatedCategoryId($value){
        $this->subcategories = Subcategory::where('category_id',$value)->get();
        $this->brands=Brand::whereHas('categories',function(Builder $query) use ($value){
            $query->where('category_id',$value);
        })->get();

        $this->reset(['subcategory_id','brand_id']);
    }
    // generar el slug a partir del name
    public function updatedName($value){
        $this->slug = Str::slug($value);
    }


    public function getSubcategoryProperty(){
        return Subcategory::find($this->subcategory_id);
    }

    public function mount()
    {
        $this->categories = Category::all();
        
    }
    public function save(){
        $rules = $this->rules;
        if($this->subcategory_id){
            if($this->subcategory->presentation==1){
                $rules['stock']='required|numeric|min:1';
            }
        }
        $this->validate($rules);
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $product->brand_id = $this->brand_id;
        $product->subcategory_id = $this->subcategory_id;
        $product->status = $this->status;
        $product->user_id = Auth::id();
        if($this->subcategory_id){
            if($this->subcategory->presentation==1){
                $product->stock = $this->stock;
            }
        }
        $product->save();
        if($this->file){
            $image = $this->file;
            $url = Storage::put('products', $image);
            $product->image()->create([
                'url' => $url
            ]);
        }
        
        return redirect()->route('admin.products.edit',$product)->with('status', 'Producto creado con éxito✅👍');
    }
    public function render()
    {
        return view('livewire.admin.create-product');
    }
}
