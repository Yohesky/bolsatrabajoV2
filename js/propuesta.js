$(function () {
   
    obtenerPublicacion();
    eliminarPropuesta();
    editarPropuesta();

    let editar = false;

    $("#formulario").submit(function(e)
    {
         let form = $("#formulario").serialize();
         // console.log(form);
         

         if($.trim(nombre).length > 0 && $.trim(descripcion).length > 0 && $.trim(vacantes).length > 0 && $.trim(sueldo).length > 0 && $.trim(localizacion).length > 0 && $.trim(funciones).length > 0 && $.trim(categoria).length >0)
         {
            let direccion = editar === false ? "includes/propuesta.php" : "includes/actualizacionPropuesta.php";
            console.log(direccion);
             $.ajax
             ({
                 method: "POST",
                 url: direccion,
                 data: form,
                 success: function(response)
                 {
                     obtenerPublicacion();
                     console.log(response);
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
                        <div class="col-md-8">
                        <span> ${propuesta.titulo} </span> -  <span> ${propuesta.descripcion} </span> - <span> ${propuesta.vacantes} </span> -  <span> ${propuesta.sueldo} </span> -  <span> ${propuesta.localizacion} </span>  
                        </div>

                        <div class="col-md-2">
                        <button type="button" class="btn btn-warning eliminar-propuesta" value="${propuesta.idpropuesta}"> <i class="far fa-trash-alt text-danger"></i> </button> 
                        </div>

                        <div class="col-md-2">
                        <button type="button" class="btn btn-warning editar-propuesta" value="${propuesta.idpropuesta}"> <i class="fas fa-pencil-alt"></i> </button> 
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

    function editarPropuesta()
    {
        $(document).on("click", ".editar-propuesta", function()
        {
            //obtiene el boton que fue clickeado "eliminar-tarea"
            //el boton es un arreglo que esta en la posicion 0 por eso se selecciona
            let elemento = $(this);
              //encontramos el ID tareas para enviarlo al backend
              let id = $(elemento).attr("value")
              console.log(id);
      
              $.post("includes/actPropuesta.php", {id}, function(response)
             {   
               const postulacion = JSON.parse(response);
               $("#nombre").val(postulacion.titulo);
               $("#descripcion").val(postulacion.descripcion);
               $("#funciones").val(postulacion.funciones);
               $("#vacantes").val(postulacion.vacantes);
               $("#sueldo").val(postulacion.sueldo);
               $("#localizacion").val(postulacion.localizacion);
               $("#categoria").val(postulacion.categoria);
               $("#postulacionId").val(postulacion.id)
               editar = true;
              
              });
      
      
        });  
    }
 });