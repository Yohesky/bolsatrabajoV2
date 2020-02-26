<?php

include("conexion.php");

if(isset($_POST['nombre']) && isset($_POST['apellido']) &&
isset($_POST['email']) && isset($_POST['ci']) && isset($_POST['contrasena2']))
{
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $ci = mysqli_real_escape_string($conexion, $_POST['ci']);
    $contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);
    $contrasena2 = mysqli_real_escape_string($conexion, $_POST['contrasena2']);
    $preguntas = mysqli_real_escape_string($conexion, $_POST['preguntas']);
    $res1 = mysqli_real_escape_string($conexion, $_POST['res1']);
    $estado = mysqli_real_escape_string($conexion, $_POST['estado']);
    $ciudad = mysqli_real_escape_string($conexion, $_POST['ciudad']);
    $result = '';

    
    if($email)
        {
            $sql = "SELECT COUNT(*) as cantidad FROM usuarios WHERE correo='$email'";
            $res = mysqli_query($conexion, $sql);
            $data = mysqli_fetch_array($res);
            if($data["cantidad"] > 0)
            {
                $result .="<br>-El email de esta persona ya está registrado.";
            }
    }    

    if($result != '')
    {
        echo "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error</strong><br>$result</div>";

    }else{
        $sql = "INSERT INTO usuarios (nombre,apellido,correo,ci,contrasena, pregunta1, resp1, estado, ciudad) VALUES ('$nombre', '$apellido', '$email', '$ci', '$contrasena', '$preguntas', '$res1', '$estado', '$ciudad')";
        $bool = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
    
        if($bool){
            echo "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong><br>Se ha registrado correctamente.</div>";
        }
        
    }
}
else {
    echo mysqli_error($conexion);
}


?>