<?php
include("conexion.php");

if(isset($_POST["correo"])){
    $correo = $_POST["correo"];
    $query = "SELECT correo, pregunta1, resp1, idusuarios FROM usuarios where correo = '$correo'";
    $rsquery = mysqli_query($conexion, $query);

    $json = array();
    while($row = mysqli_fetch_array($rsquery)){
        $json[] = array
        (
            "correo" =>  $row ["correo"],
            "pregunta1" => $row ["pregunta1"],
            "resp1" => $row ["resp1"],
            "idusuarios" => $row ["idusuarios"]
            
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
}



?>