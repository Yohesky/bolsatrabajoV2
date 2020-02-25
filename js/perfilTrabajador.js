$(function () {

  let editar = false;
  obtenerFotoPerfil();
  insertarExp();
  mostrarExp();
  editarExperiencia();
  actualizarDescripcion();
  monstrarCurriculum();
  eliminarExperiencia();
  agregarFotoPerfil();
  seleccion()


  //$('#subirFoto').modal('show');
  var archivoValidado = false;


 $('#archivoCurriculum').change(function(evento){
  let archivo = evento.target.files[0];
  if(archivo.size > 10485760){
    archivoValidado = false;
    alert('Tamaño del archivo:' + returnFileSize(archivo.size) +'\nEl archivo no puede superar los 10MB');
  }else{
    archivoValidado = true;
  }
  console.log(archivoValidado);
 });
 



    $("#formularioTarea").submit(function (e) {
    e.preventDefault();
    var form;
    const formulario = document.getElementById("formularioTarea").checkValidity();
    console.log(formulario);
    form = new FormData(document.getElementById("formularioTarea"));
    if(formulario){
    if(!archivoValidado){
      form.delete('curriculum');
    }

      if ($.trim(nombre).length > 0) {
        $.ajax({
          method: 'POST',
          url: 'includes/datosTrabajador.php',
          dataType: 'html',
          data: form,
          cache: false,
          contentType: false,
          processData: false,
          success: function (response) {
            console.log(response);

              swal({
                title: "Datos actualizados",
                text: "Sus datos han sido actualizados",
                icon: "success",
                button: "Continuar",
              });

              actualizarCurriculum();
          },//success
          error: function(error){
            console.log(error);
          }
        });
      }
    
    }
  });

  $('#cerrar-modal').click(function(e){
    $("#formularioExperiencia").removeClass('was-validated');
    $("#formularioExperiencia").trigger("reset");
  });

  $('#anadirExp').click(function(e){
    editar = false;
  })

  function insertarExp() {
    
    $("#formularioExperiencia").submit(function (e) {

      let formulario = document.getElementById('formularioExperiencia');

      if(formulario.checkValidity()){

      
      let form = $("#formularioExperiencia").serialize();
  
      console.log(form);
      if ($.trim(expEmpresa.value).length > 0 && $.trim(expPais.value).length > 0 && $.trim(expSector.value).length > 0 &&
        $.trim(expArea.value).length > 0 && $.trim(expLabor.value).length > 0 && $.trim(expFechaIni.value).length > 0 && $.trim(expFechaFin.value).length > 0) {
          let direccion = editar ?  "includes/actualizacionExperiencia.php":"includes/insertarExp.php";
          console.log(direccion)
        $.ajax({
          method: 'POST',
          url: direccion,
          data: form,
          success: function (response) {
            mostrarExp();

            console.log(response)
          },
          error: function(error){
            console.log(error);
          }
        });
      }

    $("#formularioExperiencia").trigger("reset");
    }
    
    e.preventDefault();
    });
  }

  function mostrarExp() {
    $.ajax
      ({
        url: "includes/mostrarExp.php",
        type: 'GET',
        success: function (response) {
          let experiencia = JSON.parse(response);
          let plantilla = "";
          experiencia.forEach
            (
              experiencia => {
                plantilla +=
                  //le asignamos un atributo para encontrar el ID
                  `
              
                <div class="card text-white bg-info mb-3 mx-auto mt-4" style="max-width: 18rem;">
                <div class="card-header">${experiencia.expEmpresa}</div>
                <div class="card-body">
                  <h5 class="card-title">${experiencia.expPais}</h5>
                  <h5 class="card-title">${experiencia.expSector}</h5>
                  <h5 class="card-title">${experiencia.expArea}</h5>
                  <p class="card-text">${experiencia.expLabor}.</p>
                  <div class="row">

                  <div class="col-md-6">
                  <button type="button" class="btn btn-light editar-experiencia" value="${experiencia.idexp}" data-toggle="modal" data-target="#exampleModal">
                  Modificar
                  </button>
                  </div>

                  <div class="col-md-6">
                  <button type="button" class="btn btn-danger eliminar-exp" value="${experiencia.idexp}">Eliminar</button>
                  </div>
                  </div>
                </div>
              </div>
                
                    `;
              }
            )
          $("#experiencia").html(plantilla);
        }
      });
  }

  function actualizarDescripcion()
  {
    $("#formularioDescripcion").submit(function(e)
    {

      let form = $("#formularioDescripcion").serialize();
      console.log(form);
      if($.trim(descripcion).length > 0 )
      {
        $.ajax(
          {
            url: 'includes/actualizarDescripcion.php',
            method: 'POST',
            data: form,
            success: function (response) {
              if (response === 'exito') {
                swal({
                  title: "Descripción actualizada",
                  text: "Su descripción ha sido actualizada",
                  icon: "success",
                  button: "Continuar",
                });
              }
            }   
          }
        )
      }
      e.preventDefault();
      
    }
    )
  }

  function eliminarExperiencia()
  {
    $(document).on("click", ".eliminar-exp", function()
    {
        //obtiene el boton que fue clickeado "eliminar-tarea"
        //el boton es un arreglo que esta en la posicion 0 por eso se selecciona
        let elemento = $(this);
          //encontramos el ID tareas para enviarlo al backend
          let id = $(elemento).attr("value")
          console.log(id);
  
          $.post("includes/eliminarExperiencia.php", {id}, function(response)
          {   
          //     //para que haga de nuevo la peticion al backend y no refresque la pagina
            mostrarExp();
            console.log(response)
          });
  
  
    });
  }

  function editarExperiencia()
    {
        $(document).on("click", ".editar-experiencia", function()
        {
            //obtiene el boton que fue clickeado "eliminar-tarea"
            //el boton es un arreglo que esta en la posicion 0 por eso se selecciona
            let elemento = $(this);
              //encontramos el ID tareas para enviarlo al backend
              let idexp = $(elemento).attr("value")
              console.log(idexp);
      
              $.post("includes/actExperiencia.php", {idexp}, function(response)
             {   
               const experiencia = JSON.parse(response);
               $("#expEmpresa").val(experiencia.expEmpresa);
               $("#expPais").val(experiencia.expPais);
               $("#expSector").val(experiencia.expSector);
               $("#expArea").val(experiencia.expArea);
               $("#expLabor").val(experiencia.expLabor);
               $("#expFechaIni").val(experiencia.expFechaIni);
               $("#expFechaFin").val(experiencia.expFechaFin);
               $("#experienciaID").val(experiencia.idexp)
               editar = true;
               console.log(response)
              
              });
      
      
        });  
    }



});

