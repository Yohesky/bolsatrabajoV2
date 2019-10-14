$(function () {
  actualizar();
  insertarExp();
  mostrarExp();


  function actualizar() {
    $("#btnDatos").click(function (e) {

      let form = new FormData(document.getElementById("formularioTarea"));
      form.append('dato', 'valor');
      console.log(form)
      if ($.trim(nombre).length > 0) {
        $.ajax({
          type: 'POST',
          url: 'includes/datosTrabajador.php',
          dataType: 'html',
          data: form,
          cache: false,
          contentType: false,
          processData: false,
          success: function (response) {
            if (response === 'exito') {
              swal({
                title: "Datos actualizados",
                text: "Sus datos han sido actualizados",
                icon: "success",
                button: "Continuar",
              });
            }else{
              console.log(response);
            }
          }
        });
      }



    });
  }

  function insertarExp() {
    $("#guardar").click(function (e) {

      let form = $("#formularioExperiencia").serialize();

      console.log(form);
      if ($.trim(expEmpresa).length > 0 && $.trim(expPais).length > 0 && $.trim(expSector).length > 0 &&
        $.trim(expArea).length > 0 && $.trim(expLabor).length > 0 && $.trim(expFechaIni).length > 0 && $.trim(expFechaFin).length > 0) {
        $.ajax({
          method: 'POST',
          url: 'includes/insertarExp.php',
          data: form,
          success: function (response) {
            mostrarExp();
          }
        });
      }

      e.preventDefault();
      $("#formularioExperiencia").trigger("reset");
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
                </div>
              </div>
                
                    `;
              }
            )
          $("#experiencia").html(plantilla);
        }
      });
  }



});