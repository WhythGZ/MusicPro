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
     */
    public function run(): void
    {
        $admin_role = Role::create(['name'=>'Admin']);
        Role::create(['name'=>'Vendedor']);
        Role::create(['name'=>'Bodegero']);
        Role::create(['name'=>'Contador']);
        $client_role = Role::create(['name'=>'Cliente']);


        //admin
        Permission::create(['name'=>'admin.marcas.index'])->syncRoles([$admin_role, $client_role]);
        Permission::create(['name'=>'admin.marcas.create'])->assignRole($admin_role);
        Permission::create(['name'=>'admin.marcas.show'])->assignRole($admin_role);
        Permission::create(['name'=>'admin.marcas.update'])->assignRole($admin_role);
        Permission::create(['name'=>'admin.marcas.destroy'])->assignRole($admin_role);

        Permission::create(['name'=>'admin.categorias.index'])->syncRoles([$admin_role, $client_role]);
        Permission::create(['name'=>'admin.categorias.create'])->assignRole($admin_role);
        Permission::create(['name'=>'admin.categorias.show'])->assignRole($admin_role);
        Permission::create(['name'=>'admin.categorias.update'])->assignRole($admin_role);
        Permission::create(['name'=>'admin.categorias.destroy'])->assignRole($admin_role);

        Permission::create(['name'=>'admin.subcategorias.index'])->syncRoles([$admin_role, $client_role]);
        Permission::create(['name'=>'admin.subcategorias.create'])->assignRole($admin_role);
        Permission::create(['name'=>'admin.subcategorias.show'])->assignRole($admin_role);
        Permission::create(['name'=>'admin.subcategorias.update'])->assignRole($admin_role);
        Permission::create(['name'=>'admin.subcategorias.destroy'])->assignRole($admin_role);

        Permission::create(['name'=>'admin.productos.index'])->syncRoles([$admin_role, $client_role]);
        Permission::create(['name'=>'admin.productos.create'])->assignRole($admin_role);
        Permission::create(['name'=>'admin.productos.show'])->assignRole($admin_role);
        Permission::create(['name'=>'admin.productos.update'])->syncRoles([$admin_role, $client_role]);
        Permission::create(['name'=>'admin.productos.destroy'])->assignRole($admin_role);

        
    }
}
