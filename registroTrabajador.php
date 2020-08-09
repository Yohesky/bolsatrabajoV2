
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
 
    
</head>
<body>

<div class="card-body">
    <div class="row">
    <form id="formulario" class="col-md-6 col-md-offset-4 container text-center needs-validation" novalidate>
        <div class="form-group">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control" autofocus maxlength="45">
        </div>

        <div class="form-group">
            <input type="text" name="apellido" id="apellido" placeholder="Apellido" class="form-control" autofocus maxlength="45">
        </div>

        <div class="form-group">
            <input type="email" name="email" id="email" placeholder="Correo" class="form-control" >
        </div>

        <!-- pais -->
        <div class="form-group">
        <select class="form-control" name='idpais' id="pais">
            
        <?php 
            include('includes/conexion.php');
            session_start();
            $query = "SELECT * FROM pais ORDER BY paisnombre ASC";
            $resultado = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
            
            while ($row = mysqli_fetch_array($resultado)) {
                echo "<option value='".$row['id']."'>";
                 echo $row['paisnombre'];
                echo "</option>";
            } 
            ?>
        </select>
            
          
        </div>
        <!-- pais -->

        <!-- estado -->
        <div class="form-group">
        <select class="form-control" name="idestado" id="estado">
            <option value="">Estado</option>
        </select>
            
            
        </div>
        <!-- estado -->

        <div class="form-group d-flex row mx-0">
            <select name="nacion" id="nacion" class="form-control col-2">
                <option value="V">V</option>
                <option value="E">E</option>
            </select>
            <div class="d-bloc col-10">
                <input type="text" name="ci" id="ci" placeholder="Cédula" class="form-control" maxlength="10">  
            </div>
        </div>

        <!-- <div class="form-group">
                    <select name="estado" id="estado" class="form-control">
                        <option value="" disabled selected>Selecciona tu estado</option>
                        <option value="Amazonas">Amazonas</option>
                        <option value="Anzoategui">Anzoategui</option>
                        <option value="Apure">Apure</option>
                        <option value="Aragua">Aragua</option>
                        <option value="Barinas">Barinas</option>
                        <option value="Bolivar">Bolivar</option>
                        <option value="Carabobo">Carabobo</option>
                        <option value="Cojedes">Cojedes</option>
                        <option value="Delta Amacuro">Delta Amacuro</option>
                        <option value="Distrito Capital">Distrito Capital</option>
                        <option value="Falcon">Falcon</option>
                        <option value="Guarico">Guarico</option>
                        <option value="Lara">Lara</option>
                        <option value="Merida">Merida</option>
                        <option value="Miranda">Miranda</option>
                        <option value="Monagas">Monagas</option>
                        <option value="Nueva Esparta">Nueva Esparta</option>
                        <option value="Portuguesa">Portuguesa</option>
                        <option value="Sucre">Sucre</option>
                        <option value="Tachira">Tachira</option>
                        <option value="Trujillo">Trujillo</option>
                        <option value="Vargas">Vargas</option>
                        <option value="Yaracuy">Yaracuy</option>
                        <option value="Zulia">Zulia</option>

                    </select>

            </div>

                <div class="form-group">
                    <select name="ciudad" id="ciudad" class="form-control">
                      
                    
                    </select>


                </div> -->

        <div class="form-group">
            <select name="preguntas" id="preguntas" class="form-control">
                    <option value="" disabled selected>Selecciona tu pregunta de seguridad</option>
                    <option value="¿Como se llama tu mejor amigo de la infancia?">¿Como se llama tu mejor amigo de la infancia?</option>
                    <option value="¿Cual es el nombre de tu primera mascota?">¿Cual es el nombre de tu primera mascota?</option>
                    <option value="¿Donde estudiaste primaria?">¿Donde estudiaste primaria?</option>
            </select>

            
        </div>

        <div class="form-group">
            <input type="password" name="res1" id="res1" placeholder="Escriba su respuesta" class="form-control">
        </div>

        <div class="form-group">
            <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" class="form-control">
        </div>

        <div class="form-group">
            <input type="password" name="contrasena2" id="contrasena2" placeholder="Ingrese contraseña nuevamente" class="form-control">
        </div>


        <button class="btn btn-success btn-block mt-0" id="registro" type="submit">Registrarse</button>
        <br>
        <a href="loginTrabajador.php" class="pt-4"> Ingresar </a>
        <div id="resultado">

        </div>
    </form>
    </div>

<?php include("includes/footer.php") ?>
<script src="js/validaciones.js"></script>
<script src="js/trabajador.js"></script>
<script>
    	$(document).ready(function(){
				$("#pais").change(function () {
                    console.log('cambiando');
                    
					$("#pais option:selected").each(function () {
						idpais = $(this).val();
						$.post("includes/getEstados.php", { idpais: idpais }, function(data){
                            console.log(data);
                            
							$("#estado").html(data);
						});            
					});
				})
			});
</script>