function monstrarCurriculum(){
  let curriculum = $("#curriculum");
  let direcion = curriculum.attr('direccion');

  curriculum.html(`
    <embed class='mostrar-curriculum' src="${direcion}" id="mostrarCurriculum"></embed>
    `);

}



function returnFileSize(number) {
  if(number < 1024) {
    return number + 'bytes';
  } else if(number >= 1024 && number < 1048576) {
    return (number/1024).toFixed(1) + 'KB';
  } else if(number >= 1048576) {
    return (number/1048576).toFixed(1) + 'MB';
  }
}

function actualizarCurriculum(){

  const idusuarios = $('#curriculum').attr('idusuarios');
  console.log(idusuarios);
  $.ajax({
    method: 'GET',
    url: 'includes/obtenerCurriculum.php?idusuarios='+idusuarios,
  }).done(function(resultado){
    console.log('curriculum: ' + resultado);
    let curriculum = $("#curriculum");
    curriculum.html(`
    <embed class='mostrar-curriculum' src="${resultado}" id="mostrarCurriculum"></embed>
    `);
  }).fail(function(error){
    console.log(error)
  })
  
	
}



function agregarFotoPerfil(){
  
  let fotoPerfil = $('.contenedor-foto-perfil').click(function(){
    $('#subirFoto').html(`
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">Subir Foto de Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <div class="container">
        <div class="row">
            <div class="visualizadorFotoPerfil">
            <img alt="Subir Foto" id="visualizador" class="img-fluid"></div>
            <div id="datosFoto"></div>
        </div>
      </div>
        
        
        <form id="formFotoPerfil" class="mt-5">
            <input type="file" name="fotoPerfil" accept=".jpg, .png">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  id="botonCancelar" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" form="formFotoPerfil" id="botonGuardar" disabled>Guardar</button>
      </div>
    </div>
  </div>
    `);  
    
  agregarOpacidad(fotoPerfil);
  previsualizar();
  subirFoto();
  });

  $('#botonCancelar').click(function(){
    quitarModal();
    $('#subirFoto').html('');
  });

}

function agregarOpacidad(fotoPerfil){

  let textEditar = $('.texto-editar');//div con el texto de Editar que se debe mostrar al colocar el cursor sobre la imagen

  fotoPerfil.hover(function(){
    $(this).css('opacity', 0.5);
    textEditar.css('visibility', 'visible');
  }, function(){
    $(this).css('opacity', 1);
    textEditar.css('visibility', 'hidden');
  });
}

function subirFoto(){
  let form = $('#formFotoPerfil').submit(function(){
    event.preventDefault();
    enviarFotoPerfil();
    quitarModal();

  });
}

