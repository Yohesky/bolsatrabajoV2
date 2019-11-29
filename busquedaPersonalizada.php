<?php include("includes/headerTrabajador.php") ?>

    <div class="container row">

        <div class="card col-md-6 mt-4">
                        <!-- card-body para un espaciado interno entre los componentes -->
                        <div class="card-body">
                            <form id="formulario">
                                <input type="hidden" id="postulacionId" name="postulacionId">
                                <div class="form-group">
                                    <input type="text" id="titulo" name="titulo" placeholder="Titular del Empleo" class="form-control" autofocus>
                                </div>

                                <div class="form-group">
                                        <input type="number" id="vacantes" name="vacantes" min="1" class="form-control" placeholder="Cantidad de Vacantes" >
                                </div>
                                <div class="form-group">
                                        <input type="number" name="sueldo" id="sueldo"  min="1" class="form-control" placeholder="Sueldo" >
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

        <div class="col-md-6">
            <div id="resultados">

            </div>
        </div>

    </div>

<?php include("includes/footer.php") ?>
<script src="js/filtro.js"></script>