<?php include("includes/headerTrabajador.php") ?>

<!-- <?php include("includes/sesionTrabajador.php") ?> -->

<!-- Modal -->
<div class="modal fade" id="subirFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
</div>

<?php
$idusuarios = $_SESSION['idusuarios'];
$query = "SELECT nombre, apellido from usuarios where idusuarios = '$idusuarios'";
$rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
$fila = mysqli_fetch_assoc($rsQuery);
?>



<div class="container mt-3">
    <div class="row text-center">
        <div class="col-md-6">
            <!-- FOTO DE PERFIL -->

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="contenedor-foto-perfil my-4" data-toggle="modal" data-target="#subirFoto">
                            <img src="" alt="perfil" class="responsive bg-white" id="fotoPerfil" style="border-radius: 5%">
                            <div class="texto-editar bg-white">Editar</div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <h3 class="p-3 mb-5 bg-white" style="text-transform: capitalize" id="nomG"><?php echo $fila["nombre"]; ?></h3>
                            </h5>
                            <hr>
                            <h3 style="margin-top: -70px; text-transform: capitalize" class="card-title p-3 mb-5 bg-white" id="ApeG"><?php echo $fila["apellido"]; ?></h3>


                        </div>
                    </div>
                </div>
            </div>


            <h1 class="text-center bg-dark">Habilidades</h1>
            <div class="card card-body" data-toggle="modal">

                <form id="habilidades" class="card card-body needs-validation" novalidate>
                    <input type="hidden" id="habilidadId" name="habilidadId">
                    <div class="form-group">
                        <input type="text" id="habilidad" name="habilidad" placeholder="Ingresa una habilidad" class="form-control" maxlength="100">
                    </div>

                    <div class='form-group'>

                        <label class='form-control' for='nivelHabilidad'>Nivel Habilidad</label>
                        <select class='form-control' id='nivelHabilidad' name='nivelHabilidad'>

                            <option value='Basico'>Basico</option>
                            <option value='Intermedio'>Intermedio</option>
                            <option value='Avanzado'>Avanzado</option>
                        </select>

                    </div>


                    <button class="btn btn-success" id="btnHabilidad">Agregar</button>
                </form>


            </div>

            <div id="mostrar" style="max-height: 23rem;overflow: auto;">

            </div>



            <h1 class="text-center bg-dark">Experiencias Laborales</h1>
            <div class="bg-white p-3 rounded mb-2">
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal" id="anadirExp">
                    Añadir experiencia Laboral
                </button>
            </div>
            <div id="experiencia" style="max-height: 23rem; overflow: auto;">

            </div>


        </div>

        <!-- formulario de datos -->

        <div class="col-md-6">


            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Añade tu experiencia Laboral</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="card card-body needs-validation" id="formularioExperiencia" novalidate>
                                <input type="hidden" id="experienciaID" name="experienciaID">
                                <div class="form-group">
                                    <input type="text" name="expEmpresa" id="expEmpresa" placeholder="Empresa" class="form-control" required maxlength="100">
                                </div>


                                <div class="form-group">
                          
                                <select name="expPais" id="expPais" class="form-control">
