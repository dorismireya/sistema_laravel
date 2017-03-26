<?php

use Illuminate\Database\Seeder;
use App\Modelos\Usuario as User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Administrador
        User::create([
        	'nombres' => 'Mireya',
        	'apellidos' => 'Terceros',
        	'email' => 'mir.nereidas@gmail.com',
        	'username' => 'mire',
        	'password' => '123456',
        	'tipo' => 'adm',
            'estado' => 'activo',
        	]);

        //Publicadores
        User::create([
        	'nombres' => 'Juan',
        	'apellidos' => 'Perez',
        	'email' => 'juan@gmail.com',
        	'username' => 'juan',
        	'password' => '123456',
        	'tipo' => 'pub',
            'estado' => 'activo',
        	]);
        User::create([
        	'nombres' => 'Carlos',
        	'apellidos' => 'Martines',
        	'email' => 'carlos@gmail.com',
        	'username' => 'carlos',
        	'password' => '123456',
        	'tipo' => 'pub',
            'estado' => 'activo',
        	]);

        //Lectores
        User::create([
        	'nombres' => 'Rocio',
        	'apellidos' => 'Ovando',
        	'email' => 'roci@gmail.com',
        	'username' => 'roci',
        	'password' => '123456',
        	'tipo' => 'lec',
            'estado' => 'activo',
        	]);
        User::create([
        	'nombres' => 'Alejandra',
        	'apellidos' => 'Flores',
        	'email' => 'ale@gmail.com',
        	'username' => 'ale',
        	'password' => '123456',
        	'tipo' => 'lec',
            'estado' => 'activo',
        	]);
        User::create([
        	'nombres' => 'Marcelo',
        	'apellidos' => 'Perez',
        	'email' => 'marce@gmail.com',
        	'username' => 'marce',
        	'password' => '123456',
        	'tipo' => 'lec',
            'estado' => 'activo',
        	]);
    }
}
