class Filtro {
    constructor(form){
        this.form = form
    }

    manejarRes(res){
        console.log(res)
    }
    
    //METODO 1
    enviar(){

       

        console.log(this.form)

         $.ajax({
            method: 'POST',
            url: 'includes/filtroUsuario.php',
            data: this.form,
            success: function(resolve,reject){
                if(resolve)
            }
        })
        
        
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