<?php include_once('./includes/headerTrabajador.php'); ?>

<main class="container">
	<div class="row">
		<div class="col-12 col-md-4 my-3">
			<div class="form-group d-flex">
				<input type="search" name="buscar" id='input-buscar' placeholder="buscar" class="form-control">
				<button type="button" class="btn btn-primary" id="btn-buscar">Buscar</button>
			</div>
		</div>
		<div class="col-12">
			<div id="parametros" class="row"></div>
		</div>
	</div>
	
</main>

<?php include_once('./includes/footer.php'); ?>
<script src="./js/buscador.js"></script>