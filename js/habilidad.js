$(function (){
    enviarHabilidad()
    obtenerHabilidad()
    eliminarHabilidad()
    editarHabilidad()
})

let editar = false;

function enviarHabilidad(){
    $("#btnHabilidad").click( (e) =>{

        let habilidad = $("#habilidades").serialize()
        console.log(habilidad);
        let direccion = editar === false ? "includes/insertarHabilidad.php" : "includes/actualizacionHabilidad.php";
        $.ajax
             ({
                 method: "POST",
                 url: direccion,
                 data: habilidad,
                 success: function(response)
                 {
                    obtenerHabilidad();
                    console.log(response);
                 }
             })
        $("#habilidades").trigger("reset");
        e.preventDefault();
    })
}

function obtenerHabilidad(){
            $.ajax
             ({
                 method: "GET",
                 url: "includes/seleccionarHabilidad.php",
                 success: function(response)
                    {
                            let habilidad =  JSON.parse(response);
                            let plantilla = "";
                            habilidad.forEach
                            (
                                habilidad => 
                                {
                                plantilla += 
                                //le asignamos un atributo para encontrar el ID
                                ` 
                                <div class="alert alert-dark" role="alert">
                                    <div class="row">
                                        <div class="col-md-8">
                                        <span> ${habilidad.nombreHabilidad}  </span> - <span> ${habilidad.nivelHabilidad} </span> 
                                        </div>

                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-warning eliminar-habilidad" value="${habilidad.idHabilidad}"> <i class="far fa-trash-alt text-danger"></i> </button> 
                                        </div>


                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-warning editar-habilidad" value="${habilidad.idHabilidad}"> <i class="fas fa-pencil-alt"></i> </button> 
                                        </div>
                                    </row>
                                </div>                 
                                `;
                                }
                            )
                            $("#mostrar").html(plantilla);
                    }
             })
}

function eliminarHabilidad(){
    $(document).on("click", ".eliminar-habilidad", function(){
        let elemento = $(this)

        let id = $(elemento).attr("value")
        console.log(id);

        $.post("includes/eliminarHabilidad.php", {id}, function(response)
          {   
              //para que haga de nuevo la peticion al backend y no refresque la pagina
             obtenerHabilidad()
             console.log(response)
          });
        
    })
}


function editarHabilidad(){
    $(document).on("click", ".editar-habilidad", function()
        {
            //obtiene el boton que fue clickeado "eliminar-tarea"
            //el boton es un arreglo que esta en la posicion 0 por eso se selecciona
            let elemento = $(this);
              //encontramos el ID tareas para enviarlo al backend
              let id = $(elemento).attr("value")
              console.log(id);
      
              $.post("includes/actHabilidad.php", {id}, function(response)
             {   
               const habilidad = JSON.parse(response);
               $("#habilidad").val(habilidad.nombreHabilidad);
               $("#nivelHabilidad").val(habilidad.nivelHabilidad);
               $("#habilidadId").val(habilidad.idHabilidad)
               editar = true;
              
              });
      
      
        }); 
}


