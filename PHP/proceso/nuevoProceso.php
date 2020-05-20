<!-- quick email widget -->
<div id="seccion-proceso">
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestión de Proceso</i>
        <!-- tools box -->
        <div class="pull-right box-tools">
        	<button class="btn btn-info btn-sm btncerrar2" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div>
    <div class="box-body">

		<div align ="center">
				<div id="actual"> 
				</div>
		</div>


        <div class="panel-group"><div class="panel panel-primary">
            <div class="panel-heading">Datos</div>
            <div class="panel-body">
    
                <form class="form-horizontal" role="form"  id="fproceso">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_proceso">Id del proceso:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_proceso" name="id_proceso" placeholder="Ingrese el id del proceso."
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_proceso">Nombre del proceso:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_proceso" name="nombre_proceso" placeholder="Ingrese Nombre del proceso"
                            value = "">
                        </div>
                    </div>
					
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="Descripcion">Descripcion:</label>
                        <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Ingrese una descripcion del proceso"
                            value = ""></textarea>
                         
							</select>	
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar Proceso">Grabar Proceso</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
</div>