<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('can:admin.brands.index');
    }
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands',
            'slug' => 'required|unique:brands',
        ]);

        $brand = Brand::create($request->all());
        // if($request->id){
        //     $brand->categories()->attach($request->id);
        // }
        return redirect()->route('admin.brands.index')->with('status', 'Marca creada con éxito✅👍');
    }

  
    public function show(Brand $brand)
    {
        return view('admin.brands.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => "required|unique:brands,name,{$brand->id}",
            'slug' => "required|unique:brands,slug,{$brand->id}",
        ]);
        $brand->update($request->all());
        return redirect()->route('admin.brands.index')->with('status', 'Marca actualizada con éxito ✅👍');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        // return redirect()->route('admin.brands.index')->with('status', 'Marca eliminada con éxito ✅👍');
        return response()->json(['status'=>'Marca eliminada con exito ✅👍']);
    }
}
