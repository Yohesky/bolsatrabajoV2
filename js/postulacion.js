function getGET()
{
    // capturamos la url
    var loc = document.location.href;
    // si existe el interrogante
    if(loc.indexOf('?')>0)
    {
        // cogemos la parte de la url que hay despues del interrogante
        var getString = loc.split('?')[1];
        // obtenemos un array con cada clave=valor
        var GET = getString.split('&');
        var get = {};

        // recorremos todo el array de valores
        for(var i = 0, l = GET.length; i < l; i++){
            var tmp = GET[i].split('=');
            get[tmp[0]] = unescape(decodeURI(tmp[1]));
        }
        // console.log(get);
      
        
    }
    return get;
}

insertarPostulacion()
mostrarPostulaciones();
eliminarPostulacion();

function insertarPostulacion()
{
    

    $("#postular").click(function (e){
       
        $.ajax({
            method: 'POST',
            url: 'includes/insertarPostulacion.php',
            data: getGET(),
            success: function (response) {
                if (response === 'exito') {
                    swal({
                      title: "POSTULACIÓN EXITOSA",
                      text: "Se ha postulado con exito",
                      icon: "success",
                      button: "Continuar",
                    });
                  }
            }
          });
    })




}


function mostrarPostulaciones() {
    $.ajax
      ({
        url: "includes/mostrarPostulaciones.php",
        type: 'GET',
        success: function(response)
        
        {
          
                let postulacion =  JSON.parse(response);
                let plantilla = "";
                postulacion.forEach
                (
                    postulacion => 
                    {
                    plantilla += 
                    //le asignamos un atributo para encontrar el ID
                    `<tr>
                
                        <td scope="col"> ${postulacion.titulo}  </td>
                        <td scope="col"> ${postulacion.descripcion}  </td>
                        <td scope="col"> ${postulacion.vacantes}  </td>
                        <td scope="col"> ${postulacion.sueldo}  </td>
                        <td scope="col"> ${postulacion.localizacion}  </td>
                        <td scope="col"> ${postulacion.funciones}  </td>
                        <td scope="col">   </td>
                        <td scope="col">
                            <button value="${postulacion.propuesta_idpropuesta}" class="btn btn-danger eliminar-postulacion">Retirarme</button>
                        </td>
                        <td scope="col">
                             <a class="btn btn-info" id="boton" href="estadistica.php?idpropuesta=${postulacion.idpropuesta}&&idusuario=${postulacion.idusuario}">Ver mis estadisticas</a>
                        </td>
                        </tr>
                    
                   `;
                    }
                )
                $("#postulaciones").html(plantilla);
        }
      });
  }


  function eliminarPostulacion()
  {
    $(document).on("click", ".eliminar-postulacion", function()
    {
        //obtiene el boton que fue clickeado "eliminar-tarea"
        //el boton es un arreglo que esta en la posicion 0 por eso se selecciona
        let elemento = $(this);
          //encontramos el ID tareas para enviarlo al backend
          let id = $(elemento).attr("value")
          console.log(id);
  
          $.post("includes/eliminarPostulacion.php", {id}, function(response)
          {   
              //para que haga de nuevo la peticion al backend y no refresque la pagina
              mostrarPostulaciones()
              console.log(response)
          });
  
  
    });
  }


