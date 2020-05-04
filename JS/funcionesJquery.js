function inicio() {
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $(".Alin-img").toggleClass("Alin-imgt");
        $(".Alin-user").toggleClass("Alin-usert");
    });
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
