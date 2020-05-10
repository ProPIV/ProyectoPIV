var dt;

function pais(){
  $("#contenido").on("click","button#actualizar",function(){
    var datos=$("#fpais").serialize();
    $.ajax({
       type:"get",
       url:"./php/paises/controladorPais.php",
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
           $("#pais").removeClass("hide");
           $("#pais").addClass("show")
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
   var ID_Pais = $(this).data("id_pais");
   swal({
         title: '¿Está seguro?',
         text: "¿Realmente desea borrar el pais el con ID : " + ID_Pais + " ?",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si, Borrarlo!'
   }).then((decision) => {
           if (decision.value) {
            
               var request = $.ajax({
                   method: "get",
                   url: "./php/paises/controladorPais.php",
                   data: {ID_Pais: ID_Pais, accion:'borrar'},
                   dataType: "json"
               })
               
               request.fail(function( jqXHR, textStatus ) {
                swal(
                  'Borrado!',
                  'El titular  con el ID : ' + ID_Pais + ' fue borrado',
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
   $("#pais").removeClass("hide");
   $("#pais").addClass("show");

})

$("#contenido").on("click","button.btncerrar",function(){
   $("#contenedor").removeClass("show");
   $("#contenedor").addClass("hide");
   $("#contenido").html('')
})

$("#contenido").on("click","button#nuevo",function(){
   $("#titulo").html("Nuevo Titular");
   $("#nuevo-editar" ).load("./php/paises/nueva.php"); 
   $("#nuevo-editar").removeClass("hide");
   $("#nuevo-editar").addClass("show");
   $("#pais").removeClass("show");
   $("#pais").addClass("hide");
})

$("#contenido").on("click","button#grabar", function(){
 
 var datos=$("#fpais").serialize();
  console.log(datos);
 $.ajax({
       type:"get",
       url:"./php/paises/controladorPais.php",
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
           $("#pais").removeClass("hide");
           $("#pais").addClass("show")
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
  var ID_Pais = $(this).data("id_apis");
   $("#nuevo-editar").load("./php/paises/editar.php");
   $("#nuevo-editar").removeClass("hide");
   $("#nuevo-editar").addClass("show");
   $("#pais").removeClass("show");
   $("#pais").addClass("hide");
  $.ajax({
      type:"get",
      url:"./php/paises/controladorPais.php", 
      data: {ID_Pais: ID_Pais, accion:'consultar'},
      dataType:"json"
      }).done(function(pais) {
           if(pais.respuesta === "no existe"){
               swal({
                 type: 'error',
                 title: 'Oops...',
                 text: 'El pais no existe!'                         
               })
           } else {
              ID_Pais = pais.ID_Pais;
              $("#id_Pais").val(pais.ID_Pais);
              $("#nombre_pais").val(pais.NombreT);                   
          
               
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
  pais();
});