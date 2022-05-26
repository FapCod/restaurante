<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    
    protected $paginationTheme = 'bootstrap';
    public function index()
    {
        
        $roles = Role::paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

   
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:roles',
        ]);
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index')->with('status','Rol creado con exito ✅👍');
    }

    
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

   
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>"required|unique:roles,name,{$role->id}",
        ]);
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index')->with('status','Rol actualizado correctamente✅👍');
    }

   
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('status','Rol eliminado correctamente✅👍');
    }
}
