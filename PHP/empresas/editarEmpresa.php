   <div id="seccion-empresas">
    <div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestion de Empresas</i>
        
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
    
                <form class="form-horizontal" role="form"  id="fempresas">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_empresa">ID Empresa:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_empresa" name="id_empresa" placeholder="Ingrese ID"
                            value = "" readonly="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre_empresa">Nombre Empresa:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="Ingrese Nombre Empresa"
                            value = "">
                        </div>
                    </div>
					
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_sede">ID Sede:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_sede" name="id_sede">
							
							</select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id_proveedor">ID Proveedor:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="id_proveedor" name="id_proveedor">
							
							</select>
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizar" data-toggle="tooltip" title="Actualizar Empresa" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrar2"> Cancelar </button>
                        </div>

                    </div>                    

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
    <input type="hidden" id="pagina" value="editar" name="editar"/>
</div>