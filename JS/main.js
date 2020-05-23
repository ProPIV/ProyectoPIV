$(document).on('submit','#formlg', function(event){
    event.preventDefault();

    $.ajax({
        type:"POST",
        url:"login.php",
        data: $(this).serialize(),
        dataType:"json",
        beforeSend: function(){
            $('.botonlg').val('Validando...');
        }
      })
      .done(function( resultado ) {
         console.log(resultado);
         if(!resultado.error){
             if(resultado.tipo == '1'){
                location.href = 'PHP';
             }else if(resultado.tipo == '2'){
                location.href = 'PHP';
             }
         }else {
            $('.error').slideDown('slow');
            setTimeout(function(){
                $('.error').slideUp('slow');
            },3000);
            $('.botonlg').val('Iniciar Sesion');
         }
    })
    .fail(function(resp){
        console.log(resp.responseText);
    })
    .always(function(){
        console.log("complete");
    })
})