<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.subcategories.index');
    }
    public function index()
    {
        $subcategories = Subcategory::orderBy('id', 'DESC')->paginate(10);
        return view('admin.subcategories.index', compact('subcategories'));
    }

  
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.create',compact('categories'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|unique:subcategories',
            'slug' => 'required|unique:subcategories',
        ]);
        $subcategory = Subcategory::create($request->all());
        return redirect()->route('admin.subcategories.index')->with('status', 'Subcategoría creada con éxito ✅👍');
    }

   
    public function show(Subcategory $subcategory)
    {
        return view('admin.subcategories.show', compact('subcategory'));
    }

   
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.subcategories.edit',compact('subcategory','categories'));
    }

   
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'name' => "required|unique:subcategories,name,{$subcategory->id}",
            'slug' => "required|unique:subcategories,slug,{$subcategory->id}",
        ]);
        $subcategory->update($request->all());
        return redirect()->route('admin.subcategories.index')->with('status', 'Subcategoría actualizada con éxito ✅👍');
    }

  
    public function destroy( $subcategory)
    {
        $subcategory = Subcategory::find($subcategory);
        $subcategory->delete();
        // return redirect()->route('admin.subcategories.index')->with('status', 'Subcategoría eliminada con éxito ✅👍');
        return response()->json(['status'=>'Subcategoria eliminada con exito ✅👍']);
    }
}
