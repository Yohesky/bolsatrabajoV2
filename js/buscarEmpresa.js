

$(function () {

    mostrarPublicaciones();
    agregarEventoCheckboxRadio(['chkArea']);
    agregarEventoFormulario();

});



function mostrarPublicaciones() {
    paginaActual = obtenerPaginaActual();

    $.ajax({
            url: "includes/buscarEmpresa.php"+location.search,
            type: "GET",
        }).done(function(respuesta){
            console.log(respuesta);
            let publicaciones = JSON.parse(respuesta);
            publicar(publicaciones, "#publicaciones");

        }).fail(function(error){
            console.log(error);
        });
    }

//por hacer: buscar un mejor nombre
function publicar(publicaciones, ancla){

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

 <p><strong>Nombre:</strong> ${publicaciones.nombre}
 <br> <strong>Descripción:</strong> ${publicaciones.descripcion} 
 <br> <strong>Area:</strong> ${publicaciones.area} 
 <br> 
 <br>
 <a href="propuesta.php?id=${publicaciones.id}&idempresa=${publicaciones.idempresa}"><button type="button" class="btn btn-pill btn-success">Ver más</button> </a>

 </div>

       `;
            }
        )
plantilla += mostrarPagina();
$(ancla).html(plantilla);

}

function mostrarPagina(){
    let paginas = parseInt(sessionStorage.getItem('paginas'));
    let plantilla2 = '';
    if(paginas > 1){
            let paginaActual = parseInt(obtenerPaginaActual());
            if(paginaActual === 1){var siguiente = 'disabled';}
            if(paginaActual === parseInt(paginas)){var anterior = 'disabled';}
            plantilla2 = `
            <nav aria-label="Page navigation example">
 					<ul class="pagination justify-content-center">
					<li class="page-item ${siguiente}">
      					<a class="page-link" href="buscarEmpresa.php?pagina=${paginaActual- 1}" aria-label="Previous">
        				<span aria-hidden="true">&laquo;</span>
        				<span class="sr-only">Previous</span>
      					</a>
   					 </li>
                    ${obtenerListaPagina(paginas).join('')}
					
					<li class="page-item ${anterior}">
      					<a class="page-link" href="buscarEmpresa.php?pagina=${paginaActual + 1}" aria-label="Next">
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
		
            liPagina.push(`<li class="page-item ${desactivar}"><a class="page-link" href="buscarEmpresa.php?pagina=${i}">${i}</a></li>`);
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

    function establecerPagina(){
    
    }

function agregarEventoCheckboxRadio(nombres){
    
    nombres.forEach(nombre => {

        procesarCheckBoxRadio(nombre);
    });
}

function procesarCheckBoxRadio(nombre){


    checkboxes = document.getElementsByName(nombre);
    for (let i = 0; i < checkboxes.length; i++) {

        checkboxes[i].addEventListener('input', function(){

            //uso bind para usar el this de la funcion anonima y luego le paso el nombre como parametro
            checkboxRadio.bind(this)(nombre);
            buscar();
        });
    }
}

function checkboxRadio(name){

    if (!this.checked) return
    elem=document.getElementsByName(name);

    for(i=0;i<elem.length;i++) 
        elem[i].checked=false;

    this.checked=true;

    
}

function agregarEventoFormulario(){

    $('#iniciarBusqueda').click(function(){

        buscar();
    });
}

function buscar(){
    
    let formData = $('#formularioBuscar').serializeArray();
    let datos = JSON.parse(convertirFormJSON(formData));
    
    //comprueba si el input text buscar esta vacio
    if(datos.buscar == ''){
        delete datos.buscar;
    }

    buscarJSON(JSON.stringify(datos));

}

function convertirFormJSON(formData){

    let data = {};
    $(formData).each(function(index, obj){

        data[obj.name] = obj.value;
    });

    return JSON.stringify(data);
}

function buscarJSON(json){
    console.log('Datos de Entrada: ', json);
    let ajax = $.ajax({
        url: 'includes/buscarEmpresa.php?busqueda=true',
        type: 'GET',
        data: {datos: json}
    })
    
    ajax.done(function(respuesta){
        console.log('Datos de Salida', respuesta);
        history.pushState(null, "", "buscarEmpresa.php?pagina=1");
        let publicaciones = JSON.parse(respuesta);
        publicar(publicaciones, "#publicaciones");
    });

    ajax.fail(function(error){

        console.log('Datos de Salida', error);
    });
}