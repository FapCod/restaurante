<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
class CategoryController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('can:admin.categories.index');
    }
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $brands = Brand::pluck('name', 'id');
        return view('admin.categories.create',compact('brands'));
    }

    public function store(Request $request)
    {
        $brands = Brand::pluck('name', 'id');
        $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
        ]);
        $category = Category::create($request->all());

        if($request->brand_id){
            $category->brands()->attach($request->brand_id);
        }


        return redirect()->route('admin.categories.edit',compact('category','brands'))->with('status', 'Categoría creada con éxito');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $brands = Brand::pluck('name', 'id');
        return view('admin.categories.edit', compact('category','brands'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => "required|unique:categories,name,{$category->id}",
            'slug' => "required|unique:categories,slug,{$category->id}",
        ]);
        $category->update($request->all());
        if($request->brand_id){
            $category->brands()->sync($request->brand_id);
        }
        return redirect()->route('admin.categories.edit',$category)->with('status', 'Categoría actualizada con éxito');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('status', 'Categoría eliminada con éxito');
    }
}
