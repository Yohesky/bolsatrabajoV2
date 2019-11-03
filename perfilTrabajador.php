<?php include("includes/headerTrabajador.php") ?>

<?php include("includes/sesionTrabajador.php") ?>

<!-- Modal -->
<div class="modal fade" id="subirFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">Subir Foto de Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <div class="container">
        <div class="row">
            <div class="visualizadorFotoPerfil">
            <img alt="Subir Foto" id="visualizador" class="img-fluid"></div>
            <div id="datosFoto"></div>
        </div>
      </div>
        
        
        <form id="formFotoPerfil" class="mt-5">
            <input type="file" name="fotoPerfil" accept=".jpg, .png">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="botonCancelar">Cancelar</button>
        <button type="submit" class="btn btn-primary" form="formFotoPerfil" id="botonGuardar" disabled>Guardar</button>
      </div>
    </div>
  </div>
</div>




<div class="container">
    <div class="row text-center">
        <div class="col-md-6">
            <!-- FOTO DE PERFIL -->
            <div class="contenedor-foto-perfil my-4" data-toggle="modal" data-target="#subirFoto">
                <img src="" alt="perfil" class="responsive rounded-circle  bg-white" id="fotoPerfil" >
                <div class="texto-editar bg-white">Editar</div>
            </div>

            <h3 class="shadow-lg p-3 mb-5 bg-white rounded"><?php echo '' . $_SESSION["nombre"] . ''; ?></h3>
            <div class="container">
            <?php include("includes/mostrarDescripcion.php") ?>
            </div>
            <h4 class="text-center">Experiencia Laboral</h4>
            <div id="experiencia">

            </div>
        </div>

        <!-- formulario de datos -->

        <div class="col-md-6">
            <div class="card card-body mt-1" data-toggle="modal">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Añadir experiencia Laboral
                </button>


                
            </div>

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
                            <form class="card card-body" id="formularioExperiencia">
                                <div class="form-group">
                                    <input type="text" name="expEmpresa" id="expEmpresa" placeholder="Empresa" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="expPais" id="expPais" placeholder="País" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="expSector" id="expSector" placeholder="Sector de Empresa" class="form-control" title="Por favor" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="expArea" id="expArea" placeholder="Área que laboró" class="form-control" title="Por favor" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="expLabor" id="expLabor" placeholder="Funciones realizadas" class="form-control" title="Por favor" required>
                                </div>

                                <div class="row">

                                    <div class="col-md-6 form-group">
                                        <input type="date" class="form-control" name="expFechaIni" id="expFechaIni">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <input type="date" class="form-control" name="expFechaFin" id="expFechaFin">
                                    </div>
                                </div>



                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button id="guardar" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="card mt-2">
                <!-- card-body para un espaciado interno entre los componentes -->
                <div class="card-body">
                    <?php include("includes/datosPersonales.php") ?>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
<script src="js/perfilTrabajador.js"></script>
