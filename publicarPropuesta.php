<?php include("includes/headerEmpresa.php") ?>

<?php include("includes/loginEmpresa.php") ?>

<div class="row container">
    <div class="col-md-6">
        <div class="card mt-4">
            <!-- card-body para un espaciado interno entre los componentes -->
            <div class="card-body">
                <form id="formulario">
                    <input type="hidden" id="postulacionId" name="postulacionId">
                    <div class="form-group">
                        <input type="text" id="nombre" name="nombre" placeholder="Titular del Empleo" class="form-control" autofocus>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5" placeholder="Describe los requerimientos necesarios" required></textarea>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="funciones" id="funciones" cols="30" rows="5" placeholder="Describe las funciones a realizar" required></textarea>
                    </div>

                    <div class="form-group">
                        <input type="number" id="vacantes" name="vacantes" min="1" class="form-control" placeholder="Cantidad de Vacantes" required>
                    </div>

                    <div class="form-group">
                        <input type="number" name="sueldo" id="sueldo" min="1" class="form-control" placeholder="Sueldo" required>
                    </div>

                    <div class="form-group">
                        <input type="number" name="aExp" id="aExp" min="0" class="form-control" placeholder="Años de experiencia" required>
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
                        <label for="vehiculo">¿Se requiere automovil?</label>
                        <select id="vehiculo" name="vehiculo">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="viajes">¿Se requiere viajar?</label>
                        <select id="viajes" name="viajes">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="educacion">Nivel de educacion requerido</label>
                        <select id="educacion" name="educacion">
                            <option value="Bachiller">Bachiller</option>
                            <option value="Tecnico Medio">Tecnico Medio</option>
                            <option value="Tecnico Superior Universitario">Tecnico Superior Universitario</option>
                            <option value="Universitario">Universitario</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="categoria" id="categoria">
                            <option value="Ventas">Ventas</option>
                            <option value="Mantenimiento">Mantenimiento</option>
                        </select>

                    </div>





                    <!-- btn-block para que ocupe el ancho disponible -->
                    <button type="submit" class="btn btn-primary btn-block text-center">
                        Guardar
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <h1 class="text-center after mt-4 text-white"> Tus publicaciones Realizadas </h1>
        <div id="mostrar">

        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
<script src="js/propuesta.js"></script>
<script src="js/direccionesEmpresa.js"></script>