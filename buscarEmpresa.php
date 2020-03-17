<?php include("includes/headerTrabajador.php") ?>

<main class="container mx-auto">
	<div class="row">
		<section class="col-12 col-md-9 order-1 order-md-0">
			<div id="publicaciones" class="mt-4">

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

			<div class="accordion" id="filtroArea">
				<div class="card">
					<div class="card-header bg-dark" id="areaHeader">
						<h2 class="mb-0">
							<button class="btn btn-link text-light" type="button" data-toggle="collapse" data-target="#areas">Areas</button>
						</h2>
					</div>

					<div id="areas" class="collapse" data-parent="#filtroArea">
						<div class="card-body">
						

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area2" name="chkArea" form="formularioBuscar" value="Administración/Oficinas">
 									<label class="custom-control-label" for="area2">Administración/Oficinas</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area3" name="chkArea"  form="formularioBuscar" value="Almacén/Logística/Trasporte">
 									<label class="custom-control-label" for="area3">Almacén/Logística/Trasporte</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area4" name="chkArea"  form="formularioBuscar" value="Atención al Cliente">
 									<label class="custom-control-label" for="area4">Atención al Cliente</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area5" name="chkArea"  form="formularioBuscar" value="Servicios generales, aseo y seguridad">
 									<label class="custom-control-label" for="area5">Servicios generales, aseo y seguridad</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area6" name="chkArea"  form="formularioBuscar" value="CallCenter/Telemercadeo">
 									<label class="custom-control-label" for="area6">CallCenter/Telemercadeo</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area7" name="chkArea"  form="formularioBuscar" value="Producción/Operarios">
 									<label class="custom-control-label" for="area7">Producción/Operarios</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area8" name="chkArea"  form="formularioBuscar" value="Manufactura">
 									<label class="custom-control-label" for="area8">Manufactura</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area9" name="chkArea"  form="formularioBuscar" value="Medicina/Saldud">
 									<label class="custom-control-label" for="area9">Medicina/Saldud</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area10" name="chkArea"  form="formularioBuscar" value="Comunicación"> 
 									<label class="custom-control-label" for="area10">Comunicación</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area11" name="chkArea"  form="formularioBuscar" value="Construcción y Obras">
 									<label class="custom-control-label" for="area11">Construcción y Obras</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area12" name="chkArea"  form="formularioBuscar" value="Contabilidad/Finanzas">
 									<label class="custom-control-label" for="area12">Contabilidad/Finanzas</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area13" name="chkArea"  form="formularioBuscar" value="Mercadotecnía/Publicidad">
 									<label class="custom-control-label" for="area13">Mercadotecnía/Publicidad</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area14" name="chkArea"  form="formularioBuscar" value="Diseño/Artes Gráficas">
 									<label class="custom-control-label" for="area14">Diseño/Artes Gráficas</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area15" name="chkArea"  form="formularioBuscar" value="Docencia">
 									<label class="custom-control-label" for="area15">Docencia</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area16" name="chkArea"  form="formularioBuscar" value="Compras/Comercio Exterior">
 									<label class="custom-control-label" for="area16">Compras/Comercio Exterior</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area17" name="chkArea"  form="formularioBuscar" value="Dirección/Gerencía">
 									<label class="custom-control-label" for="area17">Dirección/Gerencía</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area18" name="chkArea"  form="formularioBuscar" value="Técnicas">
 									<label class="custom-control-label" for="area18">Técnicas</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area19" name="chkArea"  form="formularioBuscar" value="Investigación y Calidad">
 									<label class="custom-control-label" for="area19">Investigación y Calidad</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area20" name="chkArea"  form="formularioBuscar" value="Hostelería/Turismo">
 									<label class="custom-control-label" for="area20">Hostelería/Turismo</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area21" name="chkArea"  form="formularioBuscar" value="Informática/Telecomunicaciones">
 									<label class="custom-control-label" for="area21">Informática/Telecomunicaciones</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area22" name="chkArea"  form="formularioBuscar" value="Ingeniería">
 									<label class="custom-control-label" for="area22">Ingeniería</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area23" name="chkArea"  form="formularioBuscar" value="Legal/Asesorias">
 									<label class="custom-control-label" for="area23">Legal/Asesorias</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area24" name="chkArea"  form="formularioBuscar" value="Mantenimiento y Reparaciones">
 									<label class="custom-control-label" for="area24">Mantenimiento y Reparaciones</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area25" name="chkArea"  form="formularioBuscar" value="Recursos Humanos">
 									<label class="custom-control-label" for="area25">Recursos Humanos</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area26" name="chkArea"  form="formularioBuscar" value="Ventas">
 									<label class="custom-control-label" for="area26">Ventas</label>
								</div>



						</div>
					</div>
				</div>
			</div>

			<div class="accordion" id="filtroPais">
				<div class="card">
					<div class="card-header bg-dark" id="areaHeader">
						<h2 class="mb-0">
							<button class="btn btn-link text-light" type="button" data-toggle="collapse" data-target="#pais">Paises</button>
						</h2>
					</div>

					<div id=pais class="collapse" data-parent="#filtroArea">
						<div class="card-body" style="max-height: 50rem; overflow-y:auto;"> 

						<?php
							include_once("./includes/conexion.php");

							$query = "SELECT DISTINCT paisnombre FROM empresa inner join pais on empresa.idpais = pais.id GROUP BY paisnombre ASC";
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

		</aside>
	</div>

</main>

<?php include("includes/footer.php") ?>
<script src="./js/buscadores/buscarEmpresa.js"></script>
