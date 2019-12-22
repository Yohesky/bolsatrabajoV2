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
						<div class="form-group d-flex">
							<input type="search" name="buscar" class="form-control" id="buscar">
							<button type="submit" class="btn btn-primary">Buscar</button>
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

					<div id="categorias" class="collapse show" data-parent="#filtroCategoria">
						<div class="card-body">
							
								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria1" name="chkCategoria" form="formularioBuscar" value="Administración">
 									<label class="custom-control-label" for="categoria1">Administración</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria2" name="chkCategoria"  form="formularioBuscar">
 									<label class="custom-control-label" for="categoria2">Almacén</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria3" name="chkCategoria"  form="formularioBuscar">
 									<label class="custom-control-label" for="categoria3">Atención al Cliente</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="categoria4" name="chkCategoria"  form="formularioBuscar">
 									<label class="custom-control-label" for="categoria4">Compras</label>
								</div>

								<div class="custom-control custom-checkbox">
  								<input type="checkbox" class="custom-control-input" id="categoria5" name="chkCategoria"  form="formularioBuscar">
 								<label class="custom-control-label" for="categoria5">Construcción</label>
							</div>


						</div>
					</div>
				</div>
			</div>

			<div class="accordion" id="filtroSalario">
				<div class="card">
					<div class="card-header bg-dark" id="salarioHeader">
						<h2 class="mb-0">
							<button class="btn btn-link text-light" type="button" data-toggle="collapse" data-target="#salario">Salario</button>
						</h2>
					</div>

					<div id="salario" class="collapse show" data-parent="#filtroSalario">
						<div class="card-body">
							<form id="">
								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="salario1" name="chkSalario" form="formularioBuscar" value="1">
 									<label class="custom-control-label" for="salario1">0 - 50$</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="salario2" name="chkSalario" form="formularioBuscar" value="2">
 									<label class="custom-control-label" for="salario2">50$ - 100$</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="salario3" name=chkSalario form="formularioBuscar" value="3">
 									<label class="custom-control-label" for="salario3">> 100$</label>
								</div>

							</form>
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

					<div id="ubicacion" class="collapse show" data-parent="#filtroUbicacion">
						<div class="card-body">
							<form id="">
								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="ubicacion1" name="chkUbicacion">
 									<label class="custom-control-label" for="ubicacion1">Maracaibo</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="ubicacion2" name="chkUbicacion">
 									<label class="custom-control-label" for="ubicacion2">Caracas</label>
								</div>

								<div class="custom-control custom-checkbox">
  									<input type="checkbox" class="custom-control-input" id="ubicacion3" name="chkUbicacion">
 									<label class="custom-control-label" for="ubicacion3">Maracay</label>
								</div>

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
<script src="js/mostrar.js"></script>
<!--<script src="js/busqueda.js"></script>-->

