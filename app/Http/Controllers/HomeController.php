<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {

        echo $id_usuario= Auth()->user()->id;

        $funciones= DB::table('funciones')
        ->join('tareas','tareas.id_funcion','=','funciones.id_funcion')
        ->join('usuarios_tareas','usuarios_tareas.id_tarea','=','tareas.id_tarea')
        ->select('funciones.*')
        ->where('usuarios_tareas.id_usuario','=',$id_usuario)
        ->where('funciones.estado', '=', 'activo')
        ->where('tareas.estado', '=', 'activo')
        ->groupBy('funciones.id_funcion')
        ->orderBy('funciones.funcion','ASC')->get();

        $contenedor= '';

        foreach ($funciones as $funcion ) {

            /*$contenedor= $contenedor."<li class=\"list-group-item\">";
            $contenedor= $contenedor."<span class=\"hasSub\"><i class=\"".$funcion->icono."\"></i> ".$funcion->funcion."</span>";

            $contenedor= $contenedor."<ul class=\"list-group expanded\">";*/
            
            $contenedor= $contenedor."<li class=\"treeview\">";
            $contenedor= $contenedor."<a href=\"#\"><i class='fa fa-link'></i> <span>".$funcion->funcion."</span> <i class=\"fa fa-angle-left pull-right\"></i></a>";
            $contenedor= $contenedor."<ul class=\"treeview-menu\">";

            $tareas= DB::table('tareas')
            ->join('usuarios_tareas','usuarios_tareas.id_tarea','=','tareas.id_tarea')
            ->select('tareas.*')
            ->where('usuarios_tareas.id_usuario','=',$id_usuario)
            ->where('tareas.id_funcion','=',$funcion->id_funcion)
            ->where('tareas.estado', '=', 'activo')
            ->orderBy('tareas.tarea', 'asc')->get();

            foreach ($tareas as $tarea) {
                /*$contenedor= $contenedor."<li class=\"list-group-item\">";
                $contenedor= $contenedor."<span class=\"hasSub\"><i class=\"".$tarea->icono."\"></i><a href=\"".$tarea->vista."\"> ".$tarea->tarea."</a></span>";
                $contenedor= $contenedor."</li>";*/

                $contenedor= $contenedor."<li><a href=\"".$tarea->vista."\">".$tarea->tarea."</a></li>";
            }

            /*$contenedor= $contenedor."</ul>";
            $contenedor= $contenedor."</li>";*/

            $contenedor= $contenedor."</ul>";
            $contenedor= $contenedor."</li>";

        }

        return view('adminlte::home')->with('contenedor', $contenedor);
    }
}