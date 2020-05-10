var dt;


$(document).ready(() => {
  $("#contenido").off("click", "a.editar");
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");
  $("#titulo").html("Listado de Proveedores");
  dt = $("#tabla").DataTable({
        "ajax": "paises/controladorPais.php?accion=listar",
        "columns": [
            { "data": "id_pais"},
            { "data": "nombre_pais"},
            { "data": "id_pais",
                render: function (data) {
                          return '<a href="#" data-id_pais="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "id_pais",
                render: function (data) {
                          return '<a href="#" data-id_pais="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });

});