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
        success: function (response) {
          let postulacion = JSON.parse(response);
          let plantilla = "";
          postulacion.forEach
            (
              postulacion => {
                plantilla +=
                  //le asignamos un atributo para encontrar el ID
                  `
              
                  
            <tr class="mt-5">
                  <td> ${postulacion.titulo} </td>
                  <td> ${postulacion.descripcion} </td>
                     <td> ${postulacion.sueldo} </td>
                  <td> ${postulacion.localizacion} </td>
                  <td> <a href="#">Eliminar</a></td>
            </tr>
                
                    `;
              }
            )
          $("#postulaciones").html(plantilla);
        }
      });
  }


