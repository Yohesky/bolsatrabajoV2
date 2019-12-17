$(function()
{
    $("#buscar").keyup(function()
    {
    
    //si en la barra de busqueda se obtiene algo, SI ES TRUE realiza el proceso,
    //sino NO
     if($("#buscar").val())
     {
        //cada vez que tipee el usuario obtenemos el valor
        // y lo almacenamos
        let busqueda = $("#buscar").val();
        console.log(busqueda);

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
                //transforma un string en un JSON 
                //le pasamos el string del RESPONSE y se transforma a JSON
                let trabajo = JSON.parse(response);

                //plantilla
                let plantilla = "";

                console.log(trabajo);
                trabajo.forEach(trabajo => {
                    //plantilla sobre como se mostraran las trabajos
                    plantilla += `
                    <a href="propuesta.php?id=${trabajo.id}&idempresa=${trabajo.idempresa}" onclick="mostrando(${trabajo.id});">
                    <div class="alert alert-info alert-dismissible fade show block" role="alert">
                    <strong> ${trabajo.nombre} </strong> <hr> ${trabajo.descripcion}
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                   </div>
                    <a/>
                    <script src="js/mostrandoModal.js"></script>
                   `;

                   //selecciona el elemento container y lo llena con la plantilla y lo pinta en HTML
                   $("#resultados").html(plantilla);
                   //cuando se hace la busqueda el cuadro aparece
                   $("#resultados").show();

                });
            }
            
             
        });
        
     }
     $("#resultados").hide();
     
    });
})