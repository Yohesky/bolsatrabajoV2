

$(function () {
    mostrarPublicaciones();
    mostrarPagina();

});

function mostrarPublicaciones() {
    paginaActual = obtenerPaginaActual();
    console.log(paginaActual);
    $.ajax({
            url: "includes/mostrar.php"+location.search,
            type: "GET",
            success: function (response) {
                let publicaciones = JSON.parse(response);
                sessionStorage.setItem('paginas',publicaciones[publicaciones.length - 1].paginas + '');
                delete publicaciones[publicaciones.length - 1]; //Borra el ultimo objeto que tiene el numero de pagina
                let plantilla = "";
                publicaciones.forEach
                    (
                        publicaciones => {
                            plantilla +=
                                //le asignamos un atributo para encontrar el ID
                                `
            <div class="card card-body mb-2 container shadow-lg  bg-white rounded">
            
             <p><strong>Nombre:</strong> ${publicaciones.titulo}
             <br> <strong>Descripción:</strong> ${publicaciones.descripcion} 
             <br> <strong>Vacantes:</strong> ${publicaciones.vacantes} 
             <br> <strong>Sueldo:</strong> ${publicaciones.sueldo} 
             <br> <strong>Localizacion:</strong> ${publicaciones.localizacion} 
             <br> <strong>ID:</strong> ${publicaciones.id}
             <br> 
             <br>
             <a href="propuesta.php?id=${publicaciones.id}&idempresa=${publicaciones.idempresa}"><button type="button" class="btn btn-pill btn-success">Ver más</button> </a>
            
             </div>
            
                   `;
                        }
                    )
            plantilla += mostrarPagina();
            $("#publicaciones").html(plantilla);
            }
        });
    }

function mostrarPagina(){
    let paginas = parseInt(sessionStorage.getItem('paginas'));
    if(paginas > 1){
            let paginaActual = parseInt(obtenerPaginaActual());
            if(paginaActual === 1){var siguiente = 'disabled';}
            if(paginaActual === parseInt(paginas)){var anterior = 'disabled';}
            var plantilla2 = `
            <nav aria-label="Page navigation example">
 					<ul class="pagination justify-content-center">
					<li class="page-item ${siguiente}">
      					<a class="page-link" href="trabajador.php?pagina=${paginaActual- 1}" aria-label="Previous">
        				<span aria-hidden="true">&laquo;</span>
        				<span class="sr-only">Previous</span>
      					</a>
   					 </li>
                    ${obtenerListaPagina(paginas).join('')}
					
					<li class="page-item ${anterior}">
      					<a class="page-link" href="trabajador.php?pagina=${paginaActual + 1}" aria-label="Next">
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
    
        var paginaActual = obtenerPaginaActual();

        for(let i=1 ;i <= paginas; i++) { 
        let desactivar = '';
        if(paginaActual == i){
            desactivar = 'disabled';
        }
		
        liPagina.push(`<li class="page-item ${desactivar}"><a class="page-link" href="trabajador.php?pagina=${i}">${i}</a></li>`);
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