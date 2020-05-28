var dt;

function Admin() {
    $("#contenido").on("click", "button#actualizar", function() {
        var datos = $("#fusuarios").serialize();
        $.ajax({
            type: "get",
            url: "../php/admin/controladorAdmin.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            console.log(resultado);
            if (resultado.respuesta) {
                swal(
                    'Actualizado!',
                    'Se actaulizaron los datos correctamente',
                    'success'
                )
                dt.ajax.reload();
                $("#titulo").html("Listado de Usuarios");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#Usuarios").removeClass("hide");
                $("#Usuarios").addClass("show")
            } else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        });
    })

    $("#contenido").on("click","a.borrar",function(){
        //Recupera datos del formulario
        var id_empleado = $(this).data("id_empleado");

        swal({
              title: '¿Está seguro?',
              text: "¿Realmente desea borrar el usuario con el ID : " + id_empleado + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "../PHP/admin/controladorAdmin.php",
                        data: {id_empleado: id_empleado, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El usuario con el ID : ' + id_empleado + ' fue borrado',
                                'success'
                            )     
                            dt.ajax.reload();                            
                        } else {
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Something went wrong!'                         
                            })
                        }
                    });
                     
                    request.fail(function( jqXHR, textStatus ) {
                        swal({
                          type: 'error',
                          title: 'Oops...',
                          text: 'Something went wrong!' + textStatus                          
                        })
                    });
                }
        })

    });

    $("#contenido").on("click", "button.btncerrar2", function() {
        $("#titulo").html("Listado de Usuarios");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#Usuarios").removeClass("hide");
        $("#Usuarios").addClass("show");

    })

    $("#contenido").on("click", "button.btncerrar", function() {
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click", "button#nuevo", function() {
        $("#titulo").html("Nuevo Usuario");
        $("#nuevo-editar").load("../php/admin/nuevoAdmin.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#Usuarios").removeClass("show");
        $("#Usuarios").addClass("hide");
        $.ajax({
            type:"get",
            url:"../php/admin/controladorAdmin.php",
            data: {accion:'ciudad'},
            dataType:"json"
          }).done(function( resultado ) {   
             console.log(resultado.data)           
             $("#id_ciudad option").remove()       
             $("#id_ciudad").append("<option selecte value=''>Seleccione una Ciudad</option>")
             $.each(resultado.data, function (index, value) { 
                $("#id_ciudad").append("<option value='" + value.id_ciudad + "'>" + value.nombre_ciudad + "</option>")
              });
          });
          $.ajax({
            type:"get",
            url:"../php/admin/controladorAdmin.php",
            data: {accion:'unidad'},
            dataType:"json"
          }).done(function( resultado ) {   
             console.log(resultado.data)           
             $("#id_unidad_organizacional option").remove()       
             $("#id_unidad_organizacional").append("<option selecte value=''>Seleccione una Unidad Organizacional</option>")
             $.each(resultado.data, function (index, value) { 
                $("#id_unidad_organizacional").append("<option value='" + value.id_unidad_organizacional + "'>" + value.nombre_unidad_organizacional + "</option>")
              });
          });
          $.ajax({
            type:"get",
            url:"../php/admin/controladorAdmin.php",
            data: {accion:'rol'},
            dataType:"json"
          }).done(function( resultado ) {   
             console.log(resultado.data)           
             $("#id_rol option").remove()       
             $("#id_rol").append("<option selecte value=''>Seleccione un Rol</option>")
             $.each(resultado.data, function (index, value) { 
                $("#id_rol").append("<option value='" + value.id_rol  + "'>" + value.nombre_rol + "</option>")
              });
          });
    })

    $("#contenido").on("click", "button#grabar", function() {

        var datos = $("#fusuarios").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "../PHP/admin/controladorAdmin.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            if (resultado.respuesta) {
                swal(
                    'Grabado!!',
                    'El registro se grabó correctamente',
                    'success'
                )
                dt.ajax.reload();
                $("#titulo").html("Listado de usuarios");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#Usuarios").removeClass("hide");
                $("#Usuarios").addClass("show")
            } else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        });
    });


    $("#contenido").on("click", "a.editar", function() {
        $("#titulo").html("Editar Proveedor");
        //Recupera datos del fromulario
        var id_empleado = $(this).data("id_empleado");
        $("#nuevo-editar").load("../php/admin/editarAdmin.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#Usuarios").removeClass("show");
        $("#Usuarios").addClass("hide");
        $.ajax({
            type: "get",
            url: "../php/admin/controladorAdmin.php",
            data: { id_empleado: id_empleado, accion: 'consultar' },
            dataType: "json"
        }).done(function(usuario) {
            if (usuario.respuesta === "no existe") {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'El titular no existe!'
                })
            } else {
                id_proveedor = usuario.id_proveedor;
                $("#id_proveedor").val(usuario.id_proveedor);
                $("#nombre_proveedor").val(usuario.nombre_proveedor);
                $("#telefono").val(usuario.telefono);
                $("#direccion").val(usuario.direccion);

            }
        });
    })

}

$(document).ready(() => {
    $("#contenido").off("click", "a.editar");
    $("#contenido").off("click", "button#actualizar");
    $("#contenido").off("click", "a.borrar");
    $("#contenido").off("click", "button#nuevo");
    $("#contenido").off("click", "button#grabar");
    $("#titulo").html("Listado de Usuarios");
    dt = $("#tabla").DataTable({
        "ajax": "admin/controladorAdmin.php?accion=listar",
        "columns": [
            { "data": "id_empleado" },
            { "data": "tipo_documento" },
            { "data": "documento" },
            { "data": "nombre_empleado" },
            { "data": "apellido" },
            { "data": "usuario" },
            { "data": "password" },
            { "data": "direccion" },
            { "data": "telefono" },
            { "data": "nombre_ciudad" },
            { "data": "nombre_unidad_organizacional" },
            { "data": "nombre_rol" },
            {
                "data": "id_empleado",
                render: function(data) {
                    return '<a href="#" data-id_empleado="' + data +
                        '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>'
                }
            },
            {
                "data": "id_empleado",
                render: function(data) {
                    return '<a href="#" data-id_empleado="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
    });
    Admin();
});