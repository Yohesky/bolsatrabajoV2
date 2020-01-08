var parametros = [];

$(function() {

    manejadorEventoTeclado();
});



function manejadorEventoTeclado(){

    $('#input-buscar').keyup(function(){

        if(event.which == 13 && $(this).val().trim() != ''){

            agregarParametroBusqueda($(this).val().trim());
            $(this).val('');
        }
    })
}

function agregarParametroBusqueda(parametro){

    parametros.push(`
        <div class="col-12 col-md-3 border text-break parametro" idParametro= >
            <span>${parametro}</span>
            <button class="float-rigth" onclick="eliminarParametro">X</button>
        </div>
    `);

    imprimirParametros();
}

function eliminarParametro(){

}

function imprimirParametros(){

    $('#parametros').html(parametros.join(''));
}