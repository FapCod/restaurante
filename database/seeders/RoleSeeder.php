<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Empleado']);
        $role3 = Role::create(['name'=>'Visitante']);
        Permission::create(['name' => 'admin.home',
                            'description'=>'Ver dasboard'])->syncRoles([$role1,$role2]);
        // permisos para users
        Permission::create(['name' => 'admin.users.index',
                            'description'=>'Ver Usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.create',
                            'description'=>'Crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit',
                            'description'=>'Editar usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.destroy',
                            'description'=>'Eliminar usuarios'])->syncRoles([$role1]);
        // permisos para roles
        Permission::create(['name' => 'admin.roles.index',
                            'description'=>'Ver roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create',
        'description'=>'Crear roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit',
        'description'=>'Editar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy',
        'description'=>'Eliminar roles'])->syncRoles([$role1]);
        // permisos para brands
        Permission::create(['name' => 'admin.brands.index',
                            'description'=>'Ver Marcas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.brands.create',
        'description'=>'Crear Marcas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.brands.edit',
        'description'=>'Editar Marcas'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.brands.destroy',
        'description'=>'Eliminar Marcas'])->syncRoles([$role1]);
        // permisos para categories
        Permission::create(['name' => 'admin.categories.index',
                            'description'=>'Ver Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.create',
        'description'=>'Crear Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit',
        'description'=>'Editar Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy',
        'description'=>'Eliminar Categorias'])->syncRoles([$role1]);
        // permisos para subcategorias
        Permission::create(['name' => 'admin.subcategories.index',
                            'description'=>'Ver Subcategorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.subcategories.create',
        'description'=>'Crear Subcategorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.subcategories.edit',
        'description'=>'Editar Subcategorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.subcategories.destroy',
        'description'=>'Eliminar Subcategorias'])->syncRoles([$role1]);
        // permisos para products
        Permission::create(['name' => 'admin.products.index',
                            'description'=>'Ver Productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.products.create',
        'description'=>'Crear Productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.products.edit',
        'description'=>'Editar Productos'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.products.destroy',
        'description'=>'Eliminar Productos'])->syncRoles([$role1]);
      

    }
}
