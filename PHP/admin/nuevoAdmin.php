<!-- quick email widget -->
<div id="seccion-usuarios">
    <div class="box-header">
        <i class="fa fa-building" aria-hidden="true">Gestión de Usuarios</i>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-info btn-sm btncerrar2" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div>
    <div class="box-body">

        <div align="center">
            <div id="actual">
            </div>
        </div>


        <div class="panel-group">
            <div class="panel panel-primary">
                <div class="panel-heading">Datos</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" id="fusuarios">


                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_empleado">ID Usuario:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_empleado" name="id_empleado" placeholder="ID" value="" readonly="true" data-validation="length alphanumeric" data-validation-length="3-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="tipo_documento">Tipo de documento:</label>
                            <div class="col-sm-10">
                            <select class="form-control" id="tipo_documento" name="tipo_documento" placeholder=" Seleccione Tipo de documento">
                                <option value="CC">Cedula</option>
                                <option value="TI">Tarjeta de Identidad</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="documento">documento:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="documento" name="documento" placeholder="Ingrese numero de documento" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre_empleado">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_empleado" name="nombre_empleado" placeholder="Ingrese Nombre" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="apellido">Apellido:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese Apellido" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="usuario">Usuario:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese Usuario" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="password">Contraseña:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese Contraseña" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="direccion">Direccion:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese Direccion" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="telefono">Telefono:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese Nombre Direccion" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_ciudad">Ciudad:</label>
                            <div class="col-sm-10">
                            <select class="form-control" id="id_ciudad" name="id_ciudad">
                         
							</select>	
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_unidad_organizacional">Unidad Organizacional:</label>
                            <div class="col-sm-10">
                            <select class="form-control" id="id_unidad_organizacional" name="id_unidad_organizacional">
                         
							</select>	
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_rol">Rol:</label>
                            <div class="col-sm-10">
                            <select class="form-control" id="id_rol" name="id_rol">
                         
							</select>	
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_empresa">Empresa:</label>
                            <div class="col-sm-10">
                            <select class="form-control" id="id_empresa" name="id_empresa">
                         
							</select>	
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id_permiso">Permiso:</label>
                            <div class="col-sm-10">
                            <select class="form-control" id="id_permiso" name="id_permiso">
                         
							</select>	
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar usuario">Grabar usuario</button>
                                <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                            </div>
                        </div>

                        <input type="hidden" id="nuevo" value="nuevo" name="accion" />
                        </fieldset>

                    </form>
                </div>
            </div>