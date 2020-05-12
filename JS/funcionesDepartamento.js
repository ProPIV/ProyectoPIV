
$(document).ready(() => {
  $("#contenido").off("click", "a.editar");
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");
  $("#titulo").html("Listado de paises");
  dt = $("#tabla").DataTable({
        "ajax": "departamento/controladorDepartamento.php?accion=listar",
        "columns": [
            { "data": "id_departamento"},
            { "data": "nombre_departamento"},
            { "data": "id_pais"},
            { "data": "id_departamento",
                render: function (data) {
                          return '<a href="#" data-id_departamento="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "id_departamento",
                render: function (data) {
                          return '<a href="#" data-id_departamento="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
});

});