<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Modelos\Funcion;

class FuncionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$funciones = Funcion::all();
        return view('funcion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tarea_valida= DB::table('tareas')
        ->join('usuarios_tareas','usuarios_tareas.id_tarea','=','tareas.id_tarea')
        ->select(DB::raw('count(tareas.id_tarea) AS cantidad'))
        ->where('usuarios_tareas.id_usuario', '=', Auth()->user()->id)
        ->where('tareas.vista', '=', 'adminFuncion')->get();

        if($tarea_valida[0]->cantidad == 0)
            return view('adminlte::errors.404');

        return view('adminlte::funciones.funciones_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $funcion_existe= DB::table('funciones')
        ->select(DB::raw('count(funciones.id_funcion) AS cantidad'))
        ->where('funciones.funcion', '=', $request->input('funcion'))->get();

        if($funcion_existe[0]->cantidad == 0){

            Funcion::create($request->all());
            return redirect()->route('adminFuncion.index');
        }else{

            return redirect()->route('funciones.create',['funcion' => $request->input('funcion')]);
        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcion = Funcion::findOrFail($id);
        return view('funciones.view', compact('funciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $funcion = Funcion::findOrFail($id);
        return view('funciones.edit', compact('funciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $funcion = Funcion::findOrFail($id);
        $funcion->fill($request->all());
        $funcion->save();
        return redirect()->route('funciones.show', ['id' => $funcion->id_funcion]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcion = Funcion::findOrFail($id);
        $funcion->delete();
        return redirect()->route('funcion.index');
    }
}
