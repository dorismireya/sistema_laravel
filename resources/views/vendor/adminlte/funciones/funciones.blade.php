@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
	Funciones
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		
		<a class="btn btn-primary">
            <i class="fa fa-plus"></i> Nueva Funcion
      	</a>
	</div>
	<br>


	<?php

		for($i=0; $i < count($arreglos); $i++){

			if($arreglos[$i][0] == "funcion"){

				if($i!=0){

					?>

								</table>
			                </div><!-- /.box-body -->
			              </div><!-- /.box -->
			            </div>
			          </div>
					<?php
				}

				?>

					<div class="row">
            			<div class="col-xs-12">
              				<div class="box">
				                <div class="box-header">
				                  <h3 class="box-title">Funcion: {{$arreglos[$i][2]}} </h3>
				                  <div class="box-tools">

				                  	<div class="btn-group">
		                      			<a class="btn btn-delault" data-toggle="tooltip" title="Nueva Tarea para la funcion: {{$arreglos[$i][2]}}">
		                    				<i class="fa fa-plus"></i>
		                  				</a>
		                  				<a class="btn btn-delault" data-toggle="tooltip" title="Editar Funcion: {{$arreglos[$i][2]}}">
		                    				<i class="fa fa-edit"></i>
		                  				</a>
		                  				<a class="btn btn-delault" data-toggle="tooltip" title="Eliminar Funcion: {{$arreglos[$i][2]}}">
		                    				<i class="fa fa-trash"></i>
		                  				</a>
		                  			</div>
				                  </div>
				                </div><!-- /.box-header -->
				                <div class="box-body table-responsive no-padding">
				                  <table class="table table-striped">
				                    <tr>
				                      <th>Tarea</th>
				                      <th>Vista</th>
				                      <th>Icono</th>
				                      <th>Detalle</th>
				                      <th>
				                      </th>
				                    </tr>

				<?php

			}else{

				?>
					<tr>
                      	<td>{{$arreglos[$i][2]}}</td>
                      	<td>{{$arreglos[$i][3]}}</td>
                      	<td>{{$arreglos[$i][4]}}</td>
                      	<td>{{$arreglos[$i][5]}}</td>
                      	<td>
                      		<div class="btn-group">
                      			<a class="btn btn-delault" data-toggle="tooltip" title="Ver usuarios">
                    				<i class="fa fa-users"></i>
                  				</a>
                  				<a class="btn btn-delault" data-toggle="tooltip" title="Editar Tarea: {{$arreglos[$i][2]}}">
                    				<i class="fa fa-edit"></i>
                  				</a>
                  				<a class="btn btn-delault" data-toggle="tooltip" title="Eliminar Tarea: {{$arreglos[$i][2]}}">
                    				<i class="fa fa-trash"></i>
                  				</a>
                  			</div>
                      	</td>
                    </tr>
					

				<?php
			}
		}

		?>

					</table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
		<?php
	?>

@endsection
