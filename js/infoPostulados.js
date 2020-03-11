$(function()
{
    obtenerPublicacion();
    mostrarPagina();
    function obtenerPublicacion()
    {
        $.ajax
    ({
        url: "includes/postulados.php"+location.search,
        type: 'GET',
        success: function(response)
        {
          console.log(response);
                let publicacion =  JSON.parse(response);
                let plantilla = "";

                sessionStorage.setItem('paginasPostulado',publicacion[publicacion.length - 1].paginas + '');
                delete publicacion[publicacion.length - 1]; //Borra el ultimo objeto que tiene el numero de pagina


                publicacion.forEach
                (
                    publicacion => 
                    {
                    plantilla += 
                    //le asignamos un atributo para encontrar el ID
                    `
                      
                        <div class='container'>

                        <div class="card">

          

                      
                      <div class="card-body">

                      <div class="row">

                      <div class="col-md-4">
                      
                        <img src="${publicacion.foto}" class="rounded img-thumbnail" style="width: 170px; height: 170px" alt="...">
                      
                      </div>

                      <div class="col-md-8">

                      <h5 class="card-title" style="text-transform: capitalize"><span> ${publicacion.nombre} </span> <span> ${publicacion.apellido} </span> </h5> 
                      <p class="card-text">${publicacion.descripcion}</p>
                      <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="perfil.php?id=${publicacion.id}&idpropuesta=${publicacion.idpropuesta}" target="_blank" class="btn btn-primary">Ver Perfil</a>
                      <a href="postuladosPDF.php?id=${publicacion.id}&idpropuesta=${publicacion.idpropuesta}" target="_blank" class="btn btn-info">PDF</a>
                      <a onclick="seleccionar(${publicacion.idusuarios}, ${publicacion.idempresa},${publicacion.idpropuesta})" class="btn btn-success">Seleccionar</a>
                    </div>

                      </div>

                      </div>
                
                      </div>
                      </div>

                        </div>
                      
                    `;
                    }
                )
                plantilla += mostrarPagina();
                $("#info").html(plantilla);
        }
    });
    }
})

function mostrarPagina(){
  let paginas = parseInt(sessionStorage.getItem('paginasPostulado'));
  let plantilla2 = '';
  if(paginas > 1){
    let a = location.search.split("pagina=")[0];
    let b = location.search.split("pagina=")[1];  
          let paginaActual = parseInt(obtenerPaginaActual());
          if(paginaActual === 1){var siguiente = 'disabled';}
          if(paginaActual === parseInt(paginas)){var anterior = 'disabled';}
          plantilla2 = `
          <nav aria-label="Page navigation example">
         <ul class="pagination justify-content-center">
        <li class="page-item ${siguiente}">
              <a class="page-link" href="infoPostulados.php${location.search.split("&pagina=")[0]}&pagina=${paginaActual- 1}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
              </a>
            </li>
                  ${obtenerListaPagina(paginas).join('')}
        
        <li class="page-item ${anterior}">
              <a class="page-link" href="infoPostulados.php${location.search.split("&pagina=")[0]}&pagina=${paginaActual + 1}" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
              </a>
          </li>
          </ul>
      </nav>
          `
  }
      return plantilla2;
  }
  //los <li> que tienen el nuemero de pagina
  function obtenerListaPagina(paginas){
      let liPagina = [];
  
      var paginaActual = parseInt(obtenerPaginaActual());
  
      for(let i=1 ;i <= paginas; i++) { 
          let desactivar = '';
          if(paginaActual == i){
              desactivar = 'disabled';
          }
  
          liPagina.push(`<li class="page-item ${desactivar}"><a class="page-link" href="infoPostulados.php${location.search.split("&pagina=")[0]}&pagina=${i}">${i}</a></li>`);
      }

      return liPagina;
  }

  function obtenerPaginaActual(){
      let pagina = location.search.split('pagina=')[1];
      if(pagina){
          return pagina;
      }
      return 1;
  }

  function seleccionar(idusuario, idempresa, idpropuesta){
    $.ajax({
      method: 'GET',
      url: `includes/seleccion.php?idusuarios=${idusuario}&idempresa=${idempresa}&idpropuesta=${idpropuesta}`
    }).done((resultado) => {
      if(resultado == 'insertado'){
        swal({
          title: "Postulate Seleccionado",
          text: "Puedes ver a este usuario en tu perfil",
          icon: "success",
          button: "Aceptar",
        });
      }else if(resultado == 'nInsertado'){
        swal({
          title: "El postulante ya fue seleccionado",
          text: "Ya se ha seleccionado con anterioridad este postulante",
          icon: "error",
          button: "Aceptar",
        });
      }
      console.log(resultado);
    }).fail((error) => {
      alert("fallido");
      console.log(error);
    })
  }
