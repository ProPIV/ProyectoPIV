<!-- quick email widget -->
<div id="seccion-organizacion">
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestión de Organizacion</i>
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
    
                <form class="form-horizontal" role="form"  id="forganizacion">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_unidad_organizacional">ID Organizacion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_unidad_organizacional" name="id_unidad_organizacional" placeholder="Ingrese ID"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_unidad_organizacional">Nombre Organizacion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_unidad_organizacional" name="nombre_unidad_organizacional" placeholder="Ingrese Nombre de Organizacion"
                            value = "">
                        </div>
                    </div>
					
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_empresa">ID Empresa:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_empresa" name="id_empresa">
                         
							</select>	
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar Comuna">Grabar Organizacion</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
</div>