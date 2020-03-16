<?php include("includes/headerEmpresa.php") ?>

<?php include("includes/loginEmpresa.php") ?>

<div class="row container">
    <div class="col-md-6">
        <div class="card mt-4">
            <!-- card-body para un espaciado interno entre los componentes -->
            <div class="card-body">
                <form id="formulario" class="needs-validation" novalidate>
                    <input type="hidden" id="postulacionId" name="postulacionId">
                    <div class="form-group">
                        <input type="text" id="nombrePropuesta" name="nombre" placeholder="Titular del Empleo" class="form-control" autofocus maxlength="45">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5" placeholder="Describe los requerimientos necesarios" required maxlength="45"></textarea>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="funciones" id="funciones" cols="30" rows="5" placeholder="Describe las funciones a realizar" required maxlength="140"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="number" id="vacantes" name="vacantes" min="1" class="form-control" placeholder="Cantidad de Vacantes" required step="1" max="1000" min="1">
                    </div>

                    <div class="form-group">
                        <input type="number" name="sueldo" id="sueldo" min="1" class="form-control" placeholder="Sueldo" required maxlength="1000">
                    </div>

                    <div class="form-group">
                        <input type="number" name="aExp" id="aExp" min="0" class="form-control" placeholder="Años de experiencia" required max="100">
                    </div>


                    <div class="form-group">
                        <select class="form-control" name='pais' id="pais">

                            <?php
                            include('includes/conexion.php');
                            session_start();
                            $query = "SELECT * FROM pais ORDER BY paisnombre ASC";
                            $resultado = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

                            while ($row = mysqli_fetch_array($resultado)) {
                                echo "<option value='" . $row['id'] . "'>";
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
                        <label for="vehiculo">¿Se requiere automovil?</label>
                        <select id="vehiculo" name="vehiculo" class="form-control" required>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="viajes">¿Se requiere viajar?</label>
                        <select id="viajes" name="viajes" class="form-control" required>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select id="educacion" name="educacion" class="form-control" required>
                            <option value=''>Selecciona el nivel de Educación</option>
                            <option value="Bachiller">Bachiller</option>
                            <option value="Tecnico Medio">Tecnico Medio</option>
                            <option value="Tecnico Superior Universitario">Tecnico Superior Universitario</option>
                            <option value="Universitario">Universitario</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select id="categoria" name="categoria" class="form-control" required>
                            <option value=''>Selecciona la categoria</option>
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
                            <option value="Informatica/Telecomunicaciones">Informática/Telecomunicaciones</option>
                            <option value="Ingeniería">Ingeniería</option>
                            <option value="Legal/Asesorias">Legal/Asesorias</option>
                            <option value="Mantenimiento y Reparaciones">Mantenimiento y Reparaciones</option>
                            <option value="Recursos Humanos">Recursos Humanos</option>
                            <option value="Ventas">Ventas</option>
                        </select>
                    </div>

                    <!-- btn-block para que ocupe el ancho disponible -->
                    <button type="submit" class="btn btn-primary btn-block text-center" id="guardar-publicacion">
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
<script src="js/validaciones.js"></script>
<script src="js/propuesta.js"></script>
<script src="js/direccionesEmpresa.js"></script>
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