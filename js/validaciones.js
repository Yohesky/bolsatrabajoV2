	(function() {
		'use strict';
		window.addEventListener('load', function() {
		  // Fetch all the forms we want to apply custom Bootstrap validation styles to
		  var forms = document.getElementsByClassName('needs-validation');
		  // Loop over them and prevent submission
		  var validation = Array.prototype.filter.call(forms, function(form) {
			form.addEventListener('submit', function(event) {
			  if (form.checkValidity() === false) {
				event.preventDefault();
				event.stopPropagation();
			  }
			  form.classList.add('was-validated');
			}, false);
		  });
		}, false);
	  })();
$(function(){

	$('#nombre').prop({'pattern': '[a-z áéíóúñÑA-Z]+', 'required': true
	}).parent().append('<div class="invalid-feedback text-left">Es necesario un nombre (solo letras)</div>');

	$('#nombreEmpresa').prop({'pattern': '[a-z áéíóúñÑA-Z0-9]+', 'required': true
	}).parent().append('<div class="invalid-feedback text-left">Es necesario un nombre (solo letras o números)</div>');

	$('#funciones').prop({'pattern': '[a-z áéíóúñÑA-Z0-9]+', 'required': true
	}).parent().append('<div class="invalid-feedback text-left">Las funciones que se desempeñara (solo letras o números)</div>');

	$('#vacantes').prop({'pattern': '[0-9]+', 'required': true
	}).parent().append('<div class="invalid-feedback text-left">Solo numeros (Menor a 1000)</div>');

	$('#aExp').prop({'pattern': '[0-9]+', 'required': true
}).parent().append('<div class="invalid-feedback text-left">Solo numeros (Menor a 100)</div>');

	$('#sueldo').prop({'pattern': '[0-9]+', 'required': true
}).parent().append('<div class="invalid-feedback text-left">Solo numeros</div>');

	$('#apellido').prop({'pattern': '[a-z áéíóúñÑA-Z]+',
	'required': true
	}).parent().append('<div class="invalid-feedback text-left">Es necesario un apellido (solo letras)</div>')

	$('#rif').prop({'pattern': '^([VEJPG]{1})-([0-9]{7,9})$', 'required': true}).parent().append('<div class="invalid-feedback text-left">Es nesario un rif ejem. J-0000000</div>');


	$('#ci').prop({'pattern': '^([VE]{1})-([0-9]{7,9})$', 'required': true
	}).parent().append('<div class="text-left invalid-feedback">Ingrese una cedula. Ejem. V-0000000</div>');

	$('#preguntas').prop('required', true).parent().append('<div class="text-left invalid-feedback">Seleccione una pregunta</div>');

	$('#respuesta').prop('required', true).parent().append('<div class="text-left invalid-feedback">Seleccione una pregunta</div>');

	$('#num1').keypress(function(e){
		if(!(/[0-9]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

	$('#puestoDeseado').keypress(function(e){
		if(!(/[a-zñÑáéíóúñ A-z]]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

	$('#sueldoDeseado').keypress(function(e){
		if(!(/[0-9]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

	$('#pais').keypress(function(e){
		if(!(/[a-zñÑáéíóúñ A-z]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	})

	$('#direccion').prop({'pattern': '[a-zñÑA-Z0-9]+', 'required': true}).parent().append('<div class="invalid-feedback text-left">Ingrese una dirección</div>');

	$('#direccionEmpresa').prop({'pattern': '[a-zñÑA-Z0-9]+', 'required': true}).parent().append('<div class="invalid-feedback text-left">Ingrese una dirección</div>');

	$('#idioma').keypress(function(e){
		if(!(/[a-zñÑA-z]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	})

	$('#nivelIdioma').keypress(function(e){
		if(!(/[a-zñÑA-z]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	})

	$('#expEmpresa').keypress(function(e){
		if(!(/[[a-zñÑáéíóúñ A-z]]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	})

	$('#expPais').keypress(function(e){
		if(!(/[a-zA-z]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	})

	$('#expSector').keypress(function(e){
		if(!(/[a-zñÑáéíóúñ A-z]]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	})

	$('#expArea').keypress(function(e){
		if(!(/[a-zñÑáéíóúñ A-z]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	})

	$('#expLabor').keypress(function(e){
		if(!(/[a-zA-Z0-9]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

	$('#habilidad').keypress(function(e){
		if(!(/[a-zñÑA-Z0-9]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

	$('#correo').prop({'pattern':'[a-zñÑA-Z0-9.+_-]+@[a-zñÑA-Z09.-]+\.[a-zA-Z0-9.-]+', 'required' : true}).parent().append('<div class="invalid-feedback text-left">Ejem. ejemplo@ejemplo.com</div>'); 

	$('#correoEmpresa').prop({'pattern':'[a-zñÑA-Z0-9.+_-]+@[a-zñÑA-Z09.-]+\.[a-zA-Z0-9.-]+', 'required' : true}).parent().append('<div class="invalid-feedback text-left">Ejem. ejemplo@ejemplo.com</div>'); 

	$('#contrasena').prop('required', true);
	$('#contrasena2').prop('required', true);

	$('#sector').prop('required', true).parent().append('<div class="text-left invalid-feedback">Selecciones el sector al que se dedica su empresa</div>');

	$('#areaEmpresa').prop('required', true).parent().append('<div class="text-left invalid-feedback">Selecciones el area al que se dedica su empresa</div>');

	$('#estado').prop('required', true).parent().append('<div class="text-left invalid-feedback">Seleccione un estado</div>');

	$('#ciudad').prop('required', true).parent().append('<div class="text-left invalid-feedback">Seleccione una ciudad</div>');


	$('#correoEmpresa').keypress(function(e){
		if(!(/[a-zñÑ@.A-Z0-9]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

	$('#descripcion').prop('required', true
	).parent().append('<div class="invalid-feedback text-left">Es necesario una descripción</div>');

	$('#direccionEmpresa').keypress(function(e){
		if(!(/[a-z áéíóúñÑA-z]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

	$('#areaEmpresa').keypress(function(e){
		if(!(/[a-z áéíóúñÑA-z]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

	$('#funciones').keypress(function(e){
		if(!(/[a-z áéíóúñÑA-z]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

});