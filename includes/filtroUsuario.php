
<?php

//se incluye la conexion
include("conexion.php");


//le enviamos "busqueda" desde DATA y almacenamos con $busqueda el valor desde el lado del servidor
$titulo = $_POST["titulo"];
$sueldo = $_POST["sueldo"];

//si el valor de busqueda NO esta vacio se hace una consulta
if(!empty($titulo) && !empty($sueldo))
{
    //consulta a la base de datos
    //selecciona todos los datos de la tabla llamada TAREAS
    //donde el nombre de la tarea coincida con la variable llamada BUSQUEDA
    $query = "SELECT * FROM propuesta WHERE titulo LIKE '$titulo%' AND sueldo LIKE '$sueldo%' ";
    $result = mysqli_query($conexion, $query);

    //si no tengo respuesta de la BD
    if(!$result)
    {   
        //termina el proceso
        die("Error de Consulta". mysqli_error($conexion));
    }


    $json = array();
    while($row = mysqli_fetch_array($result))
    {
        //array asociativo
        $json[] = array
        (
            "titulo" =>  $row ["titulo"],
            "sueldo" => $row ["sueldo"],
            "idpropuesta" => $row ["idpropuesta"]
        );
    }

    $jsonString = json_encode($json);
    echo $jsonString;
}


?>