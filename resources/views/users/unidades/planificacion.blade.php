@extends('layouts.app')
@section('section', 'Planificación')
@section('title', 'Unidades  >  Planificación')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary color-palette-box">
				<div class="box-header with-border ">
					<p><b><h4>Planificación de tu unidad</h4></b></p>
					<p class="text-justify">En está sección encontraras toda la información por unidad de acuerdo al plan de estudios vigente. Podras editar, agregar y eliminar ésta información para adecuarlo a la planeación </p>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<button type="button" class="btn btn-info pull-right" style="margin-right: 5px;" data-toggle="modal" data-target="#modal-aa">
						        <i class="fa fa-pencil"></i> Planificar clase
						    </button>
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-4">
							<div class="box box-info color-palette-box">
								<div class="box-header with-border ">
									<div class="row">
										<div class="col-md-12">	
											<div class="col-sm-1"><h2 class="text-center">0</h2></div>
										    <div class="col-md-10 text-center"><p>Aprendizajes Esperados</p></div>
										</div>
										
									</div>
								</div>
								<div class="box-body ">
									<ul class="nav nav-pills nav-stacked">
						                <li><a href="#" style=" border-left-color: #f56954;">No se han encontrado registros...</a></li>
						                <li><a href="#" style="border-left-color: #f56954;">No se han encontrado registros...</a></li>
						                <li><a href="#" style="border-left-color: #f56954;">No se han encontrado registros...</a></li>
						                <br>
						                <li>
						                	<div class="row">
												<div class="col-md-5 col-md-offset-3">
													<button type="button" class="btn btn-block btn-warning">ver mas</button>
												</div>
											</div>
						                </li>
						              </ul>
								</div>
							</div>			
						</div>
						<div class="col-md-4">	
							<div class="box box-success color-palette-box">
								<div class="box-header with-border ">
									<div class="row">
										<div class="col-md-12">	
											<div class="col-sm-1"><h2 class="text-center">0</h2></div>
										    <div class="col-md-10 text-center"><p>Actividades de Aprendizaje</p></div>
										</div>
									</div>
								</div>	
								<div class="box-body">
									<ul class="nav nav-pills nav-stacked">
						                <li><a href="#" style=" border-left-color: #39CCCC;">No se han encontrado registros...</a></li>
						                <li><a href="#" style="border-left-color: #39CCCC;">No se han encontrado registros...</a></li>
						                <li><a href="#" style="border-left-color: #39CCCC;">No se han encontrado registros...</a></li>
						                <br>
						                <li>
						                	<div class="row">
												<div class="col-md-5 col-md-offset-3">
													<button type="button" class="btn btn-block btn-warning">ver mas</button>
												</div>
											</div>
						                </li>
						              </ul>
								</div>
							</div>		
						</div>
						<div class="col-md-4">	
							<div class="box box-danger color-palette-box">
								<div class="box-header with-border ">
									<div class="row">
										<div class="col-md-12">	
											<div class="col-sm-1"><h2 class="text-center">0</h2></div>
										    <div class="col-md-10 text-center"><p>Evidencias de Aprendizaje</p></div>
										</div>
									</div>
								</div>
								<div class="box-body">
					              <ul class="nav nav-pills nav-stacked">
					                <li><a href="#" style=" border-left-color: #605ca8;">No se han encontrado registros...</a></li>
					                <li><a href="#" style="border-left-color: #605ca8;">No se han encontrado registros...</a></li>
					                <li><a href="#" style="border-left-color: #605ca8;">No se han encontrado registros...</a></li>
					                <br>
					                <li>
					                	<div class="row">
											<div class="col-md-5 col-md-offset-3">
												<button type="button" class="btn btn-block btn-warning">ver mas</button>
											</div>
										</div>
					                </li>
					              </ul>
								</div>
							</div>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-success color-palette-box ">
				<div class="box-header with-border">
					<p ><b><h5  class="text-center">Distribuye las horas y las clases de tu unidad</h5></b></p>
					<p  class="text-justify">Las horas y clases aquí propuestas son sugerencias propuestas por el sistema. Aquí puedes modificar y adecuar el tiempo según tu contenido educativo. Te invitamos a revisar tu calendario escolar para determinar que la fecha de incio y término de tu unidad sean correctas.</p>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-3">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 text-center">
									<label>Horas</label>
									<input type="number" class="form-control text-center"  name="canti" value="1">
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 text-center">
									<label>Clases</label>
									<input type="number" class="form-control text-center"  name="canti" value="1">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group text-center">
				                <label>Inicio y fin de la unidad</label>
				                  <button type="button" class="btn btn-block  btn-default pull-right" id="daterange-btn">
				                    <span>
				                      <i class="fa fa-calendar"></i> Seleccionar rango
				                    </span>
				                    <i class="fa fa-caret-down"></i>
				                  </button>
				              </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @include('users.unidades.modals_addPlanin')
@endsection