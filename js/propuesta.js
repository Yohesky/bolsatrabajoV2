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
                    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">${propuesta.titulo}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">${propuesta.descripcion}</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
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