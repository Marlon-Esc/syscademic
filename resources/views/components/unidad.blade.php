@php
	$nom_tema= session('unidad');
	$cont=1;
@endphp
@component('users.unidades.select_unidad')
    @slot('title') {{ $materia[0]->nombre.' ('.$mod.')' }} @endslot
    @slot('modalidad') {{ $mod  }} @endslot
    @slot('clave') {{ $id  }} @endslot
    @slot('fk') {{ $fk  }} @endslot
	@slot('alert')
		@if (session('result_success'))
			<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> {{ session('result_success') }}</h4>
                Nota: Una vez que se han sido automatizada las fechas, estas son guardadas automaticamente por el sistema.
         	</div>
		@endif
		@if (session('result_error'))
			<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-exclamation-triangle"></i> {{ session('result_error') }}</h4>
         	</div>
		@endif
	@endslot
	@if ($total_temas > 0)
		@for ($i = 0; $i < $total_temas ; $i++)
			@php
				if ($desg_plan !== 0) {
					$in_fi= array();
	                foreach ($desg_plan as $value) {
	                	if ($value->fk_tema === null){
	                		continue;
	                	} else{
	                		($value->tema->no_unidad == $cont) ? array_push($in_fi, $value->fecha) : '';
	                	}
	                }
				 }
			@endphp
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
			            			@if ($desg_plan !== 0)
			            				<p><b>Inicio: </b>{{ date("d-m-Y",strtotime(current($in_fi)))  }}</p>
				            			<p><b>Fin:  </b>{{ date("d-m-Y",strtotime(end($in_fi))) }}</p>
				            			<br>
			            			@else
			            				<p><b>Inicio: </b>--</p>
				            			<p><b>Fin: </b>--</p>
				            			<br>
			            			@endif
			            		</div>
			            	</div>
			            	<div class="row">
			            		<div class="col-md-12">
			            			<a href="{{ route('unidad.plan',['id'=>$id,'no_unidad'=> $cont, 'mod'=> $mod]) }}" type="button" class="btn btn-block btn-warning btn-sm"><span class="fa fa-check-circle-o"></span> Planificar Unidad</a>

			            			<br>
			            			
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