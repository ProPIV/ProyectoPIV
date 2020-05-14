var dt;

function proveedor() {
    $("#contenido").on("click", "button#actualizar", function() {
        var datos = $("#fproveedor").serialize();
        $.ajax({
            type: "get",
            url: "../PHP/proveedores/controladorProveedor.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            if (resultado.respuesta) {
                swal(
                    'Actualizado!',
                    'Se actaulizaron los datos correctamente',
                    'success'
                )
                dt.ajax.reload();
                $("#titulo").html("Listado proveedores");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#proveedor").removeClass("hide");
                $("#proveedor").addClass("show")
            } else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        });
    })

    $("#contenido").on("click", "a.borrar", function() {
        //Recupera datos del formulario
        var codigo = $(this).data("codigo");

        swal({
            title: '¿Está seguro?',
            text: "¿Realmente desea borrar la proveedor con codigo : " + codigo + " ?",
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
                    data: { codigo: codigo, accion: 'borrar' },
                    dataType: "json"
                })

                request.done(function(resultado) {
                    if (resultado.respuesta == 'correcto') {
                        swal(
                            'Borrado!',
                            'La proveedor con codigo : ' + codigo + ' fue borrada',
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

                request.fail(function(jqXHR, textStatus) {
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
        $("#titulo").html("Listado proveedores");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#proveedor").removeClass("hide");
        $("#proveedor").addClass("show");

    })

    $("#contenido").on("click", "button.btncerrar", function() {
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click", "button#nuevo", function() {
        $("#titulo").html("Nuevo proveedor");
        $("#nuevo-editar").load("../PHP/proveedores/nuevo.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#proveedor").removeClass("show");
        $("#proveedor").addClass("hide");
        $.ajax({
            type: "get",
            url: "../PHP/proveedores/controladorProveedor.php",
            data: { accion: 'listar' },
            dataType: "json"
        })


    })

    $("#contenido").on("click", "button#grabar", function() {

        var datos = $("#fproveedor").serialize();
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
                $("#titulo").html("Listado proveedores");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#proveedor").removeClass("hide");
                $("#proveedor").addClass("show")
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
        $("#titulo").html("Editar proveedor");
        //Recupera datos del fromulario
        var codigo = $(this).data("codigo");

        $("#nuevo-editar").load("../PHP/proveedores/editar.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#proveedor").removeClass("show");
        $("#proveedor").addClass("hide");
        $.ajax({
            type: "get",
            url: "../PHP/proveedores/controladorProveedor.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(proveedor) {
            if (proveedor.respuesta === "no existe") {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'proveedor no existe!!!!!'
                })
            } else {
                $("#id_proveedor").val(proveedor.codigo);
                $("#nombre_proveedor").val(proveedor.nombre_proveedor);

            }
        });
        $.ajax({
            type: "get",
            url: "../PHP/proveedores/controladorProveedor.php",
            data: { accion: 'listar' },
            dataType: "json"
        })

    })
}


$(document).ready(() => {
    $("#contenido").off("click", "a.editar");
    $("#contenido").off("click", "button#actualizar");
    $("#contenido").off("click", "a.borrar");
    $("#contenido").off("click", "button#nuevo");
    $("#contenido").off("click", "button#grabar");
    $("#titulo").html("Listado de proveedores");
    dt = $("#tabla").DataTable({
        "ajax": "../PHP/proveedores/controladorProveedor.php?accion=listar",
        "columns": [
            { "data": "id_proveedor" },
            { "data": "nombre_proveedor" },
            {
                "data": "id_proveedor",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>'
                }
            },
            {
                "data": "id_proveedor",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
    });
    proveedor();

});