<option value="Elegir" disabled id="AF">Elegir opción</option>
<option value="Afganistán" id="AF">Afganistán</option>
<option value="Albania" id="AL">Albania</option>
<option value="Alemania" id="DE">Alemania</option>
<option value="Andorra" id="AD">Andorra</option>
<option value="Angola" id="AO">Angola</option>
<option value="Anguila" id="AI">Anguila</option>
<option value="Antártida" id="AQ">Antártida</option>
<option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
<option value="Antillas holandesas" id="AN">Antillas holandesas</option>
<option value="Arabia Saudí" id="SA">Arabia Saudí</option>
<option value="Argelia" id="DZ">Argelia</option>
<option value="Argentina" id="AR">Argentina</option>
<option value="Armenia" id="AM">Armenia</option>
<option value="Aruba" id="AW">Aruba</option>
<option value="Australia" id="AU">Australia</option>
<option value="Austria" id="AT">Austria</option>
<option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
<option value="Bahamas" id="BS">Bahamas</option>
<option value="Bahrein" id="BH">Bahrein</option>
<option value="Bangladesh" id="BD">Bangladesh</option>
<option value="Barbados" id="BB">Barbados</option>
<option value="Bélgica" id="BE">Bélgica</option>
<option value="Belice" id="BZ">Belice</option>
<option value="Benín" id="BJ">Benín</option>
<option value="Bermudas" id="BM">Bermudas</option>
<option value="Bhután" id="BT">Bhután</option>
<option value="Bielorrusia" id="BY">Bielorrusia</option>
<option value="Birmania" id="MM">Birmania</option>
<option value="Bolivia" id="BO">Bolivia</option>
<option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
<option value="Botsuana" id="BW">Botsuana</option>
<option value="Brasil" id="BR">Brasil</option>
<option value="Brunei" id="BN">Brunei</option>
<option value="Bulgaria" id="BG">Bulgaria</option>
<option value="Burkina Faso" id="BF">Burkina Faso</option>
<option value="Burundi" id="BI">Burundi</option>
<option value="Cabo Verde" id="CV">Cabo Verde</option>
<option value="Camboya" id="KH">Camboya</option>
<option value="Camerún" id="CM">Camerún</option>
<option value="Canadá" id="CA">Canadá</option>
<option value="Chad" id="TD">Chad</option>
<option value="Chile" id="CL">Chile</option>
<option value="China" id="CN">China</option>
<option value="Chipre" id="CY">Chipre</option>
<option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
<option value="Colombia" id="CO">Colombia</option>
<option value="Comores" id="KM">Comores</option>
<option value="Congo" id="CG">Congo</option>
<option value="Corea" id="KR">Corea</option>
<option value="Corea del Norte" id="KP">Corea del Norte</option>
<option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
<option value="Costa Rica" id="CR">Costa Rica</option>
<option value="Croacia" id="HR">Croacia</option>
<option value="Cuba" id="CU">Cuba</option>
<option value="Dinamarca" id="DK">Dinamarca</option>
<option value="Djibouri" id="DJ">Djibouri</option>
<option value="Dominica" id="DM">Dominica</option>
<option value="Ecuador" id="EC">Ecuador</option>
<option value="Egipto" id="EG">Egipto</option>
<option value="El Salvador" id="SV">El Salvador</option>
<option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
<option value="Eritrea" id="ER">Eritrea</option>
<option value="Eslovaquia" id="SK">Eslovaquia</option>
<option value="Eslovenia" id="SI">Eslovenia</option>
<option value="España" id="ES">España</option>
<option value="Estados Unidos" id="US">Estados Unidos</option>
<option value="Estonia" id="EE">Estonia</option>
<option value="c" id="ET">Etiopía</option>
<option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
<option value="Filipinas" id="PH">Filipinas</option>
<option value="Finlandia" id="FI">Finlandia</option>
<option value="Francia" id="FR">Francia</option>
<option value="Gabón" id="GA">Gabón</option>
<option value="Gambia" id="GM">Gambia</option>
<option value="Georgia" id="GE">Georgia</option>
<option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
<option value="Ghana" id="GH">Ghana</option>
<option value="Gibraltar" id="GI">Gibraltar</option>
<option value="Granada" id="GD">Granada</option>
<option value="Grecia" id="GR">Grecia</option>
<option value="Groenlandia" id="GL">Groenlandia</option>
<option value="Guadalupe" id="GP">Guadalupe</option>
<option value="Guam" id="GU">Guam</option>
<option value="Guatemala" id="GT">Guatemala</option>
<option value="Guayana" id="GY">Guayana</option>
<option value="Guayana francesa" id="GF">Guayana francesa</option>
<option value="Guinea" id="GN">Guinea</option>
<option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
<option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
<option value="Haití" id="HT">Haití</option>
<option value="Holanda" id="NL">Holanda</option>
<option value="Honduras" id="HN">Honduras</option>
<option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
<option value="Hungría" id="HU">Hungría</option>
<option value="India" id="IN">India</option>
<option value="Indonesia" id="ID">Indonesia</option>
<option value="Irak" id="IQ">Irak</option>
<option value="Irán" id="IR">Irán</option>
<option value="Irlanda" id="IE">Irlanda</option>
<option value="Isla Bouvet" id="BV">Isla Bouvet</option>
<option value="Isla Christmas" id="CX">Isla Christmas</option>
<option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
<option value="Islandia" id="IS">Islandia</option>
<option value="Islas Caimán" id="KY">Islas Caimán</option>
<option value="Islas Cook" id="CK">Islas Cook</option>
<option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
<option value="Islas Faroe" id="FO">Islas Faroe</option>
<option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
<option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
<option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
<option value="Islas Marshall" id="MH">Islas Marshall</option>
<option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
<option value="Islas Palau" id="PW">Islas Palau</option>
<option value="Islas Salomón" d="SB">Islas Salomón</option>
<option value="Islas Tokelau" id="TK">Islas Tokelau</option>
<option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
<option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
<option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
<option value="Israel" id="IL">Israel</option>
<option value="Italia" id="IT">Italia</option>
<option value="Jamaica" id="JM">Jamaica</option>
<option value="Japón" id="JP">Japón</option>
<option value="Jordania" id="JO">Jordania</option>
<option value="Kazajistán" id="KZ">Kazajistán</option>
<option value="Kenia" id="KE">Kenia</option>
<option value="Kirguizistán" id="KG">Kirguizistán</option>
<option value="Kiribati" id="KI">Kiribati</option>
<option value="Kuwait" id="KW">Kuwait</option>
<option value="Laos" id="LA">Laos</option>
<option value="Lesoto" id="LS">Lesoto</option>
<option value="Letonia" id="LV">Letonia</option>
<option value="Líbano" id="LB">Líbano</option>
<option value="Liberia" id="LR">Liberia</option>
<option value="Libia" id="LY">Libia</option>
<option value="Liechtenstein" id="LI">Liechtenstein</option>
<option value="Lituania" id="LT">Lituania</option>
<option value="Luxemburgo" id="LU">Luxemburgo</option>
<option value="Macao R. A. E" id="MO">Macao R. A. E</option>
<option value="Madagascar" id="MG">Madagascar</option>
<option value="Malasia" id="MY">Malasia</option>
<option value="Malawi" id="MW">Malawi</option>
<option value="Maldivas" id="MV">Maldivas</option>
<option value="Malí" id="ML">Malí</option>
<option value="Malta" id="MT">Malta</option>
<option value="Marruecos" id="MA">Marruecos</option>
<option value="Martinica" id="MQ">Martinica</option>
<option value="Mauricio" id="MU">Mauricio</option>
<option value="Mauritania" id="MR">Mauritania</option>
<option value="Mayotte" id="YT">Mayotte</option>
<option value="México" id="MX">México</option>
<option value="Micronesia" id="FM">Micronesia</option>
<option value="Moldavia" id="MD">Moldavia</option>
<option value="Mónaco" id="MC">Mónaco</option>
<option value="Mongolia" id="MN">Mongolia</option>
<option value="Montserrat" id="MS">Montserrat</option>
<option value="Mozambique" id="MZ">Mozambique</option>
<option value="Namibia" id="NA">Namibia</option>
<option value="Nauru" id="NR">Nauru</option>
<option value="Nepal" id="NP">Nepal</option>
<option value="Nicaragua" id="NI">Nicaragua</option>
<option value="Níger" id="NE">Níger</option>
<option value="Nigeria" id="NG">Nigeria</option>
<option value="Niue" id="NU">Niue</option>
<option value="Norfolk" id="NF">Norfolk</option>
<option value="Noruega" id="NO">Noruega</option>
<option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
<option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
<option value="Omán" id="OM">Omán</option>
<option value="Panamá" id="PA">Panamá</option>
<option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
<option value="Paquistán" id="PK">Paquistán</option>
<option value="Paraguay" id="PY">Paraguay</option>
<option value="Perú" id="PE">Perú</option>
<option value="Pitcairn" id="PN">Pitcairn</option>
<option value="Polinesia francesa" id="PF">Polinesia francesa</option>
<option value="Polonia" id="PL">Polonia</option>
<option value="Portugal" id="PT">Portugal</option>
<option value="Puerto Rico" id="PR">Puerto Rico</option>
<option value="Qatar" id="QA">Qatar</option>
<option value="Reino Unido" id="UK">Reino Unido</option>
<option value="República Centroafricana" id="CF">República Centroafricana</option>
<option value="República Checa" id="CZ">República Checa</option>
<option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
<option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
<option value="República Dominicana" id="DO">República Dominicana</option>
<option value="Reunión" id="RE">Reunión</option>
<option value="Ruanda" id="RW">Ruanda</option>
<option value="Rumania" id="RO">Rumania</option>
<option value="Rusia" id="RU">Rusia</option>
<option value="Samoa" id="WS">Samoa</option>
<option value="Samoa occidental" id="AS">Samoa occidental</option>
<option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
<option value="San Marino" id="SM">San Marino</option>
<option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
<option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
<option value="Santa Helena" id="SH">Santa Helena</option>
<option value="Santa Lucía" id="LC">Santa Lucía</option>
<option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
<option value="Senegal" id="SN">Senegal</option>
<option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
<option value="Sychelles" id="SC">Seychelles</option>
<option value="Sierra Leona" id="SL">Sierra Leona</option>
<option value="Singapur" id="SG">Singapur</option>
<option value="Siria" id="SY">Siria</option>
<option value="Somalia" id="SO">Somalia</option>
<option value="Sri Lanka" id="LK">Sri Lanka</option>
<option value="Suazilandia" id="SZ">Suazilandia</option>
<option value="Sudán" id="SD">Sudán</option>
<option value="Suecia" id="SE">Suecia</option>
<option value="Suiza" id="CH">Suiza</option>
<option value="Surinam" id="SR">Surinam</option>
<option value="Svalbard" id="SJ">Svalbard</option>
<option value="Tailandia" id="TH">Tailandia</option>
<option value="Taiwán" id="TW">Taiwán</option>
<option value="Tanzania" id="TZ">Tanzania</option>
<option value="Tayikistán" id="TJ">Tayikistán</option>
<option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
<option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
<option value="Timor Oriental" id="TP">Timor Oriental</option>
<option value="Togo" id="TG">Togo</option>
<option value="Tonga" id="TO">Tonga</option>
<option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
<option value="Túnez" id="TN">Túnez</option>
<option value="Turkmenistán" id="TM">Turkmenistán</option>
<option value="Turquía" id="TR">Turquía</option>
<option value="Tuvalu" id="TV">Tuvalu</option>
<option value="Ucrania" id="UA">Ucrania</option>
<option value="Uganda" id="UG">Uganda</option>
<option value="Uruguay" id="UY">Uruguay</option>
<option value="Uzbekistán" id="UZ">Uzbekistán</option>
<option value="Vanuatu" id="VU">Vanuatu</option>
<option value="Venezuela" id="VE">Venezuela</option>
<option value="Vietnam" id="VN">Vietnam</option>
<option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
<option value="Yemen" id="YE">Yemen</option>
<option value="Zambia" id="ZM">Zambia</option>
<option value="Zimbabue" id="ZW">Zimbabue</option>
</select>
                
            
                                </div>

                                <div class="form-group">
                                    <input type="text" name="expSector" id="expSector" placeholder="Sector de Empresa" class="form-control" title="Por favor" required maxlength="100">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="expArea" id="expArea" placeholder="Área que laboró" class="form-control" title="Por favor" required maxlength="100">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="expLabor" id="expLabor" placeholder="Funciones realizadas" class="form-control" title="Por favor" required maxlength="100">
                                </div>

                                <div class="row">

                                    <div class="col-md-6 form-group">
                                        <input placeholder="Fecha de inicio" type="text" class="form-control" name="expFechaIni" id="expFechaIni" required autocomplete="off">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <input type="text" autocomplete="off" placeholder="Fecha de culminacion" class="form-control" name="expFechaFin" id="expFechaFin" required>
                                    </div>
                                </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="cerrar-modal" data-dismiss="modal">Cerrar</button>
                            <button id="guardar" class="btn btn-primary"  type="submit">Guardar</button>
                        </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="">
                <?php include("includes/mostrarDescripcion.php") ?>
            </div>

            <div id="redesSociales">

            </div>

            <button class="btn btn-block btn-primary mt-2 mb-2" data-toggle="modal" data-target="#rsModal" id="anadirRs">
                Agregar tus redes sociales
            </button>

            <div class="modal fade" id="rsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title text-center">
                            <h5 class="" id="exampleModalLabel">Añade tus redes Sociales</h5>
                            </div>
                                
                            <hr>
                            <br>
                            

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <div class="alert alert-primary" role="alert">
                                Ingresa el link de tus perfiles para que sea mas fácil para las empresas contactarte!
                            </div>
                            <form id="rs" class="card card-body mt-3">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <i class="fab fa-instagram fa-2x"> </i>
                                        </div>

                                        <div class="col-md-10">
                                            <input type="text" name="instagram" class="form-control" placeholder="Ingrese su Instagram!">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <i class="fab fa-linkedin fa-2x"> </i>
                                        </div>

                                        <div class="col-md-10">
                                            <input type="text" name="linkedin" class="form-control" placeholder="Ingrese su Linkedin!">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <i class="fab fa-facebook fa-2x"> </i>
                                        </div>

                                        <div class="col-md-10">
                                            <input type="text" name="facebook" class="form-control" placeholder="Ingrese su Facebook!">
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-info btn-block">Guardar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="cerrar-modal" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="card">
                <!-- card-body para un espaciado interno entre los componentes -->
                <div class="card-body col-12">
                    <?php include("includes/datosPersonales.php") ?>
                </div>

            <div class="card text-white">
                <button class="btn btn-warning text-white" data-toggle="modal" data-target="#localizacionModal" id="localizacionM">¿Ha cambiado de País?</button>
            </div>

            </div>




            <div class="modal fade" id="localizacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="modal-title text-center">
                            <h5 class="" id="exampleModalLabel">Cambia tu Ubicacion</h5>
                            </div>
                                
                            <hr>
                            <br>

                            

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                       
                            <form id="localizacion" class="card card-body mt-3">

                                <div class="form-group">
                                    <select class="form-control" name='pais' id="pais">
                                        
                                    <?php 
                                        include('includes/conexion.php');
  
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

                                
                                <div class="form-group">
                                     <select class="form-control" name="estado" id="estado">
                                                <option value="">Estado</option>
                                    </select>
                                </div>



                                <button class="btn btn-info btn-block">Guardar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="cerrar-modal" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
