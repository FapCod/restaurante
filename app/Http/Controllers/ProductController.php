<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
class ProductController extends Controller
{
    public function index()
    {

        if(request()->page)
        {
            $key = 'products'.request()->page;
        }
        else
        {
            $key = 'products';
        }


        if (Cache::has($key)) {
            $products = Cache::get($key);
        } else {
            $products = Product::where('status',2)->latest('id')->paginate(20);
            Cache::put($key, $products, 60);
        }
        return view('product.index',compact('products'));
    }
    public function show(Product $product)
    {
        $this->authorize('published',$product);

        $similares = Product::where('status',2)
                            ->where('subcategory_id',$product->subcategory->id)
                            ->where('id','!=',$product->id)
                            ->latest('id')
                            ->take(4)
                            ->get();
       
        return view('product.show',compact('product','similares'));
    }
    public function category(Category $category)
    {
        $products = Product::where('status',2)
                            ->whereHas('subcategory',function(Builder $query) use ($category){
                                $query->where('category_id',$category->id);
                            })
                            ->latest('id')
                            ->paginate(20);
        return view('product.category',compact('products','category'));
        
    }
    public function subcategory(Subcategory $subcategory)
    {
        $products = Product::where('status',2)
                            ->whereHas('subcategory',function(Builder $query) use ($subcategory){
                                $query->where('id',$subcategory->id);
                            })
                            ->latest('id')
                            ->paginate(20);
        return view('product.subcategory',compact('products','subcategory'));
        
    }

}
