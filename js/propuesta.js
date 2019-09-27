$(function () {
   

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
                     console.log(response);
                 }
             })
         }

    $("#formulario").trigger("reset");

    let plantilla = '';
    plantilla +=
    `
    <div class="card card-body mt-4 shadow-lg p-3 mb-5 bg-white rounded animated fadeInRightBig">
    <p><strong>Nombre:</strong> ${nombre} <br> <strong>Descripción:</strong> ${descripcion}</p> <br>
    <strong>Funciones:</strong> ${funciones}</p> <br>
    <p><strong>Vacantes:</strong> ${vacantes} <br> <strong>Sueldo:</strong> ${sueldo} BsS</p> <br>
    <p><strong>Ubicación:</strong> ${localizacion} 
    <button class="btn btn-danger btn-block mt-4" id="quitar">Eliminar</button>
    </div>
    `;
 
    $("#mostrar").html(plantilla);
 
    e.preventDefault();
    });
 
 
 
     
 
     
 
 });