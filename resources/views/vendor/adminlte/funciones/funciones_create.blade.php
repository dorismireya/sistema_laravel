@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
  Nueva Funcion
@endsection


@section('main-content')


<div class="box box-info">
  
  <!-- form start -->
  <br>
  {!! Form::open(['route' => 'funciones.store']) !!}
    <div class="box-body">

      <div class="form-group">
        {!! Form::label('funcion', 'Funcion', ['class' => 'col-sm-2 control-label']) !!} 
        <div class="col-sm-10">
          {!! Form::text('funcion', null, ['class' => 'form-control', 'placeholder'=>'Nombre de Funcion']) !!}
        </div>
      </div>

      <br>

      <div class="form-group">
        {!! Form::label('detalle', 'Detalle', ['class' => 'col-sm-2 control-label']) !!} 
        <div class="col-sm-10">
          {!! Form::text('detalle', null, ['class' => 'form-control', 'placeholder'=>'Detalle']) !!}
        </div>
      </div>

      {{Form::hidden('estado','activo')}}

      
    </div><!-- /.box-body -->
    <div class="box-footer">
      
      <a class="btn btn-default" href="{{route('adminFuncion.index')}}">
        <i class="fa fa-close"></i> Cancelar
      </a>

      
      <button type="submit" class="btn btn-info pull-right"><i class="fa fa-check"></i> Crear</button>
    </div><!-- /.box-footer -->
  {!! Form::close() !!} 
</div>
@endsection
