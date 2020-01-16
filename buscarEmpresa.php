<?php include("includes/headerTrabajador.php") ?>

<main class="container mx-auto">
	<div class="row">
		<section class="col-md-9">
			<div id="publicaciones" class="mt-4">

			</div>
		</section>

		<aside class="col-md-3 mt-4">
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

					<div id="areas" class="collapse show" data-parent="#filtroArea">
						<div class="card-body">
							
								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area1" name="chkArea" form="formularioBuscar" value="Administración">
 									<label class="custom-control-label" for="area1" value="Administración">Administración</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area2" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area2">Almacén</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area3" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area3">Atención al Cliente</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area4" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area4">Compras</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area5" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area5">Construcción</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area6" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area6">Contabilidad</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area7" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area7">Gerencia</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area8" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area8">Diseño</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area9" name="chkArea"  form="formularioBuscar" value="Ventas">
 									<label class="custom-control-label" for="area9">Enseñanza</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area10" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area10">Turismo</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area10" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area10">Informática</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area11" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area11">Ingeniería</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area12" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area12">Asesorias</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area13" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area13">Reparación</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area14" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area14">Publicidad</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area15" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area15">Recursos Humanos</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="area16" name="chkArea"  form="formularioBuscar">
 									<label class="custom-control-label" for="area16">Ventas</label>
								</div>


						</div>
					</div>
				</div>
			</div>

		</aside>
	</div>

</main>

<?php include("includes/footer.php") ?>
<script src="./js/buscarEmpresa.js"></script>
