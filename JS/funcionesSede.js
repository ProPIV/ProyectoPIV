var dt;

function sede() {
    $("#contenido").on("click", "button#actualizar", function() {
        var datos = $("#fsede").serialize();
        $.ajax({
            type: "get",
            url: "../PHP/sede/controladorSede.php",
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
                $("#titulo").html("Listado de sede");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("sede").removeClass("hide");
                $("sede").addClass("show")
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
            text: "¿Realmente desea borrar la Organizacion con codigo : " + codigo + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
            if (decision.value) {

                var request = $.ajax({
                    method: "get",
                    url: "../PHP/sede/controladorSede.php",
                    data: { codigo: codigo, accion: 'borrar' },
                    dataType: "json"
                })

                request.done(function(resultado) {
                    if (resultado.respuesta == 'correcto') {
                        swal(
                            'Borrado!',
                            'La Organizacion con codigo : ' + codigo + ' fue borrada',
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
        $("#titulo").html("Listado de sede");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("sede").removeClass("hide");
        $("sede").addClass("show");

    })

    $("#contenido").on("click", "button.btncerrar", function() {
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click", "button#nuevo", function() {
        $("#titulo").html("Nueva Organizacion");
        $("#nuevo-editar").load("../PHP/sede/nuevo.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("sede").removeClass("show");
        $("sede").addClass("hide");
        $.ajax({
            type: "get",
            url: "../PHP/sede/controladorSede.php",
            data: { accion: 'listar' },
            dataType: "json"
        }).done(function(resultado) {
            $("#id_ciudad option").remove()
            $("#id_ciudad").append("<option selecte value=''>Seleccione una ciudad</option>")
            $.each(resultado.data, function(index, value) {
                $("#id_ciudad").append("<option value='" + value.id_ciudad + "'>" + value.id_ciudad + "</option>")
            });
        });


    })

    $("#contenido").on("click", "button#grabar", function() {

        var datos = $("#fsede").serialize();
        $.ajax({
            type: "get",
            url: "../PHP/sede/controladorSede.php",
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
                $("#titulo").html("Listado de sede");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("sede").removeClass("hide");
                $("sede").addClass("show")
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
        $("#titulo").html("Editar organizacion");
        //Recupera datos del fromulario
        var codigo = $(this).data("codigo");
        var empresa

        $("#nuevo-editar").load("../PHP/sede/editar.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("sede").removeClass("show");
        $("sede").addClass("hide");
        $.ajax({
            type: "get",
            url: "../PHP/sede/controladorSede.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(organizacion) {
            if (organizacion.respuesta === "no existe") {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Organizacion no existe!!!!!'
                })
            } else {
                $("#id_sede").val(organizacion.codigo);
                $("#nombre_sede").val(organizacion.nombre_sede);
                empresa = organizacion.id_municipio;

            }
        });
        $.ajax({
            type: "get",
            url: "../PHP/sede/controladorSede.php",
            data: { accion: 'listar' },
            dataType: "json"
        }).done(function(resultado) {
            $("#id_municipio option").remove();
            $.each(resultado.data, function(index, value) {

                if (empresa === value.id_municipio) {
                    $("#id_municipio").append("<option selected value='" + value.id_municipio + "'>" + value.nombre_empresa + "</option>")
                } else {
                    $("#id_municipio").append("<option value='" + value.id_municipio + "'>" + value.nombre_empresa + "</option>")
                }
            });
        });

    })
}


$(document).ready(() => {
    $("#contenido").off("click", "a.editar");
    $("#contenido").off("click", "button#actualizar");
    $("#contenido").off("click", "a.borrar");
    $("#contenido").off("click", "button#nuevo");
    $("#contenido").off("click", "button#grabar");
    $("#titulo").html("Listado de sede");
    dt = $("#tabla").DataTable({

        "ajax": "../PHP/sede/controladorSede.php?accion=listar",
        "columns": [
            { "data": "id_sede" },
            { "data": "nombre_sede" },
            { "data": "nombre_empresa" },
            {
                "data": "id_sede",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>'
                }
            },
            {
                "data": "id_sede",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
    });


    sede();


});