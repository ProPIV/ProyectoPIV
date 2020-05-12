var dt;

function departamento(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#fdepartamento").serialize();
         $.ajax({
            type:"get",
            url:"../PHP/departamento/controladorDepartamento.php",
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
                $("#titulo").html("Listado departamento");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#departamento").removeClass("hide");
                $("#departamento").addClass("show")
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
              text: "¿Realmente desea borrar la departamento con codigo : " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "../PHP/departamento/controladorDepartamento.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'La departamento con codigo : ' + codigo + ' fue borrada',
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
        $("#titulo").html("Listado departamento");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#departamento").removeClass("hide");
        $("#departamento").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#nuevo",function(){
        $("#titulo").html("Nuevo departamento");
        $("#nuevo-editar" ).load("../PHP/departamento/nuevo.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#departamento").removeClass("show");
        $("#departamento").addClass("hide");
        $.ajax({
            type:"get",
            url:"../PHP/paises/controladorPais.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {          
            $("#id_pais option").remove()       
            $("#id_pais").append("<option selecte value=''>Seleccione un pais</option>")
            $.each(resultado.data, function (index, value) { 
              $("#id_pais").append("<option value='" + value.id_pais + "'>" + value.nombre_pais + "</option>")
            });
         });


    })

    $("#contenido").on("click","button#grabar",function(){

      var datos=$("#fdepartamento").serialize();
       $.ajax({
            type:"get",
            url:"../PHP/departamento/controladorDepartamento.php",
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
                $("#titulo").html("Listado departamento");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#departamento").removeClass("hide");
                $("#departamento").addClass("show")
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
       $("#titulo").html("Editar departamento");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       var pais;
        $("#nuevo-editar").load("../PHP/departamento/editar.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#departamento").removeClass("show");
        $("#departamento").addClass("hide");
       $.ajax({
           type:"get",
           url:"../PHP/departamento/controladorDepartamento.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( departamento ) {        
            if(departamento.respuesta === "no existe"){
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'departamento no existe!!!!!'                         
                })
            } else {
                $("#id_departamento").val(departamento.codigo);                   
                $("#nombre_departamento").val(departamento.nombre_departamento);
                pais=departamento.id_pais;
              
            }
       });
       $.ajax({
        type:"get",
        url:"../PHP/paises/controladorPais.php",
        data: {accion:'listar'},
        dataType:"json"
      }).done(function( resultado ) {                     
        $("#id_pais option").remove();
        $.each(resultado.data, function (index, value) { 
          
          if(pais === value.id_pais){
            $("#id_pais").append("<option selected value='" + value.id_pais + "'>" + value.nombre_pais + "</option>")
          }else {
            $("#id_pais").append("<option value='" + value.id_pais + "'>" + value.nombre_pais + "</option>")
          }
        });
     });    
    
       })
}

$(document).ready(() => {
  $("#contenido").off("click", "a.editar");
  $("#contenido").off("click", "button#actualizar");
  $("#contenido").off("click","a.borrar");
  $("#contenido").off("click","button#nuevo");
  $("#contenido").off("click","button#grabar");
  $("#titulo").html("Listado de departamento");
  dt = $("#tabla").DataTable({
        "ajax": "../PHP/departamento/controladorDepartamento.php?accion=listar",
        "columns": [
            { "data": "id_departamento"},
            { "data": "nombre_departamento"},
            { "data": "id_pais"},
            { "data": "id_departamento",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "id_departamento",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
});
departamento();
});