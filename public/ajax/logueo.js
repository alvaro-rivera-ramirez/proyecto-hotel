$(document).ready(function () {   
    $("#form").submit(function () {
        var datos = {
            fono: $("#fono").val(),
            comentarios: $("#comentarios").val(),
            emisor: $("#email").val()
        };
        $.get("pag_email.php", datos, funcion_mensaje).fail(ProcesarError);
        return false;
    }); 
});

function funcion_mensaje(mensaje) {
    if(mensaje== "EMAIL MALO"){
        $("#caja").html("<p class='bad'>EL EMAIL NO ES VÁLIDO, POR FAVOR REVISE BIEN O INGRESE OTRO EMAIL</p>");
    } else{
        if (mensaje == "BUENA") {
            $("#caja").html("<p class='good'> EL MENSAJE HA SIDO ENVIADO CON ÉXITO, UNO DE NUESTROS ASEOSORES SE COMUNICARÁ CON USTED LO MÁS PRONTO POSIBLE</p>");
        } else {
            $("#caja").html("<p class='bad'>HA OCURRIDO UN ERROR AL ENVIAR EL MENSAJE, VUÉLVALO A INTENTAR POR FAVOR</p>");
        }
    }
}

function ProcesarError(error) {
    var msg = "Upps! HA OCURRIDO UN ERROR AL CARGAR SU MENSAJE, POR FAVOR INTÉNTELO MÁS TARDE";
    $("#caja").html("<p class='bad'>" + msg + "</p>");
}