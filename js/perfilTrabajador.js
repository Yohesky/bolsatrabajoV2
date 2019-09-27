$(function()
{
 insertar();
 insertarExp();

  function insertar()
  {
    $("#btnDatos").click(function(e)
    {

        let form = $("#formularioTarea").serialize();
        
        console.log(form);
        if ($.trim(puesto).length > 0) {
            $.ajax({
                method: 'POST',
                url: 'includes/datosTrabajador.php',
                data: form,
                success: function(response)
                {
                    console.log(response);
                }
            });
        }

        e.preventDefault();
        $("#formularioTarea").trigger("reset");
    });
  }

  function insertarExp()
  {
    $("#guardar").click(function(e)
    {

        let form = $("#formularioExperiencia").serialize();
        
        console.log(form);
        if ($.trim(expEmpresa).length > 0 && $.trim(expPais).length > 0 && $.trim(expSector).length > 0 && 
        $.trim(expArea).length > 0 && $.trim(expLabor).length > 0 && $.trim(expFechaIni).length > 0 && $.trim(expFechaFin).length > 0) {
            $.ajax({
                method: 'POST',
                url: 'includes/insertarExp.php',
                data: form,
                success: function(response)
                {
                    console.log(response);
                }
            });
        }

        e.preventDefault();
        $("#formularioExperiencia").trigger("reset");
    });
  }
});