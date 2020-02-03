window.addEventListener('load', inicio);

function inicio() {
	obtenerLosDatos();
	var randomScalingFactor = function () { return Math.round(Math.random() * 100) };
	cargarCarreras();


}

function obtenerLosDatos() {

	$.get('./includes/panelesControl/panelAdmin.php')
		.done(function (respuesta) {
			estadisticasGenerales(JSON.parse(respuesta));
		})

}

function estadisticasGenerales(json) {
	$('#numEmpresas').text(json.empresas);
	$('#numOfertas').text(json.ofertas);
	$('#numTrabajadores').text(json.trabajadores);
	$('#numBachiller').text(json.educacion.bachiller);
	$('#numTecnicoMedio').text(json.educacion.tecnicoMedio);
	$('#numTSU').text(json.educacion.TSU);
	$('#numUniversitario').text(json.educacion.universitario);
	$('#numSueldo1').text(json.sueldo.sueldo1);
	$('#numSueldo2').text(json.sueldo.sueldo2);
	$('#numSueldo3').text(json.sueldo.sueldo3);

	graficosGenerales(json);
}

function graficosGenerales(datos) {

	var ctx = document.getElementById("canvas1").getContext("2d");
	var ctx2 = document.getElementById("canvas2").getContext("2d");
	var ctx3 = document.getElementById("canvas3").getContext("2d");
	var ctxEducacion = document.getElementById('canvasEducacion').getContext('2d');
	var ctxSueldo = document.getElementById('canvasSueldo').getContext('2d');
	var ctxCarreras = document.getElementById('canvasCarreras').getContext('2d');


	window.myBar = new Chart(ctx).Bar({
		labels: ["Empresas"],
		datasets: [{
			fillColor: "#007bff",
			strokeColor: "rgba(220,220,220,0.8)",
			highlightFill: "rgba(220,220,220,0.75)",
			highlightStroke: "rgba(220,220,220,1)",
			data: [datos.empresas] //tiene que ser un arreglo
		}]
	}, {
		responsive: true
	});

	window.myBar = new Chart(ctx2).Bar({
		labels: ["Ofertas de Trabajo"],
		datasets: [{
			fillColor: "#d9534f",
			strokeColor: "rgba(220,220,220,0.8)",
			highlightFill: "rgba(220,220,220,0.75)",
			highlightStroke: "rgba(220,220,220,1)",
			data: [datos.ofertas] //tiene que ser un arreglo
		}]
	}, {
		responsive: true
	});

	window.myBar = new Chart(ctx3).Bar({
		labels: ["Trabajadores"],
		datasets: [{
			fillColor: "#5cb85c",
			strokeColor: "rgba(220,220,220,0.8)",
			highlightFill: "rgba(220,220,220,0.75)",
			highlightStroke: "rgba(220,220,220,1)",
			data: [datos.ofertas] //tiene que ser un arreglo
		}]
	}, {
		responsive: true
	});

	window.myBar = new Chart(ctxEducacion).Bar({
		labels: ["Bachiller", "Técnico Medio", "TSU", "Universitario"],
		datasets: [{
			fillColor: ["#5cb85c"],
			strokeColor: "rgba(220,220,220,0.8)",
			highlightFill: "rgba(220,220,220,0.75)",
			highlightStroke: "rgba(220,220,220,1)",
			data: [datos.educacion.bachiller, datos.educacion.tecnicoMedio, datos.educacion.TSU, datos.educacion.universitario] //tiene que ser un arreglo
		}]
	}, {
		responsive: true
	});

	window.myBar = new Chart(ctxSueldo).Bar({
		labels: ["0 - 50$", "50$ - 100$", "+100$"],
		datasets: [{
			fillColor: "#d9534f",
			strokeColor: "rgba(220,220,220,0.8)",
			highlightFill: "rgba(220,220,220,0.75)",
			highlightStroke: "rgba(220,220,220,1)",
			data: [datos.sueldo.sueldo1, datos.sueldo.sueldo2, datos.sueldo.sueldo3] //tiene que ser un arreglo
		}]
	}, {
		responsive: true
	});
	const carreras = datos.carreras.map(function(valor){

		let claves = '';
		for (const key in valor) {
			claves = key;
		}
		return claves;
	});

	cargarCarreras(carreras);

	window.myBar = new Chart(ctxCarreras).Bar({
		labels: carreras

		,
		datasets: [{
			fillColor: '#007bff',
			strokeColor: "rgba(220,220,220,0.8)",
			highlightFill: "rgba(220,220,220,0.75)",
			highlightStroke: "rgba(220,220,220,1)",
			data: datos.carreras.map(function(valor){
					let dato = 0;
						for (const key in valor) {
							dato = Number.parseInt(valor[key]);
						}
					return dato;
				}) //tiene que ser un arreglo
		}]
	}, {
		responsive: true
	});
generadorColor();
				
}

function cargarCarreras(carreras) {

	let componentes = carreras.map(function (nombreCarrera, indice) {
		return (`
		<div class="col-md-4">
			<div class="box h-100">
	  			<i class="fa fa-envelope fa-fw bg-primary"></i>
	  			<div class="info">
					<h3 id="carrera${indice}"></h3> <span>${nombreCarrera}</span>
	  			</div>
			</div>
  		</div>
	`);
	});

	publicarCarreras(componentes);
}

function publicarCarreras(carreras) {
	
		$('#carreras').html(carreras);
}