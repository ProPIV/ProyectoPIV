var dt;

function Proveedor(){
  $("#contenido").on("click","button#actualizar",function(){
    var datos=$("#ftitular").serialize();
    $.ajax({
       type:"get",
       url:"./php/Titular/controladorTitular.php",
       data: datos,
       dataType:"json"
     }).done(function( resultado ) {
       console.log(resultado);
         if(resultado.respuesta){
           swal(
               'Actualizado!',
               'Se actaulizaron los datos correctamente',
               'success'
           )     
           dt.ajax.reload();
           $("#titulo").html("Listado de Titulares");
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
   var ID_Titular = $(this).data("id_titular");
   swal({
         title: '¿Está seguro?',
         text: "¿Realmente desea borrar el titular el con ID : " + ID_Titular + " ?",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si, Borrarlo!'
   }).then((decision) => {
           if (decision.value) {
            
               var request = $.ajax({
                   method: "get",
                   url: "./php/Titular/controladorTitular.php",
                   data: {ID_Titular: ID_Titular, accion:'borrar'},
                   dataType: "json"
               })
               
               request.fail(function( jqXHR, textStatus ) {
                swal(
                  'Borrado!',
                  'El titular  con el ID : ' + ID_Titular + ' fue borrado',
                  'success'
              )     
              dt.ajax.reload();
               });
           }
   })

});

$("#contenido").on("click","button.btncerrar2",function(){
   $("#titulo").html("Listado de Titulares");
   $("#nuevo-editar").html("");
   $("#nuevo-editar").removeClass("show");
   $("#nuevo-editar").addClass("hide");
   $("#municipio").removeClass("hide");
   $("#municipio").addClass("show");

})

$("#contenido").on("click","button.btncerrar",function(){
   $("#contenedor").removeClass("show");
   $("#contenedor").addClass("hide");
   $("#contenido").html('')
})

$("#contenido").on("click","button#nuevo",function(){
   $("#titulo").html("Nuevo Titular");
   $("#nuevo-editar" ).load("./php/Titular/nuevoTitular.php"); 
   $("#nuevo-editar").removeClass("hide");
   $("#nuevo-editar").addClass("show");
   $("#titular").removeClass("show");
   $("#titular").addClass("hide");
})

$("#contenido").on("click","button#grabar", function(){
 
 var datos=$("#ftitular").serialize();
  console.log(datos);
 $.ajax({
       type:"get",
       url:"./php/Titular/controladorTitular.php",
       data: datos,
       dataType:"json"
     }).done(function(resultado) {
         if(resultado.respuesta){
           swal(
               'Grabado!!',
               'El registro se grabó correctamente',
               'success'
           )     
           dt.ajax.reload();
           $("#titulo").html("Listado de Titulares");
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


$("#contenido").on("click","a.editar",function(){     
  $("#titulo").html("Editar Titular");
  //Recupera datos del fromulario
  var ID_Titular = $(this).data("id_titular");
   $("#nuevo-editar").load("./php/Titular/editarTitular.php");
   $("#nuevo-editar").removeClass("hide");
   $("#nuevo-editar").addClass("show");
   $("#titular").removeClass("show");
   $("#titular").addClass("hide");
  $.ajax({
      type:"get",
      url:"./php/Titular/controladorTitular.php", 
      data: {ID_Titular: ID_Titular, accion:'consultar'},
      dataType:"json"
      }).done(function(titular) {
           if(titular.respuesta === "no existe"){
               swal({
                 type: 'error',
                 title: 'Oops...',
                 text: 'El titular no existe!'                         
               })
           } else {
              ID_Titular = titular.ID_Titular;
              $("#ID_Titular").val(titular.ID_Titular);
              $("#NombreT").val(titular.NombreT);                   
              $("#ApellidoT").val(titular.ApellidoT);
              $("#EdadT").val(titular.EdadT);
              $("#SexoT").val(titular.SexoT);
              $("#CedulaT").val(titular.CedulaT);
              $("#EPST").val(titular.EPST);
              $("#RHT").val(titular.RHT);
              $("#Estado_CivilT").val(titular.Estado_CivilT);
              $("#NacionalidadT").val(titular.NacionalidadT);
               
           }
      });
  })
}

$(document).ready(() => {
  $("#contenido").off("click", "a.editar");
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");
  $("#titulo").html("Listado de Proveedores");
  dt = $("#tabla").DataTable({
        "ajax": "php/proveedores/controladorProveedor.php?accion=listar",
        "columns": [
            { "data": "id_proveedor"},
            { "data": "nombre_proveedor"},
            { "data": "telefono"},
            { "data": "direccion"},
            { "data": "id_proveedor",
                render: function (data) {
                          return '<a href="#" data-id_proveedor="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "id_proveedor",
                render: function (data) {
                          return '<a href="#" data-id_proveedor="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  Proveedor();
});