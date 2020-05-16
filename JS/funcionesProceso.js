var dt;

function proceso(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#fproceso").serialize();
         $.ajax({
            type:"get",
            url:"../PHP/proceso/controladorProceso.php",
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
                $("#titulo").html("Listado proceso");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#proceso").removeClass("hide");
                $("#proceso").addClass("show")
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
        var codigo = $(this).data("codigo");

        swal({
              title: '¿Está seguro?',
              text: "¿Realmente desea borrar el proceso con codigo : " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "../PHP/proceso/controladorProceso.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El proceso con codigo : ' + codigo + ' fue borrado',
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

    $("#contenido").on("click","button.btncerrar2",function(){
        $("#titulo").html("Listado proceso");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#proceso").removeClass("hide");
        $("#proceso").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#nuevo",function(){
        $("#titulo").html("Nuevo proceso");
        $("#nuevo-editar" ).load("../PHP/proceso/nuevoProceso.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#proceso").removeClass("show");
        $("#proceso").addClass("hide");
    })

    $("#contenido").on("click","button#grabar",function(){

      var datos=$("#fproceso").serialize();
       $.ajax({
            type:"get",
            url:"../PHP/proceso/controladorProceso.php",
            data: datos,
            dataType:"json"
          }).done(function( resultado ) {
              if(resultado.respuesta){
                swal(
                    'Grabado!!',
                    'El registro se grabó correctamente',
                    'success'
                )     
                dt.ajax.reload();
                $("#titulo").html("Listado proceso");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#proceso").removeClass("hide");
                $("#proceso").addClass("show")
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
       $("#titulo").html("Editar proceso");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       var pais;
        $("#nuevo-editar").load("../PHP/proceso/editarProceso.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#proceso").removeClass("show");
        $("#proceso").addClass("hide");
       $.ajax({
           type:"get",
           url:"../PHP/proceso/controladorProceso.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( proceso ) {        
            if(proceso.respuesta === "no existe"){
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'proceso no existe!!!!!'                         
                })
            } else {
                $("#id_proceso").val(proceso.codigo);                   
                $("#nombre_proceso").val(proceso.nombre_proceso);
                pais=proceso.id_pais;
              
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
  $("#titulo").html("Listado de proceso");
  dt = $("#tabla").DataTable({
        "ajax": "../PHP/proceso/controladorProceso.php?accion=listar",
        "columns": [
            { "data": "id_proceso"},
            { "data": "nombre_proceso"},
            { "data": "id_pais"},
            { "data": "id_proceso",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "id_proceso",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
});
proceso();
});