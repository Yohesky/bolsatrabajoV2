$(function () {
    actualizar();
    obtenerFotoPerfil();
    actualizarDescripcion()
  
    function actualizar() {
      $("#btnDatos").click(function (e) {
  
        let form = $("#formularioActualizacion").serialize();
        console.log(form)
        if ($.trim(nombreEmpresa).length > 0) {
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
                  }
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
    $("#btnDescripcion").click(function(e)
    {
      let form = $("#formularioDescripcionEmpresa").serialize();
      console.log(form);
      if($.trim(descripcion).length > 0 )
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
              }
            }   
          }
        )
      }
      e.preventDefault();
      
    }
    )
  }