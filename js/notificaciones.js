$(function (){



})

function enviarNotificacion(){
    $("#notificacion").click( () => {

        $.ajax
        ({
            //hacer una peticion al servidor
            //url: direccion a donde se quiere pedir los datos
            url: "includes/busqueda.php",
            //POST cuando el navegador le envia algo al servidor 
            type: "POST",
            //para enviar el valor del input al servidor
            data: {busqueda},
            //Eventos si el servidor responde
            //function con parametro response cuando el servidor responda algo 
            success: function(response)
            {
                console.log(response);
                
            }
            
             
        });
    })
}