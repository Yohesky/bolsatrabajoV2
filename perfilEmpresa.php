<?php include("includes/headerEmpresa.php") ?>

<?php include("includes/sesionEmpresa.php") ?>

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
            <input type="file" name="imagenEmpresa" accept=".jpg, .png">
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
            <h3 class="shadow-lg p-3 mb-5 bg-white rounded"><?php echo '' . $_SESSION["nombreEmpresa"] . ''; ?></h3>
            <div class="list-group card">
                <button type="button" class="list-group-item list-group-item-action form-control">JavaScript</button>
                <button type="button" class="list-group-item list-group-item-action form-control">HTML</button>
                <button type="button" class="list-group-item list-group-item-action form-control">NodeJS</button>
                <button type="button" class="list-group-item list-group-item-action form-control">Angular</button>
            </div>
        </div>

        <!-- formulario de datos -->
        
        <div class="col-md-6">
        <div class="card card-body mt-1">
        <h3>Edita tu perfil</h3>
        </div>
        <div class="card mt-2">
                <!-- card-body para un espaciado interno entre los componentes -->
                <div class="card-body">
                    <?php include("includes/datosEmpresa.php") ?>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
<script src="js/perfilEmpresa.js"></script>
