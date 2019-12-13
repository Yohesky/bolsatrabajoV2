class Filtro {
    constructor(form){
        this.form = form
    }

    
    //METODO 1
    async enviar(){

        console.log(this.form)

         $.ajax({
            method: 'POST',
            url: 'includes/filtroUsuario.php',
            data: this.form,
            success: await function(response){
                let filtro = JSON.parse(response);
                let plantilla = ''
                filtro.forEach(filtro => {
                    plantilla += 
                    `

                    <div class="card mt-4">
                        <h5 class="card-header">${filtro.titulo}</h5>
                        <div class="card-body">
                            <h5 class="card-title">${filtro.sueldo} BsS </h5>
                            <hr>
                            <p class="card-text">${filtro.descripcion}</p>
                            <hr>
                            <p class="card-text">${filtro.funciones}</p>
                            <a href="propuesta.php?id=${filtro.idpropuesta}&idempresa=${filtro.idempresa}"><button type="button" class="btn btn-pill btn-success">Ver Propuesta</button> </a>
                        </div>
                    </div>

                    `;
                    $("#resultados").html(plantilla)
                })
            }
        })
        
        
    }
    //METODO1

}

document.addEventListener("submit", function(e){
    let form = $("#formulario").serialize();
    const filtro = new Filtro(form)
    filtro.enviar();
    e.preventDefault();
})