function quitarModal(){
  $('#subirFoto').modal('hide');
  $('.modal-backdrop').remove();
}

function previsualizar(){
  $('#formFotoPerfil input[type=file]').change(function(){
    let botonGuardar = $('#botonGuardar');
    console.log(this.files.length);
    if(this.files.length !== 0){
      botonGuardar.prop('disabled', false);
      archivo = event.target.files[0];
    
      $('.visualizadorFotoPerfil').addClass('col-4');
      $('#datosFoto').html(`
        <div>
          Nombre: ${archivo.name}<br/>
          Tamaño: ${returnFileSize(archivo.size)}<br/>
        </div>
      `).addClass('col-8');
      let lector = new FileReader();
      lector.addEventListener('load', previsualizarFotoPerfil);
      lector.readAsDataURL(archivo);
    }else{
      botonGuardar.prop('disabled', true)
    }
  });
}

function previsualizarFotoPerfil(){
  let resultado = event.target.result;

  $('#visualizador').attr('src', resultado);
}

function enviarFotoPerfil(){
  let form = new FormData(document.getElementById('formFotoPerfil'));

  let ajax = $.ajax({
    method: 'POST',
    url: './includes/fotoPerfil.php',
    dataType: 'html',
    data: form,
    cache: false,
    contentType: false,
    processData: false
  });
  
  ajax.done(function(respuesta){
    console.log(respuesta);
    if(respuesta === 'exito'){
      obtenerFotoPerfil();
    }
  });

  ajax.fail(function(error){
    console.log(error);
  });

}

function obtenerFotoPerfil(){
  let ajax = $.ajax({
    url: './includes/fotoPerfil.php?obtenerFotoPerfil=true'});

  ajax.done(function(resultado){
    $('#fotoPerfil').attr({'src':resultado, height: '144px', width: '144px'});
  })
  ajax.fail(function(error){
    alert(error);
  })
}

