window.addEventListener('load', cargarDatos);

function cargarDatos(){
	$.ajax({
		url: './includes/perfil.php' + location.search,
		method: 'GET',
		dataType: 'json'
	}).done(function(resultado){
		console.log(resultado);
		$('#infoTrabajador').html(`
			<section id="herderPerfil" class="row my-4 py-4 bg-light rounded">
				<div class="col-12 text-center"> 
					<img src="${resultado.fotoPerfil}" class="rounded-circle img-fluid m-auto" style="width:20rem;">
				</div>
				<hgroup class="col-12 text-center">
					<h1>${resultado.nombre + ' ' + resultado.apellido}</h1>
					<h2 class="h3">${resultado.puestoDeseado}</h2>
					<h3 >${resultado.pais + '/' + resultado.ciudad}</h3>
				</hgroup>
			</section>

			<section id="infoPersonal" class="row bg-light rounded py-3">
				<div class="col-12 text-center">
					<h3>Información Personal y de Contacto</h3>
					<div class="row">
						${resultado.correo != '' ? `<div class="col-6">Corre: ${resultado.correo}</div>` : ''}
						${resultado.num1 != '' ? `<div class="col-6">Telefono: ${resultado.num1}</div>` : ''}
						${resultado.fechaNacimiento != '0000-00-00' ? `<div class="col-6">Fecha de Nacimiento: ${resultado.fechaNacimiento}</div>` : ''}
						${resultado.disponibilidadViajar != '' ? `<div class="col-6">Disponibilidad de Viajar: ${resultado.disponibilidadViajar}</div>` : ''}
						
					</div>

					${resultado.descripcion != null && resultado.descripcion != '' ? `<h4>Descripción</h4><p>${resultado.descripcion}</p>`: ''}
				</div>
			</section>
			${resultado.habilidades.length > 0 ? ` 
			<section id="habilidades" class="row bg-light rounded py-3">
				<div class="col-12 text-center">
					<h3>Habilidades</h3>
						<div class="row">
							<div class="col-6">
								
							</div>
						</div>
				</div>
			</section>` : ''}
		`);
	}).fail(function(error){
		console.log(error);
	})
}