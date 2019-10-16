$(function () {
   
    obtenerPublicacion();

    $("#formulario").submit(function(e)
    {
         let form = $("#formulario").serialize();
         // console.log(form);
 
         if($.trim(nombre).length > 0 && $.trim(descripcion).length > 0 && $.trim(vacantes).length > 0 && $.trim(sueldo).length > 0 && $.trim(localizacion).length > 0&& $.trim(funciones).length >0)
         {
             $.ajax
             ({
                 method: "POST",
                 url: 'includes/propuesta.php',
                 data: form,
                 success: function(response)
                 {
                     obtenerPublicacion();
                 }
             })
         }

    $("#formulario").trigger("reset");
 
    e.preventDefault();
    });

    function obtenerPublicacion()
    {
        $.ajax
    ({
        url: "includes/publicaciones.php",
        type: 'GET',
        success: function(response)
        {
                let propuesta =  JSON.parse(response);
                let plantilla = "";
                propuesta.forEach
                (
                    propuesta => 
                    {
                    plantilla += 
                    //le asignamos un atributo para encontrar el ID
                    `
                    <div>
                    <div class="alert alert-primary" role="alert">
                    <div class="row">
                        <div class="col-md-10">
                        <span> ${propuesta.titulo} </span> -  <span> ${propuesta.descripcion} </span> - <span> ${propuesta.vacantes} </span> -  <span> ${propuesta.sueldo} </span> -  <span> ${propuesta.localizacion} </span>  
                        </div>

                        <div class="col-md-2">
                        <i class="fas fa-pencil-alt text-info"></i> <i class="far fa-trash-alt text-danger"></i>
                        </div>
                    </div>
                    </div>
                    </div>
                    
                   `;
                    }
                )
                $("#mostrar").html(plantilla);
        }
    });
    }
 
 });