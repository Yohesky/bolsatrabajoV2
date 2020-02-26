$(function () {
    actualizar();
    obtenerFotoPerfil();
    actualizarDescripcion()
    seleccion();
    mostrarPostuladosSeleccionados();
  
    function actualizar() {
      $("#formularioActualizacion").submit(function (e) {
      
      e.preventDefault();

        const formulario = document.getElementById('formularioActualizacion');
        
        if (formulario.checkValidity()) {

          let form = $("#formularioActualizacion").serialize();console.log(form);
          $.ajax({
            type: 'POST',
            url: 'includes/actDatosEmpresa.php',
            data: form,
            success: function (response) {
                if (response === 'exito') {
                    swal({
                      title: "Datos actualizados",
                      text: "Sus datos han sido actualizados",
                      icon: "success",
                      button: "Continuar",
                    });
                    $('#nomG').text($('#nombreEmpresa').val());
                  }else{
                    console.log(response);
                  }                },
            error: function(error){
              console.log(error);
            }
          });
        }
  
  
  
      });
    }
  
  
  agregarFotoPerfil();
  
  });

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
            <input type="file" name="imagenEmpresa" accept=".jpg, .png">
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
      url: './includes/fotoPerfil.php?obtenerImagenEmpresa=true'});
  
    ajax.done(function(resultado){
      console.log(resultado);
      $('#fotoPerfil').attr({'src':resultado, height: '144px', width: '144px'});
    })
    ajax.fail(function(error){
      alert(error);
    })
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

  function actualizarDescripcion()
  {
    $("#formularioDescripcionEmpresa").submit(function(e)
    {
      let form = $("#formularioDescripcionEmpresa").serialize();
      console.log(form);
      e.preventDefault();
      if($.trim(descripcion.value).length > 0 )
      {
        $.ajax(
          {
            url: 'includes/actualizarDescripcionEmpresa.php',
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
              }else{
                alert('Error');
              }
            }   
          }
        )
      }
      e.preventDefault();
      
    }
    )
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

function mostrarPostuladosSeleccionados(){
    $.ajax({
      method: 'GET',
      dataType: 'json',
      url: 'includes/mostrarSeleccionados.php'
    }).done(function(respuesta){
      $(empleadosSeleccionados).html(
        respuesta.map((valor) =>{
          return `<li class="bg-white p-3 d-block mt-1 rounded"><div class="row">
          <div class="col-6 text-break">
          ${valor.nombre} ${valor.apellido}
          </div>
          <div class="col-2">
            <a class="btn btn-primary" href="perfil.php?id=${valor.idusuarios}">Ver</a>
          </div>
          <div class="col-3">
            <button class="btn btn-danger" type="button" onclick="eleminarSeleccion(${valor.idseleccion})">Eliminar</button>
          </div>
          </div>
          </li>`
        })
      );

      console.log(respuesta);
    }).fail(function(error){
      alert('hay problemas');
      console.log(error);
    });
}

function eleminarSeleccion(idseleccion){
  event.preventDefault();
  let notificacion = event.target.parentNode.parentNode.parentNode;

  $.ajax({
    method: 'GET',
    url: 'includes/eliminarSeleccion.php?idseleccion='+idseleccion,
  }).done((respuesta) =>{
    notificacion.remove();
    console.log(respuesta);
  }).fail((respuesta) =>{
    alert('error');
    console.log(respuesta);
  })
}