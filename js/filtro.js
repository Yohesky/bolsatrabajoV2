class Filtro {
    constructor(form){
        this.form = form
    }

    //METODO 1
    enviar(){

        console.log(this.form)

         $.ajax({
            method: 'POST',
            url: 'includes/filtroUsuario.php',
            data: this.form,
            success: function(res){let filtro = JSON.parse(res)}
        })
        
        return 
    }
    //METODO1 

    //METODO2
    mostrar(){
        
        console.log('ESTA ES LA RESPUESTA DESDE METODO 2', this.enviar())
    }

    //METODO2




}

document.addEventListener("submit", function(e){
    let form = $("#formulario").serialize();
    const filtro = new Filtro(form)
    filtro.enviar();
    filtro.mostrar();
    e.preventDefault();
})