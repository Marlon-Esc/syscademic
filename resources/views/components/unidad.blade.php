@php
	$nom_tema= session('unidad');
	$cont=1;
@endphp
@component('users.unidades.select_unidad')
    @slot('title') {{ $materia[0]->nombre }} @endslot
    @slot('modalidad') {{ $mod  }} @endslot
	@if ($total_temas > 0)
		@for ($i = 0; $i < $total_temas ; $i++)
		    <div class="col-md-4">
		          <div class="box box-solid">
		            <div class="box-header with-border">
		              <h6 class="box-title">Unidad {{ $cont }} </h6>
		            </div>
		            <!-- /.box-header -->
		            <div class="box-body">
		            	<div class="container-fluid">
		            		<div class="row">
			            		<div class="col-md-12">
			            			<strong>Unidad {{ $cont }}</strong>
			            		</div>
			            	</div>
			            	<div class="row">
			            		<div class="col-md-12">
			            			<br>
			            			<p class="text-muted text-center"> {{ $nom_tema[$i] }} </p>
			            			<p><b>Inicio: </b>--</p>
			            			<p><b>Fin: </b>--</p>
			            			<br>
			            		</div>
			            	</div>
			            	<div class="row">
			            		<div class="col-md-12">
			            			<a href="{{ route('unidad.plan',['id'=>$id,'no_unidad'=> $cont, 'mod'=> $mod]) }}" type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-check-circle-o"></span> Planificar Unidad</a>

			            			<br>
			            			<small class="text-green">Editado 01-01-2018 00:00:00 hrs</small>
			            		</div>
			            	</div>
		            	</div>
		            </div>
		            <!-- /.box-body -->
		          </div>
		          <!-- /.box -->
		        </div>
		        @php
		        	$cont++;
		        @endphp
		  @endfor
	@else
	<div class="box-body">
		<div class="callout callout-danger">
	        <h4><strong>¡Ups!</strong> Lo sentimos :(</h4>
	        <p>No se han cargado las unidades y los temas de esta materia</p>
        </div>
	</div>
	@endif
@endcomponent