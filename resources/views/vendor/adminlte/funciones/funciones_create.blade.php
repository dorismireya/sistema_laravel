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
  <form class="form-horizontal">
    <div class="box-body">
      <div class="form-group">
        <label for="inputFuncion" class="col-sm-2 control-label">Funcion</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputFuncion" placeholder="Nombre de Funcion">
        </div>
      </div>
      <div class="form-group">
        <label for="inputDetalle" class="col-sm-2 control-label">Detalle</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputDetalle" placeholder="Detalle">
        </div>
      </div>
      
    </div><!-- /.box-body -->
    <div class="box-footer">
      
      <a class="btn btn-default" href="{{route('adminFuncion.index')}}">
        <i class="fa fa-close"></i> Cancelar
      </a>

      
      <button type="submit" class="btn btn-info pull-right"><i class="fa fa-check"></i> Crear</button>
    </div><!-- /.box-footer -->
  </form>
</div>
@endsection
