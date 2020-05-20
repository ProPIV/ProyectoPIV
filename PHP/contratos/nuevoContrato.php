<!-- quick email widget -->
<div id="seccion-contrato">
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestión de contrato</i>
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
    
                <form class="form-horizontal" role="form"  id="fcontrato">


                <div class="form-group">
                        <label class="control-label col-sm-2" for="id_contrato">Id del contrato:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_contrato" name="id_contrato" placeholder="Ingrese el id del contrato"
                            value = "" readonly="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_empleado">Id del empleado:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_empleado" name="id_empleado" placeholder="Ingrese el id del empleado"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fecha_ini">Fecha de inicio:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fecha_ini" name="fecha_ini" placeholder="Ingrese la fecha de inicio"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="fecha_fin">Fecha final:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fecha_fin" name="fecha_fin" placeholder="Ingrese la fecha final"
                            value = "">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_proveedor">Id del proveedor:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_proveedor" name="id_proveedor" placeholder="Ingrese el id del proveedor"
                            value = "">
                        </div>
                    </div>
					
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_tipo_contrato">Tipo de contrato:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_tipo_contrato" name="id_tipo_contrato">
							
							</select>
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar contrato">Grabar contrato</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
</div>