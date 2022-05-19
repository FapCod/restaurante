<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class EditProduct extends Component
{
    use WithFileUploads;
    public $product;
    public $brand_id = "";
    public $subcategory_id = "";
    public $category_id = "";
    public $categories = [];
    public $subcategories = [];
    public $brands = [];
    public $slug,$name;
    public $file;
    protected $rules=[
        'category_id' => 'required',
        'product.brand_id' => 'required',
        'product.subcategory_id' => 'required',
        'name' => 'required|unique:products,name',
        'slug' => 'required|unique:products,slug',
        'product.status' => 'required|in:1,2',
        'product.description' => '',
        'product.stock' => 'numeric',
        'file' => 'image',
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
     public function updatedName($value){
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
        $this->product->name = $this->name;
        $this->product->save();
        
        try {
                if($this->file){
                    $image = $this->file;
                    $url = Storage::put('products', $image);
                    
                    if($this->product->image){
                        Storage::delete($this->product->image->url);
                        $this->product->image()->update([
                            'url' => $url
                        ]);
                    }else{
                        $this->product->image()->create([
                            'url' => $url
                        ]);
                        $this->file->store('products');
                    }
                }
        }
        catch(\Exception $e)
        {
            $this->emit('error',$e->getMessage());
        }
        return redirect()->route('admin.products.edit',$this->product)->with('status', '✅Producto actualizado con éxito👍');

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
