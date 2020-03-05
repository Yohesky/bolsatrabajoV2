<?php

include("conexion.php");

if(isset($_POST['nombre']) && isset($_POST['descripcion']) &&
isset($_POST['rif']) && isset($_POST['direccion']) && isset($_POST['correo']) && isset($_POST['sector']) &&
isset($_POST['pagina']) && isset($_POST['contrasena2']) && isset($_POST['estado']) && isset($_POST['pais']))
{
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $rif = mysqli_real_escape_string($conexion, $_POST['rif']);
    $direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $sector = mysqli_real_escape_string($conexion, $_POST['sector']);
    $pagina = mysqli_real_escape_string($conexion, $_POST['pagina']);
    $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);
    $contrasena2 = mysqli_real_escape_string($conexion, $_POST['contrasena2']);
    $preguntaSeguridad = mysqli_real_escape_string($conexion, $_POST['preguntas']);
    $respuestaSeguridad = mysqli_real_escape_string($conexion, $_POST['respuesta']);
    $estado = mysqli_real_escape_string($conexion, $_POST['estado']);
    $pais = mysqli_real_escape_string($conexion, $_POST['pais']);
    $result = '';

    if(strlen($contrasena) > 30)
    {
        $result .="<br>-La contraseña supera los 30 caracteres.";
    }
    
    if($contrasena != $contrasena2)
    {
        $result .="<br>-Las contraseñas no coinciden.";
    }

    if(strlen($correo) > 40)
    {
        $result .="<br>-El email supera los 40 caracteres.";
    }
    else
    {
        if($correo)
        {
            $sql = "SELECT COUNT(*) as cantidad FROM empresa WHERE correoEmpresa='$correo'";
            $res = mysqli_query($conexion, $sql);
            $data = mysqli_fetch_array($res);
            if($data["cantidad"] > 0)
            {
                $result .="<br>-El email de esta empresa ya está registrado.";
            }
        }
    }

    if($result != '')
    {
        echo "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error</strong><br>$result</div>";

    }

    else{
        $sql = "INSERT INTO empresa (nombreEmpresa,descripcionEmpresa,rif, direccionEmpresa, areaEmpresa, correoEmpresa, webEmpresa, contrasenaEmpresa, preguntaSeguridad, respuestaSeguridad, idpais, idestado) 
        VALUES('$nombre', '$descripcion', '$rif', '$direccion', '$sector', '$correo', '$pagina', '$contrasena', '$preguntaSeguridad', '$respuestaSeguridad', '$pais', '$estado')";
        mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
        echo "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong><br>Se ha registrado correctamente.</div>";
        
    }
}
else {
    echo 'faltan datos';
}


?>