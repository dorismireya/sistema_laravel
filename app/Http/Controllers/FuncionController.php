<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FuncionController extends Controller
{
    public function index()
    {

    	$tarea_valida= DB::table('tareas')
    	->join('usuarios_tareas','usuarios_tareas.id_tarea','=','tareas.id_tarea')
    	->select(DB::raw('count(tareas.id_tarea) AS cantidad'))
    	->where('usuarios_tareas.id_usuario', '=', Auth()->user()->id)
    	->where('tareas.vista', '=', 'funciones.funcion')->get();
		
		
		if($tarea_valida[0]->cantidad == 0)
			return view('adminlte::errors.404');

		unset($arreglo);
		$puntero= 0;

		$funciones= DB::table('funciones')
		->where('funciones.estado', '=', 'activo')
		->orderBy('funciones.funcion','ASC')->get();

		
		foreach ($funciones as $funcion ) {

			$arreglo[$puntero][0]= "funcion";
			$arreglo[$puntero][1]= $funcion->id_funcion;
			$arreglo[$puntero][2]= $funcion->funcion;
			$arreglo[$puntero][3]= "";
			$arreglo[$puntero][4]= $funcion->icono;
			$arreglo[$puntero][5]= $funcion->detalle;

			$puntero= $puntero+1;


			$tareas= DB::table('tareas')
			->where('tareas.id_funcion','=',$funcion->id_funcion)
			->where('tareas.estado', '=', 'activo')
			->orderBy('tareas.tarea', 'asc')->get();

			foreach ($tareas as $tarea) {
				
				$arreglo[$puntero][0]= "tarea";
				$arreglo[$puntero][1]= $tarea->id_tarea;
				$arreglo[$puntero][2]= $tarea->tarea;
				$arreglo[$puntero][3]= $tarea->vista;
				$arreglo[$puntero][4]= $tarea->icono;
				$arreglo[$puntero][5]= $tarea->detalle;

				$puntero= $puntero+1;
			}

		}

        return view('adminlte::funciones.funciones')->with('arreglos',$arreglo);
    }
}