function seleccion() {
  var amazonas = [
      { display: "Maroa", value: "Maroa" },
      { display: "Puerto Ayacucho", value: "Puerto Ayacucho" },
      { display: "Puerto Paez", value: "Puerto Paez" },
      { display: "San Carlos de Río Negro", value: "San Carlos de Río Negro" },
      { display: "San Fernando de Atabapo", value: "San Fernando de Atabapo" },
      { display: "San Fernando de Guainia", value: "San Fernando de Guainia" },
      { display: "San Juan de Manapiare", value: "San Juan de Manapiare" },
      { display: "San Simón de Cocuy", value: "San Simón de Cocuy" },
      { display: "Santa Rosa de Amanadona", value: "Santa Rosa de Amanadona" }
  ]

  var anzoategui = [
      { display: "Anaco", value: "Anaco" },
      { display: "Aragua de Barcelona", value: "Aragua de Barcelona" },
      { display: "Atapirire", value: "Atapirire" },
      { display: "Barcelona", value: "Barcelona" },
      { display: "Bergantín", value: "Bergantín" },
      { display: "Boca de Uchire", value: "Boca de Uchire" },
      { display: "Cachipo", value: "Cachipo" },
      { display: "Caigua", value: "Caigua" },
      { display: "Cantaura", value: "Cantaura" },
      { display: "Clarines", value: "Clarines" },
      { display: "El Carito", value: "El Carito" },
      { display: "El Hatillo", value: "El Hatillo" },
      { display: "El Morro de Barcelona", value: "El Morro de Barcelona" },
      { display: "El Pao", value: "El Pao" },
      { display: "El Pilar", value: "El Pilar" },
      { display: "El Tigre", value: "El Tigre" },
      { display: "Guanape", value: "Guanape" },
      { display: "Guanta", value: "Guanta" },
      { display: "Guaribe de Cajigal", value: "Guaribe de Cajigal" },
      { display: "La Margarita", value: "La Margarita" },
      { display: "Lecherías", value: "Lecherías" },
      { display: "Los Altos de Santa Fe", value: "Los Altos de Santa Fe" },
      { display: "Los Pilones", value: "Los Pilones" },
      { display: "Mapire", value: "Mapire" },
      { display: "Modulo de Boyacá", value: "Modulo de Boyacá" },
      { display: "Modulo de Chuparin", value: "Modulo de Chuparin" },
      { display: "Mundo Nuevo", value: "Mundo Nuevo" },
      { display: "Naricual", value: "Naricual" },
      { display: "Onoto", value: "Onoto" },
      { display: "Pariaguán", value: "Pariaguán" },
      { display: "Pertigalete", value: "Pertigalete" },
      { display: "Píritu", value: "Píritu" },
      { display: "Pozuelos", value: "Pozuelos" },
      { display: "Puerto la Cruz", value: "Puerto la Cruz" },
      { display: "Puerto Píritu", value: "Puerto Píritu" },
      { display: "Sabana de Uchire", value: "Sabana de Uchire" },
      { display: "San Diego de Cabrutica", value: "San Diego de Cabrutica" },
      { display: "San Joaquín", value: "San Joaquín" },
      { display: "San José de Guanipa", value: "San José de Guanipa" },
      { display: "San Mateo", value: "San Mateo" },
      { display: "San Miguel", value: "San Miguel" },
      { display: "San Pablo", value: "San Pablo" },
      { display: "San Tomé", value: "San Tomé" },
      { display: "Santa Ana", value: "Santa Ana" },
      { display: "Santa Clara", value: "Santa Clara" },
      { display: "Santa Cruz del Orinoco", value: "Santa Cruz del Orinoco" },
      { display: "Santa Inés", value: "Santa Inés" },
      { display: "Santa Rosa", value: "Santa Rosa" },
      { display: "Uríca", value: "Uríca" },
      { display: "Uverito", value: "Uverito" },
      { display: "Valle Guanape", value: "Valle Guanape" },
      { display: "Zuata", value: "Zuata" }
  ]


  var aragua = [
      { display: "Bolivar", value: "Bolivar" },
      { display: "Carmatagua", value: "Carmatagua" },
      { display: "Francisco Linares Alcantara", value: "Francisco Linares Alcantara" },
      { display: "Girardot", value: "Girardot" },
      { display: "Jose Angel Lamas", value: "Jose Angel Lamas" },
      { display: "Jose Feliz Ribas", value: "Jose Feliz Ribas" },
      { display: "Jose Rafael Revenga", value: "Jose Rafael Revenga" },
      { display: "Libertador", value: "Libertador" },
      { display: "Mario Briceño Iragorry", value: "Mario Briceño Iragorry" },
      { display: "Ocumare de la Costa de Oro", value: "Ocumare de la Costa de Oro" },
      { display: "San Casimiro", value: "San Casimiro" },
      { display: "San Sebastian", value: "San Sebastian" },
      { display: "Santiago Mariño", value: "Santiago Mariño" },
      { display: "Santos Michelena", value: "Santos Michelena" },
      { display: "Sucre", value: "Sucre" },
      { display: "Tovar", value: "Tovar" },
      { display: "Urdaneta", value: "Urdaneta" },
      { display: "Zamora", value: "Zamora" },

  ]

  var apure = [
      { display: "Achaguas", value: "Achaguas" },
      { display: "Biruaca", value: "Biruaca" },
      { display: "Muñoz", value: "Muñoz" },
      { display: "Arismendi", value: "Arismendi" },
      { display: "Paez", value: "Paez" },
      { display: "Pedro Camejo", value: "Pedro Camejo" },
      { display: "Romulo Gallegos", value: "Romulo Gallegos" },
      { display: "San Fernando", value: "San Fernando" },

  ]


  var barinas = [
      { display: "Alberto Arvelo Torrealba", value: "Alberto Arvelo Torrealba" },
      { display: "Andres Eloy Blanco", value: "Andres Eloy Blanco" },
      { display: "Antonio Jose de Sucre", value: "Antonio Jose de Sucre" },
      { display: "Arismendi", value: "Arismendi" },
      { display: "Barinas", value: "Barinas" },
      { display: "Bolivar", value: "Bolivar" },
      { display: "Cruz Paredes", value: "Cruz Paredes" },
      { display: "Ezequiel Zamora", value: "Ezequiel Zamora" },
      { display: "Obispos", value: "Obispos" },
      { display: "Pedraza", value: "Pedraza" },
      { display: "Rojas", value: "Rojas" },
      { display: "Sosa", value: "Sosa" },

  ]

  var bolivar = [
      { display: "Caroni", value: "Caroni" },
      { display: "Cedeño", value: "Cedeño" },
      { display: "El callao", value: "El callao" },
      { display: "Gran Sabana", value: "Gran Sabana" },
      { display: "Heres", value: "Heres" },
      { display: "Padre Pedro Chien", value: "Padre Pedro Chien" },
      { display: "Piar", value: "Piar" },
      { display: "Raul Leoni", value: "Ezequiel Zamora" },
      { display: "Roscio", value: "Roscio" },
      { display: "Sifontes", value: "Sifontes" },
      { display: "Sucre", value: "Sucre" },

  ]

  var Carabobo = [
      { display: "Bejuma", value: "Bejuma" },
      { display: "Carlos Arvelo", value: "Carlos Arvelo" },
      { display: "Diego Ibarra", value: "Diego Ibarra" },
      { display: "Guacara", value: "Guacara" },
      { display: "Juan José Mora", value: "Juan José Mora" },
      { display: "Libertador", value: "Libertador" },
      { display: "Los Guayos", value: "Los Guayos" },
      { display: "Miranda", value: "Miranda" },
      { display: "Montalbán", value: "Montalbán" },
      { display: "Naguanagua", value: "Naguanagua" },
      { display: "Puerto Cabello", value: "Puerto Cabello" },
      { display: "San Diego", value: "San Diego" },
      { display: "San Joaquín", value: "San Joaquín" },
      { display: "Valencia", value: "Valencia" },
  ]

  var Cojedes = [
      { display: "Anzoátegui", value: "Anzoátegui" },
      { display: "Ezequiel Zamora", value: "Ezequiel Zamora" },
      { display: "Girardot", value: "Girardot" },
      { display: "Lima Blanco", value: "Lima Blanco" },
      { display: "Pao de San Juan Bautista", value: "Pao de San Juan Bautista" },
      { display: "Ricaurte", value: "Ricaurte" },
      { display: "Rómulo Gallegos", value: "Rómulo Gallegos" },
      { display: "Tinaco", value: "Tinaco" },
      { display: "Tinaquillo", value: "Tinaquillo" },
  ]

  var DeltaAmacuro = [
      { display: "Antonio Díaz", value: "Antonio Díaz" },
      { display: "Casacoima", value: "Casacoima" },
      { display: "Pedernales", value: "Pedernales" },
      { display: "Tucupita", value: "Tucupita" },
  ]

  var Falcon = [
      { display: "Acosta", value: "Acosta" },
      { display: "Bolivar", value: "Bolivar" },
      { display: "Buchivacoa", value: "Buchivacoa" },
      { display: "Cacique Manaure", value: "Cacique Manaure" },
      { display: "Carirubana", value: "Carirubana" },
      { display: "Colina", value: "Colina" },
      { display: "Dabajuro", value: "Dabajuro" },
      { display: "Democracia", value: "Democracia" },
      { display: "Falcón", value: "Falcón" },
      { display: "Federación", value: "Federación" },
      { display: "Jacura", value: "Jacura" },
      { display: "Los Taques", value: "Los Taques" },
      { display: "Mauroa", value: "Mauroa" },
      { display: "Miranda", value: "Miranda" },
      { display: "Monseñor Iturriza", value: "Monseñor Iturriza" },
      { display: "Palma Sola", value: "Palma Sola" },
      { display: "Petit", value: "Petit" },
      { display: "Píritu", value: "Píritu" },
      { display: "San Francisco", value: "San Francisco" },
      { display: "Silva", value: "Silva" },
      { display: "Sucre", value: "Sucre" },
      { display: "Tocópero", value: "Tocópero" },
      { display: "Unión", value: "Unión" },
      { display: "Urumaco", value: "Urumaco" },
      { display: "Zamora", value: "Zamora" },
  ]
  var guarico = [
      { display: "Camaguán", value: "Camaguán" },
      { display: "Chaguaramas", value: "Chaguaramas" },
      { display: "El Socorro", value: "El Socorro" },
      { display: "Infante", value: "Infante" },
      { display: "Juan Germán Roscio", value: "Juan Germán Roscio" },
      { display: "Las Mercedes", value: "Las Mercedes" },
      { display: "Mellado", value: "Mellado" },
      { display: "Miranda", value: "Miranda" },
      { display: "Monagas", value: "Monagas" },
      { display: "Ortiz", value: "Ortiz" },
      { display: "Ribas", value: "Ribas" },
      { display: "San Gerónimo de Guayabal", value: "San Gerónimo de Guayabal" },
      { display: "San José de Guaribe", value: "San José de Guaribe" },
      { display: "Santa María de Ipire", value: "Santa María de Ipire" },
      { display: "Zaraza", value: "Zaraza" },
  ]
  var Lara = [
      { display: "Andrés Eloy Blanco", value: "Andrés Eloy Blanco" },
      { display: "Crespo", value: "Crespo" },
      { display: "Iribarren", value: "Iribarren" },
      { display: "Jiménez", value: "Jiménez" },
      { display: "Morán", value: "Morán" },
      { display: "Palavecino", value: "Palavecino" },
      { display: "Simón Planas", value: "Simón Planas" },
      { display: "Torres", value: "Torres" },
      { display: "Urdaneta", value: "Urdaneta" },
  ]
  var merida = [
      { display: "Alberto Adriani", value: "Alberto Adriani" },
      { display: "Andrés Bello", value: "Andrés Bello" },
      { display: "Antonio Pinto Salinas", value: "Antonio Pinto Salinas" },
      { display: "Acarigua", value: "Acarigua" },
      { display: "Arzobispo Chacón", value: "Arzobispo Chacón" },
      { display: "Campo Elías", value: "Campo Elías" },
      { display: "Caracciolo Parra Olmedo", value: "Caracciolo Parra Olmedo" },
      { display: "Cardenal Quintero", value: "Cardenal Quintero" },
      { display: "Guaraque", value: "Guaraque" },
      { display: "Julio César Salas", value: "Julio César Salas" },
      { display: "Justo Briceño", value: "Justo Briceño" },
      { display: "Libertador", value: "Libertador" },
      { display: "Miranda", value: "Miranda" },
      { display: "Obispo Ramos de Lora", value: "Obispo Ramos de Lora" },
      { display: "Padre Noguera", value: "Padre Noguera" },
      { display: "Pueblo Llano", value: "Pueblo Llano" },
      { display: "Rangel", value: "Rangel" },
      { display: "Rivas Dávila", value: "Rivas Dávila" },
      { display: "Santos Marquina", value: "Santos Marquina" },
      { display: "Sucre", value: "Sucre" },
      { display: "Tovar", value: "Tovar" },
      { display: "Tulio Febres Cordero", value: "Tulio Febres Cordero" },
      { display: "Zea", value: "Zea" },
  ]
  var Miranda = [
      { display: "Acevedo", value: "Acevedo" },
      { display: "Andrés Bello", value: "Andrés Bello" },
      { display: "Baruta", value: "Baruta" },
      { display: "Brión", value: "Brión" },
      { display: "Buroz", value: "Buroz" },
      { display: "Carrizal", value: "Carrizal" },
      { display: "Chacao", value: "Chacao" },
      { display: "Cristóbal Rojas", value: "Cristóbal Rojas" },
      { display: "El Hatillo", value: "El Hatillo" },
      { display: "Guicaipuro", value: "Guicaipuro" },
      { display: "Independencia", value: "Independencia" },
      { display: "Los Salias", value: "Los Salias" },
      { display: "Páez", value: "Páez" },
      { display: "Paz Castillo", value: "Paz Castillo" },
      { display: "Pedro Gual", value: "Pedro Gual" },
      { display: "Plaza", value: "Plaza" },
      { display: "Simón Bolívar", value: "Simón Bolívar" },
      { display: "Sucre", value: "Sucre" },
      { display: "Tomás Lander", value: "Tomás Lander" },
      { display: "Urdaneta", value: "Urdaneta" },
      { display: "Zamora", value: "Zamora" },
  ]

  var Monagas = [
      { display: "Acosta", value: "Acosta" },
      { display: "Aguasay", value: "Aguasay" },
      { display: "Bolivar", value: "Bolivar" },
      { display: "Caripe", value: "Caripe" },
      { display: "Cedeño", value: "Cedeño" },
      { display: "Ezequiel Zamora", value: "Ezequiel Zamora" },
      { display: "Libertador", value: "Libertador" },
      { display: "Maturin", value: "Maturin" },
      { display: "Piar", value: "Piar" },
      { display: "Punceres", value: "Punceres" },
      { display: "Santa Barbara", value: "Santa Barbara" },
      { display: "Sotillo", value: "Sotillo" },
      { display: "Uracoa", value: "Uracoa" },
  ]

  var NuevaEsparta = [
      { display: "Antolin del Campo", value: "Antolin del Campo" },
      { display: "Arismendi", value: "Arismendi" },
      { display: "Diaz", value: "Diaz" },
      { display: "Garcia", value: "Garcia" },
      { display: "Gomez", value: "Gomez" },
      { display: "Maneiro", value: "Maneiro" },
      { display: "Marcano", value: "Marcano" },
      { display: "Mariño", value: "Mariño" },
      { display: "Peninsula de Macanao", value: "Peninsula de Macanao" },
      { display: "Tubores", value: "Tubores" },
      { display: "Villalba", value: "Villalba" },

  ]

  var Portuguesa = [
      { display: "Agua Blanca", value: "Agua Blanca" },
      { display: "Araure", value: "Araure" },
      { display: "Esteller", value: "Esteller" },
      { display: "Guanare", value: "Guanare" },
      { display: "Guanarito", value: "Guanarito" },
      { display: "Monseñor Jose Vicente de Unda", value: "Monseñor Jose Vicente de Unda" },
      { display: "Ospino", value: "Ospino" },
      { display: "Paez", value: "Paez" },
      { display: "Papelon", value: "Papelon" },
      { display: "San Genaro de Boconoito", value: "San Genaro de Boconoito" },
      { display: "San Rafael de Onoto", value: "San Rafael de Onoto" },
      { display: "Santa Rosalia", value: "Santa Rosalia" },
      { display: "Sucre", value: "Sucre" },
      { display: "Turen", value: "Turen" },

  ]

  var Sucre = [
      { display: "Andres Eloy Blanco", value: "Andres Eloy Blanco" },
      { display: "Andres Mata", value: "Andres Mata" },
      { display: "Arismendi", value: "Arismendi" },
      { display: "Benitez", value: "Benitez" },
      { display: "Bermudez", value: "Bermudez" },
      { display: "Bolivar", value: "Bolivar" },
      { display: "Cajigal", value: "Cajigal" },
      { display: "Cruz Salmeron Acosta", value: "Cruz Salmeron Acosta" },
      { display: "Libertador", value: "Libertador" },
      { display: "Mariño", value: "Mariño" },
      { display: "Mejia", value: "Mejia" },
      { display: "Montes", value: "Montes" },
      { display: "Ribero", value: "Ribero" },
      { display: "Sucre", value: "Sucre" },
      { display: "Valdez", value: "Valdez" },

  ]

  var Tachira = [
      { display: "Andres Bello", value: "Andres Bello" },
      { display: "Antonio Romulo Acosta", value: "Antonio Romulo Acosta" },
      { display: "Ayacucho", value: "Ayacucho" },
      { display: "Bolivar", value: "Bolivar" },
      { display: "Cardenas", value: "Cardenas" },
      { display: "Cordoba", value: "Cordoba" },
      { display: "Fernandez Feo", value: "Fernandez Feo" },
      { display: "Francisco de Miranda", value: "Francisco de Miranda" },
      { display: "Garcia de Hevia", value: "Garcia de Hevia" },
      { display: "Guasimos", value: "Guasimos" },
      { display: "Independencia", value: "Independencia" },
      { display: "Jauregui", value: "Jauregui" },
      { display: "Jose Maria Vargas", value: "Jose Maria Vargas" },
      { display: "Junin", value: "Junin" },
      { display: "Libertad", value: "Libertad" },
      { display: "Libertador", value: "Libertador" },
      { display: "Lobatera", value: "Lobatera" },
      { display: "Michelena", value: "Michelena" },
      { display: "Panamericano", value: "Panamericano" },
      { display: "Pedro Maria Ureña", value: "Pedro Maria Ureña" },
      { display: "Rafael Urdaneta", value: "Rafael Urdaneta" },
      { display: "Samuel Dario Maldonado", value: "Samuel Dario Maldonado" },
      { display: "San Cristobal", value: "San Cristobal" },
      { display: "San Judas Tadeo", value: "San Judas Tadeo" },
      { display: "Seboruco", value: "Seboruco" },
      { display: "Simon Rodriguez", value: "Simon Rodriguez" },
      { display: "Sucre", value: "Sucre" },
      { display: "Torbes", value: "Torbes" },
      { display: "Uribantes", value: "Uribantes" },

  ]

  var Trujillo = [
      { display: "Andres Bello", value: "Andres Bello" },
      { display: "Bocono", value: "Bocono" },

      { display: "Bolivar", value: "Bolivar" },
      { display: "Candelaria", value: "Candelaria" },
      { display: "Carache", value: "Carache" },
      { display: "Escuque", value: "Escuque" },
      { display: "Jose Vicente Campo Elias", value: "Jose Vicente Campo Elias" },
      { display: "La Ceiba", value: "La Ceiba" },
      { display: "Miranda", value: "Miranda" },
      { display: "Monte Carmelo", value: "Monte Carmelo" },
      { display: "Motatan", value: "Motatan" },
      { display: "Pampam", value: "Pampam" },
      { display: "Pampanito", value: "Pampanito" },
      { display: "Rafael Rangel", value: "Rafael Rangel" },
      { display: "San Rafael de Carvajal", value: "San Rafael de Carvajal" },
      { display: "Sucre", value: "Sucre" },
      { display: "Trujillo", value: "Trujillo" },
      { display: "Urdaneta", value: "Urdaneta" },
      { display: "Valera", value: "Valera" },


  ]

  var Vargas = [
      { display: "Anare", value: "Anare" },
      { display: "Camurí Grande", value: "Camurí Grande" },

      { display: "Caraballeda", value: "Caraballeda" },
      { display: "Carayaca", value: "Carayaca" },
      { display: "Catia la Mar", value: "Catia la Mar" },
      { display: "La Guaira", value: "La Guaira" },
      { display: "La Sabana", value: "La Sabana" },
      { display: "Las Salinas", value: "Las Salinas" },
      { display: "Los Caracas", value: "Los Caracas" },
      { display: "Macuto", value: "Macuto" },
      { display: "Maiquetía", value: "Maiquetía" },
      { display: "Marapa", value: "Marapa" },
      { display: "Naiguatá", value: "Naiguatá" },
      { display: "Oricao", value: "Oricao" },
      { display: "Puerto Carayaca", value: "Puerto Carayaca" },
  ]

  var Yaracuy = [
      { display: "Aristides Bastidas", value: "Aristides Bastidas" },
      { display: "Bolivar", value: "Bolivar" },

      { display: "Bruzual", value: "Bruzual" },
      { display: "Cocorote", value: "Cocorote" },
      { display: "Independencia", value: "Independencia" },
      { display: "Jose Antonio Paez", value: "Jose Antonio Paez" },
      { display: "La Trinidad", value: "La Trinidad" },
      { display: "Manuel Mongue", value: "Manuel Mongue" },
      { display: "Nirgua", value: "Nirgua" },
      { display: "Peña", value: "Peña" },
      { display: "San Felipe", value: "San Felipe" },
      { display: "Sucre", value: "Sucre" },
      { display: "Urachiche", value: "Urachiche" },
      { display: "Veroes", value: "Veroes" },

  ]




  var Zulia = [
      { display: "Almirante Padilla", value: "Almirante Padilla" },
      { display: "Baralt", value: "Baralt" },
      { display: "Cabimas", value: "Cabimas" },
      { display: "Catatumbo", value: "Catatumbo" },
      { display: "Colon", value: "Colon" },
      { display: "Francisco Javier Pulgar", value: "Francisco Javier Pulgar" },
      { display: "Jesus Enrique Lozada", value: "Jesus Enrique Lozada" },
      { display: "Jesus Maria Semprum", value: "Jesus Maria Semprum" },
      { display: "Cañada de Urdaneta", value: "Cañada de Urdaneta" },
      { display: "Lagunillas", value: "Lagunillas" },
      { display: "Machiques", value: "Machiques" },
      { display: "Perija", value: "Perija" },
      { display: "Maracaibo", value: "Maracaibo" },
      { display: "Miranda", value: "Miranda" },
      { display: "Paez", value: "Paez" },
      { display: "Rosario de Perija", value: "Rosario de Perija" },
      { display: "San Francisco", value: "San Francisco" },
      { display: "Santa Rita", value: "Santa Rita" },
      { display: "Guaribe de Cajigal", value: "Guaribe de Cajigal" },
      { display: "Simon Bolivar", value: "Simon Bolivar" },
      { display: "Sucre", value: "Sucre" },
      { display: "Valmore Rodriguez", value: "Valmore Rodriguez" },
      { display: "Mara", value: "Mara" },

  ]

  var distritoCapital = [
      { display: "Caracas", value: "Caracas" },
      { display: "Libertador", value: "Libertador" },
     

  ]



  $("#estado").change(function () {

      var select = $("#estado option:selected").val();

      switch (select) {
          case "Amazonas":
              city(amazonas);
              break;

          case "Anzoategui":
              city(anzoategui);
              break;

          case "Apure":
              city(apure);
              break;

          case "Aragua":
              city(aragua);
              break;

              case "Aragua":
              city(aragua);
              break;

              case "Barinas":
              city(barinas);
              break;

              case "Bolivar":
              city(bolivar);
              break;

              case "Carabobo":
              city(Carabobo);
              break;

              case "Cojedes":
              city(Cojedes);
              break;
              
              case "Delta Amacuro":
              city(DeltaAmacuro);
              break;

              case "Distrito Capital":
              city(distritoCapital);
              break;

              case "Falcon":
              city(Falcon);
              break;

              case "Guarico":
              city(guarico);
              break;

              case "Lara":
              city(Lara);
              break;

              case "Merida":
              city(merida);
              break;

              case "Miranda":
              city(Miranda);
              break;

              case "Monagas":
              city(Monagas);
              break;

              case "Nueva Esparta":
              city(NuevaEsparta);
              break;

              case "Portuguesa":
              city(Portuguesa);
              break;

              case "Sucre":
              city(Sucre);
              break;

              case "Tachira":
              city(Tachira);
              break;
             
              case "Trujillo":
              city(Trujillo);
              break;

              case "Vargas":
              city(Vargas);
              break;

              case "Yaracuy":
              city(Yaracuy);
              break;

              case "Zulia":
              city(Zulia);
              break;
             

          default:
              $("#ciudad").empty();
              $("#ciudad").append("<option value=''>--Select--</option>");
              break;
      }
  });

  function city(arr) {
      $("#ciudad").empty();//To reset cities
      $("#ciudad").append("<option value=''>--Select--</option>");
      $(arr).each(function (i) {//to list cities
          $("#ciudad").append("<option value=\"" + arr[i].value + "\">" + arr[i].display + "</option>")
      });
  }
}