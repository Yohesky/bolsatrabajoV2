<?php
include("conexion.php");

if(isset($_POST["correo"])){
    $correo = $_POST["correo"];
    $query = "SELECT correoEmpresa, preguntaSeguridad, respuestaSeguridad, idempresa FROM empresa where correoEmpresa = '$correo'";
    $rsquery = mysqli_query($conexion, $query);

    $json = array();
    while($row = mysqli_fetch_array($rsquery)){
        $json[] = array
        (
            "correoEmpresa" =>  $row ["correoEmpresa"],
            "preguntaSeguridad" => $row ["preguntaSeguridad"],
            "respuestaSeguridad" => $row ["respuestaSeguridad"],
            "idempresa" => $row ["idempresa"]
            
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}



?>