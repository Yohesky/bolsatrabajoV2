<?php include("includes/headerEmpresa.php") ?>

<?php include("includes/loginEmpresa.php") ?>

<div class="row container">
        <div class="col-md-6">
                <div class="card mt-4">
                        <!-- card-body para un espaciado interno entre los componentes -->
                        <div class="card-body">
                            <form id="formulario">
                                <div class="form-group">
                                    <input type="text" id="nombre" name="nombre" placeholder="Titular del Empleo" class="form-control" autofocus>
                                </div>
                
                                <div class="form-group">
                                    <textarea  class="form-control" name="descripcion" id="descripcion" cols="30" rows="5" placeholder="Describe los requerimientos necesarios" required></textarea>
                                </div>

                                <div class="form-group">
                                    <textarea  class="form-control" name="funciones" id="funciones" cols="30" rows="5" placeholder="Describe las funciones a realizar" required></textarea>
                                </div>

                                <div class="form-group">
                                        <input type="number" id="vacantes" name="vacantes" min="1" class="form-control" placeholder="Cantidad de Vacantes" required>
                                </div>
                                <div class="form-group">
                                        <input type="number" name="sueldo" id="sueldo"  min="1" class="form-control" placeholder="Sueldo" required>
                                </div>
                                <div class="form-group">
                                        <label for="localizacion">Localización</label>
                                        <select id="localizacion" name="localizacion">
                                          <option value="Maracaibo">Maracaibo</option>
                                          <option value="Cabimas">Cabimas</option>
                                          <option value="CiudadOjeda">Ciudad Ojeda</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                        <select name="Categoria" id="Categoria">

                                        <?php include("includes/categorias.php") ?>
                                        </select>
                                       
                                </div>

                                
                            
                               
                
                                <!-- btn-block para que ocupe el ancho disponible -->
                                <button type="submit"class="btn btn-primary btn-block text-center">
                                    Guardar
                                </button>
                            </form>
                        </div>
                    </div>
        </div>

        <div class="col-md-6">
            <div id="mostrar">

            </div>
        </div>
    </div>

<?php include("includes/footer.php") ?>
<script src="js/propuesta.js"></script>
