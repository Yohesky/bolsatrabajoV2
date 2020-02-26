
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

			<div class="accordion" id="filtroCategoria">
				<div class="card">
					<div class="card-header bg-dark" id="categoriaHeader">
						<h2 class="mb-0">
							<button class="btn btn-link text-light" type="button" data-toggle="collapse" data-target="#categorias">Categorias</button>
						</h2>
					</div>

					<div id="categorias" class="collapse" data-parent="#filtroCategoria">
						<div class="card-body text-break">
							
								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria1" name="chkCategoria" form="formularioBuscar" value="Administración/Oficinas">
 									<label class="custom-control-label" for="categoria1">Administración/Oficinas</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria2" name="chkCategoria"  form="formularioBuscar" value="Almacén/Logística/Trasporte">
 									<label class="custom-control-label" for="categoria2">Almacén/Logística/Trasporte</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria3" name="chkCategoria"  form="formularioBuscar" value="Atención al Cliente">
 									<label class="custom-control-label" for="categoria3">Atención al Cliente</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria4" name="chkCategoria"  form="formularioBuscar" value="Servicios generales, aseo y seguridad">
 									<label class="custom-control-label" for="categoria4">Servicios generales, aseo y seguridad</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria5" name="chkCategoria"  form="formularioBuscar" value="CallCenter/Telemercadeo">
 									<label class="custom-control-label" for="categoria5">CallCenter/Telemercadeo</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria6" name="chkCategoria"  form="formularioBuscar" value="Producción/Operarios">
 									<label class="custom-control-label" for="categoria6">Producción/Operarios</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria7" name="chkCategoria"  form="formularioBuscar" value="Manufactura">
 									<label class="custom-control-label" for="categoria7">Manufactura</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria8" name="chkCategoria"  form="formularioBuscar" value="Medicina/Saldud">
 									<label class="custom-control-label" for="categoria8">Medicina/Saldud</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria9" name="chkCategoria"  form="formularioBuscar" value="Comunicación"> 
 									<label class="custom-control-label" for="categoria9">Comunicación</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria10" name="chkCategoria"  form="formularioBuscar" value="Construcción y Obras">
 									<label class="custom-control-label" for="categoria10">Construcción y Obras</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria11" name="chkCategoria"  form="formularioBuscar" value="Contabilidad/Finanzas">
 									<label class="custom-control-label" for="categoria11">Contabilidad/Finanzas</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria12" name="chkCategoria"  form="formularioBuscar" value="Mercadotecnía/Publicidad">
 									<label class="custom-control-label" for="categoria12">Mercadotecnía/Publicidad</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria13" name="chkCategoria"  form="formularioBuscar" value="Diseño/Artes Gráficas">
 									<label class="custom-control-label" for="categoria13">Diseño/Artes Gráficas</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria14" name="chkCategoria"  form="formularioBuscar" value="Docencia">
 									<label class="custom-control-label" for="categoria14">Docencia</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria15" name="chkCategoria"  form="formularioBuscar" value="Compras/Comercio Exterior">
 									<label class="custom-control-label" for="categoria15">Compras/Comercio Exterior</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria16" name="chkCategoria"  form="formularioBuscar" value="Dirección/Gerencía">
 									<label class="custom-control-label" for="categoria16">Dirección/Gerencía</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria17" name="chkCategoria"  form="formularioBuscar" value="Técnicas">
 									<label class="custom-control-label" for="categoria17">Técnicas</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria18" name="chkCategoria"  form="formularioBuscar" value="Investigación y Calidad">
 									<label class="custom-control-label" for="categoria18">Investigación y Calidad</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria19" name="chkCategoria"  form="formularioBuscar" value="Hostelería/Turismo">
 									<label class="custom-control-label" for="categoria19">Hostelería/Turismo</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria20" name="chkCategoria"  form="formularioBuscar" value="Informática/Telecomunicaciones">
 									<label class="custom-control-label" for="categoria20">Informática/Telecomunicaciones</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria21" name="chkCategoria"  form="formularioBuscar" value="Ingeniería">
 									<label class="custom-control-label" for="categoria21">Ingeniería</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria22" name="chkCategoria"  form="formularioBuscar" value="Legal/Asesorias">
 									<label class="custom-control-label" for="categoria22">Legal/Asesorias</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria23" name="chkCategoria"  form="formularioBuscar" value="Mantenimiento y Reparaciones">
 									<label class="custom-control-label" for="categoria23">Mantenimiento y Reparaciones</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria24" name="chkCategoria"  form="formularioBuscar" value="Recursos Humanos">
 									<label class="custom-control-label" for="categoria24">Recursos Humanos</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria25" name="chkCategoria"  form="formularioBuscar" value="Ventas">
 									<label class="custom-control-label" for="categoria25">Ventas</label>
								</div>


						</div>
					</div>
				</div>
			</div>

			<div class="accordion" id="filtroSueldo">
				<div class="card">
					<div class="card-header bg-dark" id="SueldoHeader">
						<h2 class="mb-0">
							<button class="btn btn-link text-light" type="button" data-toggle="collapse" data-target="#Sueldo">Sueldo</button>
						</h2>
					</div>

					<div id="Sueldo" class="collapse" data-parent="#filtroSueldo">
						<div class="card-body">
							
							<div class="custom-control custom-checkbox">
  								<input type="checkbox" class="custom-control-input" id="sueldo1" name="chkSueldo" form="formularioBuscar" value="1">
 								<label class="custom-control-label" for="sueldo1">0 - 50$</label>
							</div>

							<div class="custom-control custom-checkbox">
  								<input type="checkbox" class="custom-control-input" id="sueldo2" name="chkSueldo" form="formularioBuscar" value="2">
 								<label class="custom-control-label" for="sueldo2">50$ - 100$</label>
							</div>

							<div class="custom-control custom-checkbox">
  								<input type="checkbox" class="custom-control-input" id="sueldo3" name=chkSueldo form="formularioBuscar" value="3">
 								<label class="custom-control-label" for="sueldo3">> 100$</label>
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="accordion" id="filtroUbicacion">
				<div class="card">
					<div class="card-header bg-dark" id="ubicacionHeader">
						<h2 class="mb-0">
							<button class="btn btn-link text-light" type="button" data-toggle="collapse" data-target="#ubicacion">Ubicación</button>
						</h2>
					</div>

					<div id="ubicacion" class="collapse" data-parent="#filtroUbicacion">
						<div class="card-body">
							<form id="">
						
							<?php 
							include_once('includes/conexion.php');
							$query = "SELECT DISTINCT estado FROM propuesta";
							$tabla = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

							$contador = 1;
							while($row = mysqli_fetch_array($tabla)){?>
							<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="ubicacion<?php echo $contador; ?>" name="chkUbicacion" form="formularioBuscar" value="<?php echo $row["estado"]; ?>">
 									<label class="custom-control-label" for="ubicacion<?php echo $contador; ?>" ><?php echo $row["estado"]; ?></label>
								</div>

							<?php 
							$contador++;
							} ?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</aside>
	</div>

</main>

<div id="paginacion"></div>
<?php include("includes/footer.php") ?>
<script src="./js/buscadores/mostrar.js"></script>
<!--<script src="js/busqueda.js"></script>-->
<script src="js/direcciones.js"></script>

