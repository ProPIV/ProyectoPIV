var dt;

function Proveedor() {
    $("#contenido").on("click", "button#actualizar", function() {
        var datos = $("#fproveedor").serialize();
        $.ajax({
            type: "get",
            url: "../php/proveedores/controladorProveedor.php",
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
                $("#titulo").html("Listado de Proveedores");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#municipio").removeClass("hide");
                $("#municipio").addClass("show")
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
        var id_proveedor = $(this).data("id_proveedor");

        swal({
              title: '¿Está seguro?',
              text: "¿Realmente desea borrar el proveedor con codigo : " + id_proveedor + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "../PHP/proveedores/controladorProveedor.php",
                        data: {id_proveedor: id_proveedor, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El proveedor con ID : ' + id_proveedor + ' fue borrado',
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
        $("#titulo").html("Listado de Proveedores");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#municipio").removeClass("hide");
        $("#municipio").addClass("show");

    })

    $("#contenido").on("click", "button.btncerrar", function() {
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click", "button#nuevo", function() {
        $("#titulo").html("Nuevo Titular");
        $("#nuevo-editar").load("../php/proveedores/nuevaProveedor.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#titular").removeClass("show");
        $("#titular").addClass("hide");
    })

    $("#contenido").on("click", "button#grabar", function() {

        var datos = $("#fproveedor").serialize();
        console.log(datos);
        $.ajax({
            type: "get",
            url: "../PHP/proveedores/controladorProveedor.php",
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
                $("#titulo").html("Listado de Proveedores");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#titular").removeClass("hide");
                $("#titular").addClass("show")
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
        var id_proveedor = $(this).data("id_proveedor");
        $("#nuevo-editar").load("../php/proveedores/editarProveedor.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#titular").removeClass("show");
        $("#titular").addClass("hide");
        $.ajax({
            type: "get",
            url: "../php/proveedores/controladorProveedor.php",
            data: { id_proveedor: id_proveedor, accion: 'consultar' },
            dataType: "json"
        }).done(function(proveedor) {
            if (proveedor.respuesta === "no existe") {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'El titular no existe!'
                })
            } else {
                id_proveedor = proveedor.id_proveedor;
                $("#id_proveedor").val(proveedor.id_proveedor);
                $("#nombre_proveedor").val(proveedor.nombre_proveedor);
                $("#telefono").val(proveedor.telefono);
                $("#direccion").val(proveedor.direccion);

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
    $("#titulo").html("Listado de Proveedores");
    dt = $("#tabla").DataTable({
        "ajax": "proveedores/controladorProveedor.php?accion=listar",
        "columns": [
            { "data": "id_proveedor" },
            { "data": "nombre_proveedor" },
            { "data": "telefono" },
            { "data": "direccion" },
            {
                "data": "id_proveedor",
                render: function(data) {
                    return '<a href="#" data-id_proveedor="' + data +
                        '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>'
                }
            },
            {
                "data": "id_proveedor",
                render: function(data) {
                    return '<a href="#" data-id_proveedor="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
    });
    Proveedor();
});