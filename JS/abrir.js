function abrir() {
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $(".Alin-img").toggleClass("Alin-imgt");
        $(".Alin-user").toggleClass("Alin-usert");
    });
}
