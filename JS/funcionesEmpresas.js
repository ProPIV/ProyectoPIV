var dt;

function Empresas(){
    $("#contenido").on("click","button#actualizar",function(){
         var datos=$("#fempresas").serialize();
         $.ajax({
            type:"get",
            url:"../PHP/empresas/controladorEmpresas.php",
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
                $("#titulo").html("Listado de Empresas");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#empresa").removeClass("hide");
                $("#empresa").addClass("show")
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
              text: "¿Realmente desea borrar la Empresa con codigo : " + codigo + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "../PHP/empresas/controladorEmpresas.php",
                        data: {codigo: codigo, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'La Empresa con codigo : ' + codigo + ' fue borrada',
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
        $("#titulo").html("Listado de Empresas");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#empresa").removeClass("hide");
        $("#empresa").addClass("show");

    })

    $("#contenido").on("click","button.btncerrar",function(){
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $("#contenido").html('')
    })

    $("#contenido").on("click","button#nuevo",function(){
      $("#titulo").html("Nueva Empresa");
      $("#nuevo-editar" ).load("../PHP/empresas/nuevo.php"); 
      $("#nuevo-editar").removeClass("hide");
      $("#nuevo-editar").addClass("show");
      $("#empresa").removeClass("show");
      $("#empresa").addClass("hide");
      $.ajax({
          type:"get",
          url:"../PHP/proveedores/controladorProveedor.php",
          data: {accion:'listar'},
          dataType:"json"
        }).done(function( resultado ) {          
          $("#id_proveedor option").remove()       
          $("#id_proveedor").append("<option selecte value=''>Seleccione un proveedor</option>")
          $.each(resultado.data, function (index, value) { 
            $("#id_proveedor").append("<option value='" + value.id_proveedor + "'>" + value.nombre_proveedor + "</option>")
          });
       });


  })

    $("#contenido").on("click","button#grabar",function(){

      var datos=$("#fempresas").serialize();
       $.ajax({
            type:"get",
            url:"../PHP/empresas/controladorEmpresas.php",
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
                $("#titulo").html("Listado de Empresas");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#empresa").removeClass("hide");
                $("#empresa").addClass("show")
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
       $("#titulo").html("Editar Empresa");
       //Recupera datos del fromulario
       var codigo = $(this).data("codigo");
       var proveedor

        $("#nuevo-editar").load("../PHP/empresas/editar.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#empresa").removeClass("show");
        $("#empresa").addClass("hide");
       $.ajax({
           type:"get",
           url:"../PHP/empresas/controladorEmpresas.php",
           data: {codigo: codigo, accion:'consultar'},
           dataType:"json"
           }).done(function( organizacion ) {        
            if(organizacion.respuesta === "no existe"){
                swal({
                  type: 'error',
                  title: 'Oops...',
                  text: 'Organizacion no existe!!!!!'                         
                })
            } else {
                $("#id_empresa").val(organizacion.codigo);                   
                $("#nombre_empresa").val(organizacion.nombre_empresa);
                proveedor=organizacion.id_proveedor;
              
              }
         });
         $.ajax({
          type:"get",
          url:"../PHP/proveedores/controladorProveedor.php",
          data: {accion:'listar'},
          dataType:"json"
        }).done(function( resultado ) {                     
          $("#id_proveedor option").remove();
          $.each(resultado.data, function (index, value) { 
            
            if(empresa === value.id_proveedor){
              $("#id_proveedor").append("<option selected value='" + value.id_proveedor + "'>" + value.nombre_proveedor + "</option>")
            }else {
              $("#id_proveedor").append("<option value='" + value.id_proveedor + "'>" + value.nombre_proveedor + "</option>")
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
    $("#titulo").html("Listado de Empresas");
    dt = $("#tabla").DataTable({

          "ajax": "../PHP/empresas/controladorEmpresas.php?accion=listar",
          "columns": [
              { "data": "id_empresa"},
              { "data": "nombre_empresa"},
              { "data": "id_sede"},
              { "data": "id_proveedor"},
              { "data": "id_empresa",
                  render: function (data) {
                            return '<a href="#" data-codigo="'+ data + 
                                   '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>' 
                  }
              },
              { "data": "id_empresa",
                  render: function (data) {
                            return '<a href="#" data-codigo="'+ data + 
                                   '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                  }
              }
          ]
  });




  Empresas();


});