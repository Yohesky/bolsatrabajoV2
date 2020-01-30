window.addEventListener('load', inicio);

function inicio(){
	obtenerLosDatos();
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

    
	
}

function obtenerLosDatos(){

	$.get('./includes/panelesControl/panelAdmin.php')
	.done(function(respuesta){
		estadisticasGenerales(JSON.parse(respuesta));
	})

}

function estadisticasGenerales(json){
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

function graficosGenerales(datos){

	var ctx = document.getElementById("canvas1").getContext("2d");
	var ctx2 = document.getElementById("canvas2").getContext("2d");
	var ctx3 = document.getElementById("canvas3").getContext("2d");
	var ctxEducacion = document.getElementById('canvasEducacion').getContext('2d');
	var ctxSueldo = document.getElementById('canvasSueldo').getContext('2d');


	window.myBar = new Chart(ctx).Bar({
        labels : ["Empresas"],
        datasets : [{
            fillColor : "#007bff",
            strokeColor : "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
			data :  [datos.empresas] //tiene que ser un arreglo
		}]
	}, {
        responsive : true
	});
	
	window.myBar = new Chart(ctx2).Bar({
        labels : ["Ofertas de Trabajo"],
        datasets : [{
            fillColor : "#d9534f",
            strokeColor : "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
			data :  [datos.ofertas] //tiene que ser un arreglo
		}]}, {
        responsive : true
	});
	
	window.myBar = new Chart(ctx3).Bar({
        labels : ["Trabajadores"],
        datasets : [{
            fillColor : "#5cb85c",
            strokeColor : "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
			data :  [datos.ofertas] //tiene que ser un arreglo
		}]}, {
        responsive : true
	});
	
	window.myBar = new Chart(ctxEducacion).Bar({
		labels : ["Bachiller", "Técnico Medio", "TSU", "Universitario"],
		datasets : [{
            fillColor : ["#5cb85c"],
            strokeColor : "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
			data :  [datos.educacion.bachiller, datos.educacion.tecnicoMedio, datos.educacion.TSU, datos.educacion.universitario] //tiene que ser un arreglo
		}]},{
		responsive: true
	});

	window.myBar = new Chart(ctxSueldo).Bar({
		labels : ["0 - 50$", "50$ - 100$", "+100$"],
		datasets : [{
            fillColor : "#d9534f",
            strokeColor : "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
			data :  [datos.sueldo.sueldo1, datos.sueldo.sueldo2, datos.sueldo.sueldo3] //tiene que ser un arreglo
		}]},{
		responsive: true
	});
}
