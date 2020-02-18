$(document).ready(function() {
    alert('pagina cargada')
    enviarNotificacion()
    
})

function getGET() {
    // capturamos la url
    var loc = document.location.href;
    // si existe el interrogante
    if (loc.indexOf('?') > 0) {
        // cogemos la parte de la url que hay despues del interrogante
        var getString = loc.split('?')[1];
        // obtenemos un array con cada clave=valor
        var GET = getString.split('&');
        var get = {};

        // recorremos todo el array de valores
        for (var i = 0, l = GET.length; i < l; i++) {
            var tmp = GET[i].split('=');
            get[tmp[0]] = unescape(decodeURI(tmp[1]));
        }
        // console.log(get);


    }
    return get;
}

function enviarNotificacion() {
        $.ajax
            ({

                url: "includes/notificaciones.php",

                type: "POST",
                data: getGET(),

                success: function (response) {
                    console.log(response);

                }


            });
  
}