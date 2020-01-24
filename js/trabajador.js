$(function()
{
    $("#registro").click(function(e)
    {

        let form = $("#formulario").serialize();
        
        console.log(form);
        if ($.trim(nombre).length > 0 && $.trim(apellido).length > 0 && $.trim(email).length > 0 && $.trim(contrasena).length > 0 &&
        $.trim(contrasena2).length > 0 && $.trim(preguntas).length > 0 && $.trim(res1).length > 0 ) {
            $.ajax({
                method: 'POST',
                url: 'includes/registrarTrabajador.php',
                data: form,
                success: function(response)
                {
                    $("#resultado").html(response);
                }
            });
        }

        e.preventDefault();
        $("#formulario").trigger("reset");
    });
});