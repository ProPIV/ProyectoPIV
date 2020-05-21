<div id="nuevo-editar" class="hide">
		<!-- div para cargar el formulario para un nuevo user o editar un user -->
</div>

<div id="empresa">
<div class="box-header">
    <i class="ion ion-clipboard"></i>
     <!-- tools box -->
    <div class="pull-right box-tools">
    	<button class="btn btn-info btn-sm" id="nuevo"  data-toggle="tooltip" title="Nueva Empresa"><i class="fa fa-plus" aria-hidden="true"></i></button> 
    	<button class="btn btn-info btn-sm btncerrar"  data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>

    </div><!-- /. tools -->
                  
</div><!-- /.box-header -->

<div class="box-body">
             
<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>ID Empresa</th>
			<th>Nombre Empresa</th>
            <th>ID Sede</th>
			<th>ID Proveedor</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	
	</tbody>

</table>

</div><!-- /.box-body -->  
<script src="../js/funcionesEmpresas.js"></script>

<a class="btn btn-primary" href="../php/Reportes/ReportesEmpresa.php" role="button">Reportes Pdf</a>