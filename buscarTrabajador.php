
<?php 
session_start();
if(isset($_SESSION["idusuarios"])){
	include("includes/headerTrabajador.php");
}else{
	include("includes/headerEmpresa.php");
}
 ?>

<main class="container mx-auto">
	<div class="row">
		<section class="col-12 col-md-9 order-1 order-md-0">
			<div id="trabajadores" class="mt-4">

			</div>
		</section>

		<aside class="col-12 col-md-3 mt-4">
			<div class="card">
				<div class="card-header bg-dark">
					<h3>Buscar</h3>
				</div>
				<div class="card-body">
					<form id="formularioBuscar">
						<div class="form-group row">
							<input type="search" name="buscar" class="form-control col-8" id="buscar" placeholder="buscar">
							<button type="button" class="btn btn-primary col-4" id="iniciarBusqueda">Buscar</button>
						</div>
					</form>
				</div>
			</div>

			<div class="accordion" id="filtroPais">
				<div class="card">
					<div class="card-header bg-dark" id="paisHeader">
						<h2 class="mb-0">
							<button class="btn btn-link text-light" type="button" data-toggle="collapse" data-target="#pais">Pais</button>
						</h2>
					</div>

					<div id="pais" class="collapse" data-parent="#filtroPais">
						<div class="card-body" style="max-height: 50rem; overflow-y:auto;">

						<?php
							include_once("./includes/conexion.php");

							$query = "SELECT DISTINCT paisnombre FROM usuarios inner join pais on usuarios.idpais = pais.id GROUP BY paisnombre ASC";
							$tabla = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

							$contador = 1;
							while($row = mysqli_fetch_array($tabla)){?>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="pais<?php echo $contador; ?>" name="chkPais" form="formularioBuscar" value="<?php echo $row["paisnombre"]; ?>">
 									<label class="custom-control-label" for="pais<?php echo $contador; ?>" value="<?php echo $row["paisnombre"]; ?>"><?php echo $row["paisnombre"]; ?></label>
								</div>

						<?php
						$contador++;	
						}?>

						</div>
					</div>
				</div>
			</div>

			<div class="accordion" id="filtroEducacion">
				<div class="card">
					<div class="card-header bg-dark" id="educacionHeader">
						<h2 class="mb-0">
							<button class="btn btn-link text-light" type="button" data-toggle="collapse" data-target="#educacion">Nivel de Educación</button>
						</h2>
					</div>



					<div id="educacion" class="collapse" data-parent="#filtroEducacion">
						<div class="card-body">
							
						<?php

							$educacion = ["Universitario", "bachiller", "Tecnico Medio", "Tecnico Superior Universitario"];

							$tamaño = count($educacion);
							for ($i=0; $i < $tamaño; $i++) {?>

								<div class="custom-control custom-checkbox">
		  							<input type="checkbox" class="custom-control-input" id="educacion<?php echo $i; ?>" name="chkEducacion" form="formularioBuscar" value="<?php echo $educacion[$i]; ?>">
		 							<label class="custom-control-label" for="educacion<?php echo $i; ?>" value="<?php echo $educacion[$i]; ?>"><?php echo $educacion[$i]; ?></label>
								</div>

						<?php	}?>
						</div>
					</div>
				</div>
			</div>

		</aside>
	</div>

</main>

<?php include("includes/footer.php") ?>
<script src="./js/buscadores/buscarTrabajador.js"></script>
