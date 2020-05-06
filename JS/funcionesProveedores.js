var dt;

$(document).ready(() => {
  $("#contenido").off("click", "a.editar");
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");
  $("#titulo").html("Listado de Titulares");
  dt = $("#tabla").DataTable({
        "ajax": "../PHP/proveedores/controladorProveedor.php?accion=listar",
        "columns": [
            { "data": "id_proveedor"} ,
            { "data": "nombre_proveedor" },
            { "data": "telefono" },
            { "data": "direccion" },
            { "data": "id_proveedor",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "id_proveedor",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  
});