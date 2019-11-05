<?php

include("conexion.php");



if(isset($_POST["idexp"]))
{
    
    $id = $_POST["idexp"];
    

   
    $query = "SELECT * FROM experiencia where idexp='$id'";

    $resultado = mysqli_query($conexion,$query);



    $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
    $json = array();
    while($row = mysqli_fetch_array($resultado))
{
    
    $json [] = array
    (
        "idexp" => $row["idexp"],
        "expEmpresa" => $row["expEmpresa"],
        "expPais" => $row["expPais"],
        "expSector" => $row["expSector"],
        "expArea" => $row["expArea"],
        "expLabor" => $row["expLabor"],
        "expFechaIni" => $row["expFechaIni"],
        "expFechaFin" => $row["expFechaFin"]
    );
}

$jsonString = json_encode($json[0]);

echo $jsonString;
}



?>