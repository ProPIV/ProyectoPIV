var dt;

function contratos(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#fcontrato").serialize();
         $.ajax({
            type:"get",
            url:"../PHP/contratos/controladorContratos.php",
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
                $("#titulo").html("Listado contratos");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#contratos").removeClass("hide");
                $("#contratos").addClass("show")
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
              text: "¿Realmente desea borrar el contratos con codigo : " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "../PHP/contratos/controladorContratos.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El contratos con codigo : ' + codigo + ' fue borrado',
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
        $("#titulo").html("Listado contratos");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#contratos").removeClass("hide");
        $("#contratos").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#nuevo",function(){
        $("#titulo").html("Nuevo contratos");
        $("#nuevo-editar" ).load("../PHP/contratos/nuevoContrato.php"); 
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#contratos").removeClass("show");
        $("#contratos").addClass("hide");
        $.ajax({
            type:"get",
            url:"../php/tipo contrato/controladorTipo_contrato.php",
            data: {accion:'listar'},
            dataType:"json"
          }).done(function( resultado ) {                     
             $("#id_tipo_contrato option").remove();
             $.each(resultado.data, function (index, value) {  
             $("#id_tipo_contrato").append("<option value='" + value.id_tipo_contrato + "'>" + value.nombre_tipo_contrato + "</option>")           
             });
          });
    })

    $("#contenido").on("click","button#grabar",function(){

      var datos=$("#fcontrato").serialize();
       $.ajax({
            type:"get",
            url:"../PHP/contratos/controladorContratos.php",
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
                $("#titulo").html("Listado contratos");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#contratos").removeClass("hide");
                $("#contratos").addClass("show")
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
       $("#titulo").html("Editar contratos");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
        $("#nuevo-editar").load("../PHP/contratos/editarContrato.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#contratos").removeClass("show");
        $("#contratos").addClass("hide");
       $.ajax({
           type:"get",
           url:"../PHP/contratos/controladorContratos.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( contratos ) {        
            if(contratos.respuesta === "no existe"){
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'contratos no existe!!!!!'                         
                })
            } else {
                $("#id_contrato").val(contratos.codigo);                   
                $("#id_empleado").val(contratos.nombre_empleado);
                $("#fecha_ini").val(contratos.fecha_ini);
                $("#fecha_fin").val(contratos.fecha_fin);                
                $("#id_proveedor").val(contratos.id_proveedor);                
                tipo=contratos.tipo;
              
            }
       });       
       
       $.ajax({
        type:"get",
        url:"../php/tipo contrato/controladorTipo_contrato.php",
        data: {accion:'listar'},
        dataType:"json"
      }).done(function( resultado ) {                     
         $("#id_tipo_contrato option").remove();
         $.each(resultado.data, function (index, value) {  
         
            if(tipo === value.id_tipo_contrato){
                $("#id_tipo_contrato").append("<option value='" + value.id_tipo_contrato + "'>" + value.nombre_tipo_contrato + "</option>") 
             }else {
                $("#id_tipo_contrato").append("<option value='" + value.id_tipo_contrato + "'>" + value.nombre_tipo_contrato + "</option>") 
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
  $("#titulo").html("Listado de contratos");
  dt = $("#tabla").DataTable({
        "ajax": "../PHP/contratos/controladorContratos.php?accion=listar",
        "columns": [
            { "data": "id_contrato"},
            { "data": "nombre_empleado"},
            { "data": "fecha_ini"},
            { "data": "fecha_fin"},
            { "data": "nombre_tipo_contrato"},
            { "data": "nombre_proveedor"},
            { "data": "id_contrato",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                }
            },
            { "data": "id_contrato",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
});
contratos();
});