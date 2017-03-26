<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FuncionController extends Controller
{
    public function index()
    {

    	$tareas= DB::table('tareas')
    	->join('usuarios_tareas','usuarios_tareas.id_tarea','=','tareas.id_tarea')
    	->select(DB::raw('count(tareas.id_tarea) AS cantidad'))
    	->where('usuarios_tareas.id_usuario', '=', Auth()->user()->id)
    	->where('tareas.vista', '=', 'funciones.funcion')->get();
		
		
		if($tareas[0]->cantidad == 0)
			return view('adminlte::errors.404');
		

        return view('adminlte::funciones.funciones');
    }
}
