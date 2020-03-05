$(function()
{
    obtenerPublicacion();
    function obtenerPublicacion()
    {
        $.ajax
    ({
        url: "includes/publicaciones.php",
        type: 'GET',
        success: function(response)
        {       
            console.log(response);
            
                let publicacion =  JSON.parse(response);
                let plantilla = "";
                publicacion.forEach
                (
                    publicacion => 
                    {
                    plantilla += 
                    //le asignamos un atributo para encontrar el ID
                    `
                    <div class="mt-5 col-lg-12 col-xs-6">

                    <div class="rad-info-box rad-txt-danger">
                    <i class="fas fa-check"></i>
                                                <span class="heading"> <a href="infoPostulados.php?idempresa=${publicacion.idempresa}&idpropuesta=${publicacion.idpropuesta}" class="h2"> ${publicacion.titulo} </a>
                    </div>
                      
                    </div>
                    
                   `;
                    }
                )
                $("#inf").html(plantilla);
        }
    });
    }

    function obtenerNumero()
    {
        
    }
})