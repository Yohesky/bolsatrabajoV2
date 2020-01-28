<?php

include("conexion.php");



if(isset($_POST["id"]))
{
    
    $id = $_POST["id"];
    

   
    $query = "SELECT * FROM propuesta where idpropuesta='$id'";

    $resultado = mysqli_query($conexion,$query);



    $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
    $json = array();
while($row = mysqli_fetch_array($resultado))
{
    
    $json [] = array
    (
        "id" => $row["idpropuesta"],
        "titulo" => $row["titulo"],
        "descripcion" => $row["descripcion"],
        "funciones" => $row["funciones"],
        "vacantes" => $row["vacantes"],
        "sueldo" => $row["sueldo"],
        "localizacion" => $row["localizacion"],
        "categoria" => $row["categoria"],
        "viajes" => $row["viajes"],
        "vehiculo" => $row["vehiculo"],
        "educacion" => $row["educacion"],
        "aExp" => $row["aExp"]
    );
}

$jsonString = json_encode($json[0]);

echo $jsonString;
}

?>