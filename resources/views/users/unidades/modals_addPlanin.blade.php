<div id="edit" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><strong>Planificando tu clase</strong></h4>
          </div>
          <div class="modal-body">
            <div class="box box-success color-palette-box">
            	<div class="box-header with-border ">
            		<p class="text-justify"><strong>Nota:</strong> Las horas de clases son proporcionas por el horario que tu dirección te asigna, es importante que especifiques lo que esperas que alumno aprenda en cada tema. </p>
            	</div>
            	<div class="box-body">
            		<form  method="POST" id="data-form" >
            			{{ csrf_field() }}
            			<input type="text" class="form-control text-center"  name="id" id="id" style="display: none;">
            			<div class="row">
			            	<div class="col-md-6">
			            		 <div class="form-group">
					                <label>Tema: </label>
					                <input type="text" class="form-control text-center"  name="tema" id="tema" readonly>
					              </div>
			            	</div>
			            	<div class="col-md-6">
			            		<div class="row">
									<div class="col-md-6 col-md-offset-3 text-center">
										<label>No.semana:</label>
										<input type="text" class="form-control text-center"  name="semana" id="semana" value="1" readonly>
									</div>
								</div>
			            	</div>
			            </div>
			             <div class="row">
			            	<div class="col-md-6">
			            		<div class="form-group">
					                <label>Seleccionar dia:</label>

					                <div class="input-group date">
					                  <div class="input-group-addon">
					                    <i class="fa fa-calendar"></i>
					                  </div>
					                  <input type="text" class="form-control pull-right" name="dia" id="datepicker">
					                </div>
					                <!-- /.input group -->
					              </div>
			            	</div>
			            	<div class="col-md-6">
			            		<div class="row">
									<div class="col-md-6 col-md-offset-3 text-center">
										<label>Horas:</label>
										<input type="text" class="form-control text-center"  name="horas" id="horas" value="1" readonly>
									</div>
								</div>
			            	</div>
			            </div>
			            <div class="row">
			            	<div class="col-md-12">
			            		<div class="form-group">
				                  <label>Aprendizaje esperado:</label>
				                  <textarea class="form-control" rows="3" name="ae" id="ae" placeholder="Escribe aqui los aprendizajes especificos del alumno... "></textarea>
				                  <a href="#"><small class="pull-right text-blue">Ver sugerencias</small></a>
				                </div>
			            	</div>
			            </div>
			            <div class="row">
			            	<div class="col-md-12">
			            		<div class="form-group">
				                  <label>Actividades de aprendizaje:</label>
				                  <textarea class="form-control" name="aa" id="aa"  rows="3" placeholder="Escribe aqui la metodología de trabajo que utlizaras... "></textarea>
				                  <a href="#"><small class="pull-right text-blue">Ver sugerencias</small></a>
				                </div>
			            	</div>
			            </div>
			            <div class="row">
			            	<div class="col-md-12">
			            		<div class="form-group">
				                  <label>Evidencias de aprendizaje:</label>
				                  <textarea class="form-control" name="ea" id="ea" rows="3" placeholder="Escribe aqui los indicadores de aprendizaje... "></textarea>
				                  <a href="#"><small class="pull-right text-blue">Ver sugerencias</small></a>
				                </div>
			            	</div>
			            </div>
            		</form>
            	</div>
            </div>
	           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="storeData('data-form','{{ route('unidad.store') }}','{{Request::url()}}');">Guardar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<div id="delet" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="deleteContent">
          Are You sure want to delete <span class="title"></span>?
          <span class="hidden id"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning pull-left" data-dismiss="modal">Cerrar</button>
		<button class="btn btn-danger pull-right"> Confirmar</button>
      </div>
    </div>
  </div>
</div>

<div id="show" class="modal fade" role="dialog">
	  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title"></h4>
		      </div>
		      <div class="modal-body">
		      	 <div class="box box-primary color-palette-box">
            	 
            	 	<div class="box-body">
            	 		  <div class="row">
			            	<div class="col-md-12">
			            		<div class="form-group">
				                  <label>Aprendizaje esperado:</label>
				                  <textarea class="form-control" rows="3" name="ae" id="ae2" placeholder="Aqui se visualiza los aprendizajes especificos del alumno... " style="resize:none;" readonly></textarea>
				                </div>
			            	</div>
			            </div>
			            <div class="row">
			            	<div class="col-md-12">
			            		<div class="form-group">
				                  <label>Actividades de aprendizaje:</label>
				                  <textarea class="form-control" name="aa" id="aa2"  rows="3" placeholder="Aqui se visualiza la metodología de trabajo que utlizaras... " style="resize:none;" readonly></textarea>
				                </div>
			            	</div>
			            </div>
			            <div class="row">
			            	<div class="col-md-12">
			            		<div class="form-group">
				                  <label>Evidencias de aprendizaje:</label>
				                  <textarea class="form-control" name="ea" id="ea2" rows="3" placeholder="Aqui se visualiza los indicadores de aprendizaje... " style="resize:none;" readonly></textarea>
				                </div>
			            	</div>
			            </div>
            	 	</div>
            	 </div>	
		      </div>
		    </div>
	   </div>
</div>