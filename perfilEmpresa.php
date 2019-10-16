<?php include("includes/headerEmpresa.php") ?>

<?php include("includes/sesionEmpresa.php") ?>


<div class="container">
    <div class="row text-center">
        <div class="col-md-6">
            <img src="img/usuario.jpg" alt="" class="responsive rounded mt-5">
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
