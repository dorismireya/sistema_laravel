<?php

namespace App\Http\Controllers;

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
        Funcion::create($request->all());
        return redirect()->route('funcion.index');
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
