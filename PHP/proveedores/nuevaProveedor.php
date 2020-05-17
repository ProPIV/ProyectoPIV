<!-- quick email widget -->
<div id="seccion-proveedor">
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestión de Proveedores</i>
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
    
                <form class="form-horizontal" role="form"  id="fproveedor">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_proveedor">ID Proveedor:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_proveedor" name="id_proveedor" placeholder="ID"
                            value = "" readonly="true"  data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_proveedor">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" placeholder="Ingrese Nombre de Proveedor"
                            value = "">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="telefono">Telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese Nombre Telefono"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="direccion">Direccion:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese Nombre Direccion"
                            value = "">
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar Comuna">Grabar proveedor</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
</div>