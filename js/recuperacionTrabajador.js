
$(function () {
    obtenerDatos()

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
                    res.forEach(
                        console.log('response servidor',${res.idusuarios})
                    )
                    
                    
                    
                }
              });
   
       })
    }

    function pintar(){
        $.ajax({
            method: 'GET',
            url: "includes/recuperacionTrabajador.php",
            success: function (response) {
                let recuperacion = JSON.parse(response)
                let plantilla = ""
                recuperacion.forEach
                (
                    recuperacion => 
                    {
                        plantilla += 
                        `
                        <a href="recuperar.php?id=${recuperacion.idusuarios}" class="btn btn-success">Continuar</a>
                        `;
                    }
                )
                $("#result").html(plantilla)
                console.log(response);
                
            }
          });
    }

});

