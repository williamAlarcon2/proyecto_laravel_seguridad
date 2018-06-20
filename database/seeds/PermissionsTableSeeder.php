<?php

use Illuminate\Database\Seeder;

use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([
            'name'          => 'Navegar usuarios',
            'slug'          => 'usuarios.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ]);

        Permission::create([
            'name'          => 'Creación de usuarios',
            'slug'          => 'usuarios.create',
            'description'   => 'Podría crear nuevos usuarios en el sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de usuarios',
            'slug'          => 'usuarios.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminar usuario',
            'slug'          => 'usuarios.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',
        ]);

        //Roles
        Permission::create([
            'name'          => 'Navegar roles',
            'slug'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ]);

        Permission::create([
            'name'          => 'Creación de roles',
            'slug'          => 'roles.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de roles',
            'slug'          => 'roles.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminar roles',
            'slug'          => 'roles.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',
        ]);

        //Permisos
        Permission::create([
            'name'          => 'Navegar permisos',
            'slug'          => 'permisos.index',
            'description'   => 'Lista y navega todos los permisos del sistema',
        ]);

        Permission::create([
            'name'          => 'Creación de permisos',
            'slug'          => 'permisos.create',
            'description'   => 'Podría crear nuevos permisos en el sistema',
        ]);

        Permission::create([
            'name'          => 'Edición de permisos',
            'slug'          => 'permisos.edit',
            'description'   => 'Podría editar cualquier dato de un permiso del sistema',
        ]);

        Permission::create([
            'name'          => 'Eliminar permisos',
            'slug'          => 'permisos.destroy',
            'description'   => 'Podría eliminar cualquier permiso del sistema',
        ]);
    }
}
