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
            <form id="formulario" class="col-md-6 col-md-offset-4 container text-center">
                <div class="form-group">
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre de la Empresa (*)" class="form-control" autofocus>
                </div>

                <div class="form-group">
                    <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control" placeholder="Breve Descripción de la empresa  (*)"></textarea>
                </div>

                <div class="form-group">
                    <input type="text" name="rif" id="rif" placeholder="RIF  (*)" class="form-control">
                </div>

                <div class="form-group">
                    <input type="text" name="direccion" id="direccion" placeholder="Dirección  (*)" class="form-control" required>
                </div>

                <div class="form-group">
                    <input type="text" name="correo" id="correo" placeholder="Correo  (*)" class="form-control" required>
                </div>

                <div class="form-group">
                    <select id="sector" name="sector" class="form-control" required>
                        <option value="Administración">Sector de la Empresa</option>
                        <option value="Administración">Administración</option>
                        <option value="Almacén">Almacén</option>
                        <option value="AtenciónCliente">Atención al Cliente</option>
                        <option value="Compras">Compras</option>
                        <option value="Construcción">Construcción</option>
                        <option value="Contabilidad">Contabilidad</option>
                        <option value="Gerencia">Gerencia</option>
                        <option value="Diseño">Diseño</option>
                        <option value="Enseñanza">Enseñanza</option>
                        <option value="Turismo">Turismo</option>
                        <option value="Informatica">Informática</option>
                        <option value="Ingeniería">Ingeniería</option>
                        <option value="Asesorias">Asesorias</option>
                        <option value="Reparacion">Reparación</option>
                        <option value="Publicidad">Publicidad</option>
                        <option value="RRHH">Recursos Humanos</option>
                        <option value="Ventas">Ventas</option>
                    </select>
                </div>

                <div class="form-group">
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


                    <select name="ciudad" id="ciudad" class="form-control">
                      
                    
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
                    <input type="url" name="pagina" id="pagina" placeholder="Pagina web" class="form-control">
                </div>

                <div class="form-group">
                    <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" class="form-control">
                </div>

                <div class="form-group">
                    <input type="password" name="contrasena2" id="contrasena2" placeholder="Contraseña" class="form-control">
                </div>


                <button class="btn btn-success btn-block mt-0" id="registro">Registrarse</button>
                <br>
                <a href="loginEmpresa.php" class="btn btn-success"> Ingresar </a>
                <a href="loginEmpresa.php" class="btn btn-info"> Volver </a>
                <div id="resultado">

                </div>
            </form>
        </div>
    </div>



    <?php include("includes/footer.php") ?>
    <script src="js/empresa.js"></script>