$menu-bar =
$('.menu-bar').click(function(e) {
    e.preventDefault();
    $(".contenido").toggleClass("abrir");
});