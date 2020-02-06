window.addEventListener('load', cargarDatos);

function cargarDatos(){
	$.ajax({
		url: './includes/perfilE.php' + location.search,
		method: 'GET',
		dataType: 'json'
	}).done(function(resultado){
		console.log(resultado);
		$('#infoEmpresa').html(`
			<section id="herderPerfil" class="row my-4 py-4 bg-light rounded">
				<div class="col-12 text-center"> 
					<img src="${resultado.imagenEmpresa}" class="rounded-circle img-fluid m-auto border" style="width:15rem;">
				</div>
				<hgroup class="col-12 text-center">
					<h1>${resultado.nombreEmpresa}</h1>
					<h2 class="h3">${resultado.areaEmpresa}</h2>
					<small>${resultado.rif}</small>
				</hgroup>

				<div class="col-12 text-justify mx-5 mt-3">
					${resultado.descripcionEmpresa}
				</div>
				
				<div class="d-block col-12 mt-5">
					<h3 class="text-center">Informacion de Contacto</h3>
					<div class="row">
						<div class="col-12 col-sm-6 text-center">
							<strong>Correo</strong></br>
							${resultado.correoEmpresa}
						</div>
						
						${resultado.webEmpresa != '' ? `<div class="col-12 col-sm-6 text-center">
						<strong>Web</strong></br>
						${resultado.correoEmpresa}` : ''}
					</div>
					</div>
				</div>
			</section>
		`);
	}).fail(function(error){
		console.log(error);
	})
}