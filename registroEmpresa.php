<!DOCTYPE html>
<html lang="en">

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
                    <input type="text" name="nombre" id="nombreEmpresa" placeholder="Nombre de la Empresa (*)" class="form-control" autofocus maxlength="45" required>
                    
                </div>

                <div class="form-group">
                    <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control" placeholder="Breve Descripción de la empresa  (*)" maxlength="140"></textarea>
                </div>

                <div class="form-group">
                    <input type="text" name="rif" id="rif" placeholder="RIF  (*)" class="form-control" maxlength="12">
                </div>

                <div class="form-group">
                    <input type="text" name="direccion" id="direccion" placeholder="Dirección  (*)" class="form-control" required maxlength="45">
                </div>

                <div class="form-group">
                    <input type="email" name="correo" id="correo" placeholder="Correo  (*)" class="form-control" required>
                </div>

                <div class="form-group">
                    <select id="sector" name="sector" class="form-control" required>
                    <option value='' >Selecciona tu sector</option>
                        <option value="Administración/Oficinas">Administración/Oficinas</option>
                        <option value="Almacén/Logística/Trasporte">Almacén/Logística/Trasporte</option>
                        <option value="Atención al Cliente">Atención al Cliente</option>
                        <option value="Servicios generales, aseo y seguridad">Servicios generales, aseo y seguridad</option>
                        <option value="CallCenter/Telemercadeo">CallCenter/Telemercadeo</option>
                        <option value="Producción/Operarios">Producción/Operarios</option>
                        <option value="Manufactura">Manufactura</option>
                        <option value="Medicina/Saldud">Medicina/Saldud</option>
                        <option value="Comunicación">Comunicación</option>
                        <option value="Construcción y Obras">Construcción y Obras</option>
                        <option value="Contabilidad/Finanzas">Contabilidad/Finanzas</option>
                        <option value="Mercadotecnía/Publicidad">Mercadotecnía/Publicidad</option>
                        <option value="Diseño/Artes Gráficas">Diseño/Artes Gráficas</option>
                        <option value="Docencia">Docencia</option>
                        <option value="Compras/Comercio Exterior">Compras/Comercio Exterior</option>
                        <option value="Dirección/Gerencía">Dirección/Gerencía</option>
                        <option value="Técnicas">Técnicas</option>
                        <option value="Investigación y Calidad">Investigación y Calidad</option>
                        <option value="Hostelería/Turismo">Hostelería/Turismo</option>
                        <option value="Informática/Telecomunicaciones">Informática/Telecomunicaciones</option>
                        <option value="Ingeniería">Ingeniería</option>
                        <option value="Legal/Asesorias">Legal/Asesorias</option>
                        <option value="Mantenimiento y Reparaciones">Mantenimiento y Reparaciones</option>
                        <option value="Recursos Humanos">Recursos Humanos</option>
                        <option value="Ventas">Ventas</option>
                    </select>
                </div>


                <div class="form-group">
                    <select class="form-control" name='pais' id="pais">
                        
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
                        <select class="form-control" name="estado" id="estado">
                            <option value="">Estado</option>
                        </select>
                </div>


                <div class="form-group">
                    <select name="preguntas" id="preguntas" class="form-control">
                        <option value="" disabled selected>Selecciona tu pregunta de seguridad</option>
                        <option value="¿Cual es tu color favorito?">¿Cual es tu color favorito?</option>
                        <option value="¿Cual es el segundo apellido de tu padre?">¿Cual es el segundo apellido de tu padre?</option>
                        <option value="¿Donde estudiaste primaria?">¿Donde estudiaste primaria?</option>
                    </select>


                </div>

                <div class="form-group">
                    <input type="text" name="respuesta" id="respuesta" placeholder="Escriba su respuesta" class="form-control">
                </div>

                <div class="form-group">
                    <input type="url" name="pagina" id="pagina" placeholder="Pagina web (Opcional)" class="form-control">
                </div>

                <div class="form-group">
                    <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" class="form-control">
                </div>

                <div class="form-group">
                    <input type="password" name="contrasena2" id="contrasena2" placeholder="Contraseña" class="form-control">
                </div>


                <button class="btn btn-success btn-block mt-0" id="registro" type="submit">Registrarse</button>
                <br>
                <a href="loginEmpresa.php" class="btn btn-success"> Ingresar </a>
                <a href="loginEmpresa.php" class="btn btn-info"> Volver </a>
                <div id="resultado">

                </div>
            </form>
        </div>
    </div>



    <?php include("includes/footer.php") ?>
    <script src="js/validaciones.js"></script>
    <script src="js/empresa.js"></script>
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