$(function () {
   
    obtenerPublicacion();
    eliminarPropuesta();


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
                        <button type="button" class="btn btn-warning eliminar-propuesta" value="${propuesta.idpropuesta}"> <i class="far fa-trash-alt text-danger"></i> </button> 
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
 

    function eliminarPropuesta()
  {
    $(document).on("click", ".eliminar-propuesta", function()
    {
        //obtiene el boton que fue clickeado "eliminar-tarea"
        //el boton es un arreglo que esta en la posicion 0 por eso se selecciona
        let elemento = $(this);
          //encontramos el ID tareas para enviarlo al backend
          let id = $(elemento).attr("value")
          console.log(id);
  
         $.post("includes/eliminarPropuesta.php", {id}, function(response)
          {   
              //para que haga de nuevo la peticion al backend y no refresque la pagina
             obtenerPublicacion()
             console.log(response)
          });
  
  
    });
  }
 });