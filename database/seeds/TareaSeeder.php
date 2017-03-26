<?php

use Illuminate\Database\Seeder;
use App\Modelos\Tarea;

class TareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tarea::create([
        	'tarea' => 'Crear Tarea',
            'id_funcion' => 1,
        	'vista' => 'tareas.create',
        	'detalle' => 'Creamos tareas',
        	'estado' => 'activo',
        	]);
    }
}
