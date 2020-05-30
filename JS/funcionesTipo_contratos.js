var dt;

function tipo_contrato(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#ftipo_contrato").serialize();
         $.ajax({
            type:"get",
            url:"../PHP/tipo contrato/controladorTipo_contrato.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal(
                    'Actualizado!',
                    'Se actaulizaron los datos correctamente',
                    'success'
                )     
                dt.ajax.reload();
                $("#titulo").html("Listado de tipo contrato");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#tipo_contrato").removeClass("hide");
                $("#tipo_contrato").addClass("show")
             } else {
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong!'                         
                })
            }
        });
    })
$(document).ready(() => {
  $("#contenido").off("click", "a.editar");
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");
  $("#titulo").html("Listado de tipo contrato");
  dt = $("#tabla").DataTable({
        "ajax": "../PHP/tipo contrato/controladorTipo_contratos.php?accion=listar",
        "columns": [            
            { "data": "id_tipo_contrato"},
            { "data": "id_tipo_contrato",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "id_tipo_contrato",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
});
tipo_contrato();
})};