@extends('layouts.app')
@section('section', 'Planificación')
@section('title', 'Unidades  >  Planificación')
@section('content')
@php
	$sesion= session('reparto');
	
@endphp
	
	<div class="row">
		<div class="col-md-12">
			<div class="box box-success color-palette-box ">
				<div class="box-header with-border">
					<p ><b><h5  class="text-center">Planificación de temas</h5></b></p>
					<p  class="text-justify">Los dias de clases propuestas son sugerencias por el sistema. Aquí puedes modificar y adecuar el tiempo según tu contenido educativo. Te invitamos a revisar tu calendario escolar para determinar que la fecha de inicio y término de tu unidad sean correctas.</p>
				</div>
				<div class="box-body table-responsive no-padding"><br>
					<div class="col-xs-12">
						<table class="table table-hover" id="myTable">
			            	<thead>
			            		<tr>
			            			<th>Semana</th>
			            			<th class="text-center">Fecha</th>
			            			<th>Tema</th>
			            			<th>Horas</th>
			            			<th class="text-center">Acción</th>
			            		</tr>
			            	</thead>
			            	<tbody>
			            		@if ($desg_plan !== 0)
			            		
			            			@for ($i = 0; $i < count($desg_plan) ; $i++)
			            				@php
			            				   $after = $i+1;
			            				   
								           ($after == count($desg_plan)) ? $after = $i : '' ;

			            				@endphp
			            				@continue($desg_plan[$i]->fk_tema === null)
			            				@if ($desg_plan[$i]->tema->no_unidad == $no_unidad)
											<tr>
												<td class="text-center">{{ $desg_plan[$i]->semana }}</td>
												<td>{{date('d-m-Y',strtotime($desg_plan[$i]->fecha)) }}</td>
												<td >{{ $desg_plan[$i]->tema->unidad  }}  {{ $desg_plan[$i]->tema->nom_tema  }}</td>
						            			<td class="text-center">{{ $desg_plan[$i]->horas }}</td>
						            			<td>
						            				<a href="#" rel="tooltip" class="show-modal text-aqua btn-simple btn-sm" title="Ver tema"data-toggle="modal" data-target="#show" data-ae="{{ $desg_plan[$i]->aprendisaje_esperado	 }}" data-aa="{{ $desg_plan[$i]->actividad_aprendisaje }}" data-ea="{{ $desg_plan[$i]->evidencias_aprendido }}">
										              <i class="fa fa-eye"></i>
										            </a>
										            <a href="#" class="edit-modal text-green btn-simple btn-sm" title="Editar tema" data-toggle="modal" data-target="#edit" data-id="{{$desg_plan[$i]->id  }}" data-fech="{{date('d-m-Y',strtotime($desg_plan[$i]->fecha)) }}" data-sem="{{ $desg_plan[$i]->semana }}" data-tem="{{ $desg_plan[$i]->tema->nom_tema }}" data-hrs="{{ $desg_plan[$i]->horas }}" data-ae="{{ $desg_plan[$i]->aprendisaje_esperado	 }}" data-aa="{{ $desg_plan[$i]->actividad_aprendisaje }}" data-ea="{{ $desg_plan[$i]->evidencias_aprendido }}">
										              <i class="fa fa-edit"></i>
										            </a>
										       
						            			</td>
			            					</tr>
			            				@endif
			            			@endfor
				            	@else
				            		
				            	@endif
			            	</tbody>
			            </table>
					</div>
			    </div>
		    </div>
	    </div>
 @include('users.unidades.modals_addPlanin')
@endsection