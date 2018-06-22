<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\Models\RoleUser;
use App\User as User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'      => 'Admin',
            'slug'      => 'slug',
            'special'   => 'all-access'
        ]);

        User::create([
            'id'          => 1,
        	'nomUsuario'  => 'Administrador',
        	'corUsuario'  => 'administrador@prueba.com',
            'password'    =>  bcrypt('123456'),
        	'idEstado' 	  =>  8,
        ]);

        RoleUser::create([
            'role_id'  => '1',
            'user_id'  => '1'
        ]);
    }
}
