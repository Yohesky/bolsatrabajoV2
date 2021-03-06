
$(function () {
    obtenerDatos()
    recuperacion()
    actualizando()

    function obtenerDatos(){
        $("#formulario").submit((e) => {
            var correo = $("#correo").val()
            const data = {
                correo
            }
            console.log(correo);
            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: "includes/recuperacionTrabajador.php",
                data: data,
                success: function (response) {
                    let res = JSON.parse(response)
                    let plantilla = ""

                    plantilla += `<a class="btn btn-info" href="recuperar.php?idusuarios=${res[0].idusuarios}&&correo=${res[0].correo}"> Continuar </a>`;
                    $("#result").html(plantilla)
                }
              });
   
       })
    }

    function recuperacion(){
        $("#formRecuperar").submit((e) => {
            var respuesta = $("#respuesta").val()
            var iduser = $("#iduser").val()
            const data = {
                respuesta,
                iduser

            }
            console.log(respuesta);
            e.preventDefault()

            $.ajax({
                method: 'POST',
                url: "includes/recuperarandoClave.php",
                data: data,
                success: function (response) {
                    if(response === "exito"){
                    let plantilla = ""
                    
                    plantilla += `<div class="card card-body mt-1" data-toggle="modal">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Actualizar
                    </button>
    
    
                    
                </div>`;
                 
                    $("#enviar").replaceWith(plantilla)
                        
                    }
                }
              });
   
       })
    }


    function actualizando(){
        $("#guardar").click( (e) => {
            var nContrasena = $("#nContrasena").val()
            var idusuario = $("#idusuario").val()
            console.log(nContrasena);
            
             const data = {
                 nContrasena,
                 idusuario
             }

             console.log('objeto data',data);
             $.ajax({
                method: 'POST',
                url: "includes/actClave.php",
                data: data,
                success: function (response) {
                    if (response === 'exito') {
                        swal({
                          title: "Contraseña Actualizada",
                          text: "Su contraseña se ha modificado correctamente",
                          icon: "success",
                          button: "Continuar",
                        });
                      }
                
                      $(location).attr('href','loginTrabajador.php');
                }
              });
            

            e.preventDefault()
        })
    }

});