<script src="js/validaciones.js"></script>
<script src="js/perfilTrabajador.js"></script>
<script>
    $(document).ready(function() {
        var maximaFechaInicio = new Date();
        var minimoFechaInicio = new Date(maximaFechaInicio.getFullYear() + 10,
            maximaFechaInicio.getMonth(), maximaFechaInicio.getDate());


        $.datepicker.regional['es'] = {
            closeText: 'Cerrar',
            prevText: '<Ant',
            nextText: 'Sig>',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        };
        $.datepicker.setDefaults($.datepicker.regional['es']);

        $("#expFechaIni").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '1970:' + 2020,
            dateFormat: "yy-mm-dd",
            maxDate: "0",
        }).keydown(function(e) {
            e.preventDefault();
        });


        $("#expFechaFin").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '1970:' + 2020,
            dateFormat: "yy-mm-dd",
            maxDate: "0"
        }).keydown(function(e) {
            e.preventDefault();
        });

        $("#fechaNacimiento").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '1950:' + 2020,
            dateFormat: "yy-mm-dd",
            maxDate: "0",
        }).keydown(function(e) {
            e.preventDefault();
        });

        $("#fechaNacimiento").change(() => {
            $.ajax({
                type: "POST",
                data: "fecha=" + $("#fechaNacimiento").val(),
                url: "includes/calcularEdad.php",
                success: (r) => {

                    $("#edadCalculada").text(r + " años")

                }
            })
        })
    })
</script>

<script src="js/habilidad.js"></script>
<script src="js/direcciones.js"></script>
<script src="js/perfilTrabajador.js"></script>
<script>
    actLocalizacion()
    $(document).ready(function(){
				$("#pais").ready(function () {
                    
                   console.log('ready');
                   $("#pais option:selected").each(function () {
						idpais = $(this).val();
						$.post("includes/getEstados.php", { idpais: idpais }, function(data){
                            console.log(data);
                            
							$("#estado").html(data);
						});            
					});

                })
                

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
            
            function actLocalizacion(){
                $("#localizacion").submit(function (e){
                   let localizacion = $("#localizacion").serialize()
                    console.log(localizacion);
                    
                    
                    $.ajax({
                        method: 'POST',
                        url: "includes/actualizarLocalizacion.php",
                        data: localizacion,
                        success: function (response) {
        
                            
                            console.log(response)
                        },
                        error: function(error){
                            console.log(error);
                        }
                        });

                    e.preventDefault()
                })
            }
</script>