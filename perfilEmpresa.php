<?php include("includes/headerEmpresa.php") ?>

<?php include("includes/sesionEmpresa.php") ?>


<div class="container">
    <div class="row text-center">
        <div class="col-md-6">
            <img src="img/usuario.jpg" alt="" class="responsive rounded mt-5">
            <h3 class="shadow-lg p-3 mb-5 bg-white rounded"><?php echo '' . $_SESSION["correoEmpresa"] . ''; ?></h3>
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
                <div class="card-body scroll-derecha">
                    <form id="formularioTarea">
                        <div class="form-group">
                            <input type="text" id="nombre" placeholder="Nombre" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input type="text" id="nombre" placeholder="Apellido" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <input type="number" id="nombre" placeholder="Cédula" class="form-control" title="Por favor" required>
                        </div>

                        <div class="form-group">
                           <input type="date" class="form-control">
                        </div>

                        <div class="form-group">
                        <label for="hombre"> <input type="radio" id="hombre"> Hombre </label> 
                        <label for="mujer"> <input type="radio" id="muujer"> Mujer </label>
                        </div>

                        <div class="form-group">
                           <select name="ec" id="ec" class="form-control" required>
                               <option value="ec">Estado Civil</option>
                               <option value="casado">Casado</option>
                               <option value="soltero">Soltero</option>
                               <option value="divorciado">Divorciado</option>
                               <option value="viudo">Viudo</option>
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
    </div>
</div>

<?php include("includes/footer.php") ?>
