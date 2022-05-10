<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.users.index');
    }
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

  
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', compact('roles'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);
        $request->merge(['password' => bcrypt($request->password)]);
        $user = User::create($request->all());
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index')->with('success', 'User creado satisfactoriamente ✅');
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

   
    public function update(Request $request,User $user)
    {
        $request->validate([
            'name' => "required|max:255,name,{$user->id}",
            'email' => "required|email|unique:users,email,{$user->id}",
            'password' => 'same:confirm-password',
        ]);

        if (!empty($request->password)) {
            $request->merge(['password' => bcrypt($request->password)]);
        } else {
            $request->merge(['password' => $user->password]);
        }
        $user->update($request->all());
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index')->with('status', 'User actualizado correctamente ✅');
    }

   
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('status', 'Usuario eliminado correctamente ✅');
    }
}
