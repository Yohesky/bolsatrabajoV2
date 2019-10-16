$(function () {
    actualizar();

  
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
  
  
  
  
  });