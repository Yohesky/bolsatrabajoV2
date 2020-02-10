<?php include("includes/headerTrabajador.php") ?>

<?php
			include('includes/conexion.php');
	
				$idpropuesta = $_GET['id'];
				$idempresa = $_GET['idempresa'];
        $idusuario = $_SESSION['idusuarios'];

				$query = "SELECT * FROM propuesta  JOIN empresa ON propuesta.empresa_idempresa = empresa.idempresa WHERE idpropuesta='$idpropuesta' AND empresa_idempresa='$idempresa'" ;


				$rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
				$propuesta = mysqli_fetch_array($rsQuery); 
?>

<div class="row container  mx-auto mt-5">

<div class="col-md-12">
<div class="card text-center">
  <div class="card-header">
    <?php echo $propuesta['titulo']; ?>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $propuesta['descripcion']; ?></h5>
    <p class="card-text"><?php echo $propuesta['funciones']; ?></p>
    <p class="card-text"><?php echo $propuesta['sueldo']; ?></p>
    <p class="card-text"><?php echo $propuesta['vacantes']; ?></p>
    <p class="card-text"><?php echo $propuesta['nombreEmpresa']; ?></p>
    <button id="postular"class="btn btn-success">Postularme</button>

    <hr>
    <a class="btn btn-info" id="boton" href="estadistica.php?idpropuesta=<?php echo $idpropuesta; ?>&&idusuario=<?php echo $idusuario; ?>">Ver mis estadisticas</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>

  <div class="card-footer text-muted">
  <a href="descripcionEmpresa.php?idempresa=<?php echo $idempresa; ?>">Ver información de la empresa</a>
  </div>
</div>
</div>

</div>


<?php include("includes/footer.php") ?>
<script src="js/postulacion.js"></script>
<script src="js/direcciones.js"></script>



