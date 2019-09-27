$(function()
{
    $("#registro").click(function(e)
    {

        let form = $("#formulario").serialize();
        
        console.log(form);
        if ($.trim(nombre).length > 0 && $.trim(descripcion).length > 0 && $.trim(rif).length > 0 && $.trim(direccion).length > 0 &&
        $.trim(sector).length > 0 && $.trim(contrasena).length > 0 && $.trim(contrasena2).length > 0) {
            $.ajax({
                method: 'POST',
                url: 'includes/registrarEmpresa.php',
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