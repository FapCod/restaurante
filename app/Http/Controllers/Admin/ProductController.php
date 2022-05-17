<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.products.index');
        $this->middleware('can:admin.products.edit')->only(['edit', 'update']);
        $this->middleware('can:admin.products.destroy')->only(['destroy']);
        $this->middleware('can:admin.products.create')->only(['create', 'store']);

    }
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

   
    public function create()
    {
        $subcategories = Subcategory::pluck('name','id');
        $brands = Brand::pluck('name','id');
        return view('admin.products.create',compact('subcategories','brands'));
    }

   
    public function store(Request $request)
    {
            
            $request->validate([
                'category_id' => 'required',
                'brand_id' => 'required',
                'subcategory_id' => 'required',
                'name' => 'required|unique:products',
                'slug' => 'required|unique:products',
                'status' => 'required|in:1,2',
                'file' => 'image'
            ]);
        
            if($request->subcategory_id){
                if(!$request->subcategory->presentation){
                    $request->validate([
                        'category_id' => 'required',
                        'brand_id' => 'required',
                        'subcategory_id' => 'required',
                        'name' => 'required|unique:products',
                        'slug' => 'required|unique:products',
                        'status' => 'required|in:1,2',
                        'file' => 'image',
                        'presentation'=> 'required',
                        'stock' => 'required|numeric'
                    ]);
                }
               
            }
            $product = Product::create($request->all());

            if($request->file('file')){
                $image = $request->file('file');
                $url = Storage::put('products', $image);
                $product->image()->create([
                    'url' => $url
                ]);
            }

            Cache::flush();

            return redirect()->route('admin.products.edit',$product)->with('status', '✅Producto creado con éxito👍');
        

        
    }

   
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

   
    public function edit(Product $product)
    {
        $this->authorize('author', $product);
        $subcategories = Subcategory::pluck('name','id');
        $brands = Brand::pluck('name','id');
        return view('admin.products.edit', compact('product','subcategories','brands'));
    }

   
    public function update(Request $request,Product $product)
    {

        $this->authorize('author', $product);
            $request->validate([
                'brand_id' => 'required',
                'subcategory_id' => 'required',
                'name' => "required|unique:products,name,{$product->id}",
                'slug' => "required|unique:products,slug,{$product->id}",
                'status' => 'required|in:1,2',
                'file' => 'image'
            ]);
            $product->update($request->all());

            if($request->file('file')){
                $image = $request->file('file');
                $url = Storage::put('products', $image);
                if($product->image){
                    Storage::delete($product->image->url);
                    $product->image->update([
                        'url' => $url
                    ]);
                }else{
                    $product->image()->create([
                        'url' => $url
                    ]);
                }
            }
            Cache::flush();
            return redirect()->route('admin.products.edit',$product)->with('status', '✅Producto actualizado con éxito👍');

    }

   
    public function destroy(Product $product)
    {
        $this->authorize('author', $product);
        $product->delete();
        Cache::flush();
        return redirect()->route('admin.products.index')->with('status', '✅Producto eliminado con éxito👍');
    }
}
