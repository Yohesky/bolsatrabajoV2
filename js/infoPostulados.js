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
                    

                    <div class="carta mx-auto">
    <div class="additional">
      <div class="user-card">

        <img src="${publicacion.foto}" width="110" height="110" class="center bg-white rounded-circle">
         
        </img>
      </div>
      <div class="more-info">
        <h1> ${publicacion.nombre} </h1>
        <div class="coords">
          <span>Group Name</span>
          <span>Joined January 2019</span>
        </div>
        <div class="coords">
          <span>Position/Role</span>
          <span>City, Country</span>
        </div>
        <div class="stats">
          <div>
            <div class="title">Awards</div>
            <i class="fa fa-trophy"></i>
            <div class="value">2</div>
          </div>
          <div>
            <div class="title">Matches</div>
            <i class="fa fa-gamepad"></i>
            <div class="value">27</div>
          </div>
          <div>
            <div class="title">Pals</div>
            <i class="fa fa-group"></i>
            <div class="value">123</div>
          </div>
          <div>
            <div class="title">Coffee</div>
            <i class="fa fa-coffee"></i>
            <div class="value infinity">∞</div>
          </div>
        </div>
      </div>
    </div>
    <div class="general">
      <div class="text-center mx-auto"> 
      <h3>${publicacion.nombre}</h3> - <h3>${publicacion.apellido}</h3>
      </div>
      <p style="word-break: break-all;">${publicacion.descripcion}</p>
      
      <div class="container-fluid">
      <div class="row justify-content-center">
      
      <div class="col-3 p-0">
      <a class="btn btn-info" href="perfil.php?id=${publicacion.id}&idpropuesta=${publicacion.idpropuesta}" target="_blank"> Ver </a>
      </div>

      <div class="col-4 p-0">
      <a class="btn btn-secondary" href="postuladosPDF.php?id=${publicacion.id}&idpropuesta=${publicacion.idpropuesta}" target="_blank"><i class="far fa-file-pdf"></i> PDF </a>
      </div>

      <div class="col-5 p-0">
      <a class="btn btn-primary" onclick="seleccionar(${publicacion.idusuarios}, ${publicacion.idempresa},${publicacion.idpropuesta})">Seleccionar</a>
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
          let paginaActual = parseInt(obtenerPaginaActual());
          if(paginaActual === 1){var siguiente = 'disabled';}
          if(paginaActual === parseInt(paginas)){var anterior = 'disabled';}
          plantilla2 = `
          <nav aria-label="Page navigation example">
         <ul class="pagination justify-content-center">
        <li class="page-item ${siguiente}">
              <a class="page-link" href="infoPostulados.php?pagina=${paginaActual- 1}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
              </a>
            </li>
                  ${obtenerListaPagina(paginas).join('')}
        
        <li class="page-item ${anterior}">
              <a class="page-link" href="infoPostulados.php?pagina=${paginaActual + 1}" aria-label="Next">
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
  
          liPagina.push(`<li class="page-item ${desactivar}"><a class="page-link" href="infoPostulados.php?pagina=${i}">${i}</a></li>`);
      }

      return liPagina;
  }

  function obtenerPaginaActual(){
      let pagina = location.search.split('=')[1];
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
      }else{
        swal({
          title: "El postulante ya fue seleccionado",
          text: "Ya se a seleccionado con anterioridad este postulante",
          icon: "success",
          button: "Aceptar",
        });
      }
      console.log(resultado);
    }).fail((error) => {
      alert("fallido");
      console.log(error);
    })
  }
