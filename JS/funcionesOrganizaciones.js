var dt;

function Organizaciones(){
  $("#contenido").on("click","button#actualizar",function(){
    var datos=$("#forganizacion").serialize();
    $.ajax({
       type:"get",
       url:"..php/organizaciones/controladorOrganizaciones.php",
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
           $("#titulo").html("Listado de Organizaciones");
           $("#nuevo-editar").html("");
           $("#nuevo-editar").removeClass("show");
           $("#nuevo-editar").addClass("hide");
           $("#organizaciones").removeClass("hide");
           $("#organizaciones").addClass("show")
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
   var id_unidad_organizacional = $(this).data("id_unidad_organizacional");
   swal({
         title: '¿Está seguro?',
         text: "¿Realmente desea borrar la Organizacion el con ID : " + id_unidad_organizacional + " ?",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si, Borrarlo!'
   }).then((decision) => {
           if (decision.value) {
            
               var request = $.ajax({
                   method: "get",
                   url: "../php/organizaciones/controladorOrganizaciones.php",
                   data: {id_unidad_organizacional: id_unidad_organizacional, accion:'borrar'},
                   dataType: "json"
               })
               
               request.fail(function( jqXHR, textStatus ) {
                swal(
                  'Borrado!',
                  'La Organizacion con el ID : ' + id_unidad_organizacional + ' fue borrado',
                  'success'
              )     
              dt.ajax.reload();
               });
           }
   })

});

$("#contenido").on("click","button.btncerrar2",function(){
   $("#titulo").html("Listado de Organizaciones");
   $("#nuevo-editar").html("");
   $("#nuevo-editar").removeClass("show");
   $("#nuevo-editar").addClass("hide");
   $("#organizaciones").removeClass("hide");
   $("#organizaciones").addClass("show");

})

$("#contenido").on("click","button.btncerrar",function(){
   $("#contenedor").removeClass("show");
   $("#contenedor").addClass("hide");
   $("#contenido").html('')
})

$("#contenido").on("click","button#nuevo",function(){
   $("#titulo").html("Nueva Organizacion");
   $("#nuevo-editar" ).load("../php/organizaciones/nuevaOrganizacion.php"); 
   $("#nuevo-editar").removeClass("hide");
   $("#nuevo-editar").addClass("show");
   $("#organizaciones").removeClass("show");
   $("#organizaciones").addClass("hide");
})

$("#contenido").on("click","button#grabar", function(){
 
 var datos=$("#forganizacion").serialize();
  console.log(datos);
 $.ajax({
       type:"get",
       url:"../php/organizaciones/controladorOrganizaciones.php",
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
           $("#titulo").html("Listado de Organizaciones");
           $("#nuevo-editar").html("");
           $("#nuevo-editar").removeClass("show");
           $("#nuevo-editar").addClass("hide");
           $("#organizaciones").removeClass("hide");
           $("#organizaciones").addClass("show")
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
  $("#titulo").html("Editar Organizacion");
  //Recupera datos del fromulario
  var ID_Titular = $(this).data("id_unidad_organizacional");
   $("#nuevo-editar").load("../php/organizaciones/editarOrganizaciones.php");
   $("#nuevo-editar").removeClass("hide");
   $("#nuevo-editar").addClass("show");
   $("#organizacion").removeClass("show");
   $("#organizacion").addClass("hide");
  $.ajax({
      type:"get",
      url:"../php/organizaciones/controladorOrganizaciones.php", 
      data: {id_unidad_organizacional: id_unidad_organizacional, accion:'consultar'},
      dataType:"json"
      }).done(function(organizacion) {
           if(organizacion.respuesta === "no existe"){
               swal({
                 type: 'error',
                 title: 'Oops...',
                 text: 'La Organizacion no existe!'                         
               })
           } else {
              id_unidad_organizacional = organizacion.id_unidad_organizacional;
              $("#id_unidad_organizacional").val(organizacion.id_unidad_organizacional);
              $("#Nombre_unidad_organizacional").val(organizacion.nombre_unidad_organizacional);                   
              $("#id_empresa").val(organizacion.id_empresa);               
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
  $("#titulo").html("Listado de Organizaciones");
  dt = $("#tabla").DataTable({
        "ajax": "organizaciones/controladorOrganizaciones.php?accion=listar",
        "columns": [
            { "data": "id_unidad_organizacional"},
            { "data": "nombre_unidad_organizacional"},
            { "data": "id_empresa"},
            { "data": "id_unidad_organizacional",
                render: function (data) {
                          return '<a href="#" data-id_unidad_organizacional="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "id_unidad_organizacional",
                render: function (data) {
                          return '<a href="#" data-id_unidad_organizacional="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
  });
  Organizaciones();
});