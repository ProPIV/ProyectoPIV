function inicio() {
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $(".Alin-img").toggleClass("Alin-imgt");
        $(".Alin-user").toggleClass("Alin-usert");
    });
    $("#cargarAdmin").click(function(e) {
        e.preventDefault();
        $("#contenido").load("../php/admin/Index.php");
    })
    $("#cargarUser").click(function(e) {
        e.preventDefault();
        $("#contenido").load("../php/user/Index.php");
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
