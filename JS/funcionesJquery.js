function inicio() {
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $(".Alin-img").toggleClass("Alin-imgt");
        $(".Alin-user").toggleClass("Alin-usert");
    });
    $("#cargarAdmin").click(function(e) {
        e.preventDefault();
        $("#contenido").load("../php/admin/index.php");
    })
    $("#cargarEmpleados").click(function(e) {
        e.preventDefault();
        $("#contenido").load("../php/empleados/index.php");
    })
    $("#cargarProveedores").click(function(e) {
        e.preventDefault();
        $("#contenido").load("../PHP/proveedores/index.php");
    })
    $("#cargarPaises").click(function(e) {
        e.preventDefault();
        $("#contenido").load("../PHP/paises/index.php");
    })
    $("#cargarCiudades").click(function(e) {
        e.preventDefault();
        $("#contenido").load("../php/user/index.php");
    })
    $("#cargarEmpresas").click(function(e) {
        e.preventDefault();
        $("#contenido").load("../php/user/index.php");
    })
    $("#cargarSucursal").click(function(e) {
        e.preventDefault();
        $("#contenido").load("../php/user/index.php");
    })
    $("#cargarProcesos").click(function(e) {
        e.preventDefault();
        $("#contenido").load("../php/user/index.php");
    })
    $("#cargarContratos").click(function(e) {
        e.preventDefault();
        $("#contenido").load("../php/user/index.php");
    })
    $("#cargarOrganizaciones").click(function(e) {
        e.preventDefault();
        $("#contenido").load("../php/user/index.php");
    })
    $("#opciones a").click(function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        $.post( url,function(resultado) {
                if(url!="#")
                    $("#contenedor").removeClass("hide");
                    $("#contenedor").addClass("show");
                    $("#contenido").html(resultado);
        });
     });    
}
