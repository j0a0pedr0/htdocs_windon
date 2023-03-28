$(function(){
    /*$('form').submit(function(){
        alert('formulario enviado');
        $('form').html('<input type="email" name"email" required /><input type="submit" value="Enviar" name="acao"/>');
        return false;
    });*/

    $('body').on('submit','form',function(){
        alert('formulario enviado');
        $('form').html('<input type="email" name"email" required /><input type="submit" value="Enviar" name="acao"/>');
        return false;
    })
})