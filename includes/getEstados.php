
<?php
	include('conexion.php');
	
	if(isset($_POST["idpais"])){
    $idpais = $_POST["idpais"];
    echo $idpais;
     $query = "SELECT * FROM estado WHERE ubicacionpaisid = '$idpais'";
	 $resultado = mysqli_query($conexion,$query) or die(mysqli_error($conexion).$query);
  
	 while($row = mysqli_fetch_array($resultado))
	 {
	 	 echo "<option value='".$row['idestado']."'>".$row['estadonombre']."</option>";
	 }
	

    }
    else{
        echo "no recibo nada";
    }
	
	
?>
