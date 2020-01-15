<html>
    <input type="text">
</html>
<?php


$cedula = "112.111";

if(preg_match_all("/(\W\d*[0-9]{2})/", $cedula, $resultado)){

   print_r($resultado);
} else {

    echo "No hubo resultado";
}

?>