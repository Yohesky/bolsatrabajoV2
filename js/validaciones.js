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

	$('#nombre').keypress(function(e){
		if(!(/[a-z áéíóúñÑA-z]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

	$('#apellido').keypress(function(e){
		if(!(/[a-z áéíóúñÑA-z]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	})

	$('#ci').keypress(function(e){
		if(!(/[0-9]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

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

	$('#direccion').keypress(function(e){
		if(!(/[a-zñÑA-Z0-9]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

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

	$('#correo').prop({'pattern':'[a-zñÑA-Z0-9.+_-]+@[a-zñÑA-Z09.-]+\.[a-zA-Z0-9.-]+', 'required' : true}); 

	$('#contrasena').prop('required', true);

	$('#correoEmpresa').keypress(function(e){
		if(!(/[a-zñÑ@.A-Z0-9]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

	$('#descripcion').keypress(function(e){
		if(!(/[a-zñÑáéíóúñ A-z]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

	$('#nombreEmpresa').keypress(function(e){
		if(!(/[a-z áéíóúñÑA-z]/.test(String.fromCharCode(e.which)))){
			e.preventDefault();
		}
	});

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