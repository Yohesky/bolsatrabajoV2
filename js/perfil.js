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
					<img src="${resultado.fotoPerfil}" class="rounded-circle img-fluid m-auto border" style="width:20rem;">
				</div>
				<hgroup class="col-12 text-center">
					<h1>${resultado.nombre + ' ' + resultado.apellido}</h1>
					<h2 class="h3">${resultado.puestoDeseado}</h2>
					<h3 >${resultado.pais + '/' + resultado.ciudad}</h3>
				</hgroup>
			</section>

			<section id="infoPersonal" class="row bg-light rounded py-3 my-3">
				<div class="col-12 text-center">
					<h3>Información Personal y de Contacto</h3>
					<div class="row">

						${resultado.correo != '' ? `<div class="col-12 col-sm-6 my-3"><strong>Correo</strong><br> ${resultado.correo}</div>` : ''}

						${resultado.num1 != '' ? `<div class="col-12 col-sm-6 my-3"><strong>Telefono</strong><br> ${resultado.num1}</div>` : ''}

						${resultado.fechaNacimiento != '0000-00-00' ? `<div class="col-12 col-sm-6 my-3"><strong>Fecha de Nacimiento</strong></br> ${resultado.fechaNacimiento}</div>` : ''}

						${resultado.disponibilidadViajar != '' ? `<div class="col-12 col-sm-6 my-3"><strong>Disponibilidad de Viajar</strong><br> ${resultado.disponibilidadViajar}</div>` : ''}

						${resultado.curriculum != null ? `<div class="col-12 col-sm-6 my-3"><a href="${resultado.curriculum}" class="btn btn-primary" target="_blank">Curriculum PDF</a></div>` : ''}
						
					</div>

					${resultado.descripcion != null && resultado.descripcion != '' ? `<h3 class="mt-3">Descripción</h3><p class="text-justify mx-auto text-break">${resultado.descripcion}</p>`: ''}
				</div>
			</section>
			${resultado.habilidades.length > 0 ? ` 
			<section id="habilidades" class="row bg-light rounded py-3 my-4">
				<div class="col-12 text-center">
					<h3>Habilidades</h3>
						<div class="row">
							<div class="col-12">
								<ul>
								${resultado.habilidades.map((habilidad) => {
									return (`<li class="bg-primary rounded">${habilidad.nombreHabilidad} - ${habilidad.nivelHabilidad}</li>`);
								})}
								</ul>
							</div>
						</div>
				</div>
			</section>` : ''}
			${resultado.experiencias.length > 0 ? ` 
			<section id="habilidades" class="row bg-light rounded py-3 my-4">
				<div class="col-12 text-center">
					<h3>Experiencias</h3>
						<div class="row">
							<div class="col-12">
								<ul>
								${resultado.experiencias.map((experiencia) => {
									return (`<li class="bg-primary rounded">${experiencia.expLabor} en ${experiencia.expEmpresa} durante ${experiencia.yearExp} años</li>`);
								})}
								</ul>
							</div>
						</div>
				</div>
			</section>` : ''}
		`);
	}).fail(function(error){
		console.log(error);
	});
}