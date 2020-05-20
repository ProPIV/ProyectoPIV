var dt;

function pais(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#fpais").serialize();
         $.ajax({
            type:"get",
            url:"../PHP/paises/controladorPais.php",
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
                $("#titulo").html("Listado paises");
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
        var codigo = $(this).data("codigo");

        swal({
              title: '¿Está seguro?',
              text: "¿Realmente desea borrar la pais con codigo : " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "../PHP/paises/controladorPais.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'La pais con codigo : ' + codigo + ' fue borrada',
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
        $("#titulo").html("Listado paises");
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
        $("#titulo").html("Nuevo pais");
        $("#nuevo-editar" ).load("../PHP/paises/nuevo.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#pais").removeClass("show");
        $("#pais").addClass("hide");
        $.ajax({
            type:"get",
            url:"../PHP/paises/controladorPais.php",
            data: {accion:'listar'},
            dataType:"json"
          })


    })

    $("#contenido").on("click","button#grabar",function(){

      var datos=$("#fpais").serialize();
       $.ajax({
            type:"get",
            url:"../PHP/paises/controladorPais.php",
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
                $("#titulo").html("Listado paises");
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
       $("#titulo").html("Editar pais");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");

        $("#nuevo-editar").load("../PHP/paises/editar.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#pais").removeClass("show");
        $("#pais").addClass("hide");
       $.ajax({
           type:"get",
           url:"../PHP/paises/controladorPais.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( pais ) {        
            if(pais.respuesta === "no existe"){
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'pais no existe!!!!!'                         
                })
            } else {
                $("#id_pais").val(pais.codigo);                   
                $("#nombre_pais").val(pais.nombre_pais);
              
            }
       });
       $.ajax({
        type:"get",
        url:"../PHP/paises/controladorPais.php",
        data: {accion:'listar'},
        dataType:"json"
      })
    
       })
}


$(document).ready(() => {
    $("#contenido").off("click", "a.editar");
    $("#contenido").off("click", "button#actualizar");
    $("#contenido").off("click","a.borrar");
    $("#contenido").off("click","button#nuevo");
    $("#contenido").off("click","button#grabar");
    $("#titulo").html("Listado de paises");
    dt = $("#tabla").DataTable({

          "ajax": "../PHP/paises/controladorPais.php?accion=listar",
          "columns": [
              { "data": "id_pais"},
              { "data": "nombre_pais"},
              { "data": "id_pais",
                  render: function (data) {
                            return '<a href="#" data-codigo="'+ data + 
                                   '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                  }
              },
              { "data": "id_pais",
                  render: function (data) {
                            return '<a href="#" data-codigo="'+ data + 
                                   '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                  }
              }
          ]
  });

  $(document).ready(function() {
    $('#tabla').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );


  pais();


});