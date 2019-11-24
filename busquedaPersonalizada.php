<?php include("includes/headerTrabajador.php"); ?>

<div class="container row">

    <div class="col-md-6">

        <div class="card-body">
            <form id="formularioBusqueda">

                <div class="form-group">
                    <input type="text" id="titulo" name="titulo" placeholder="Titular del Empleo" class="form-control" autofocus>
                </div>

                <div class="form-group">
                <input type="text" id="sueldo" name="sueldo" placeholder="Salario" class="form-control" autofocus>
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
                <button type="submit" class="btn btn-primary btn-block text-center">
                    Buscar
                </button>
            </form>
        </div>

    </div>

    <div class="col-md-6">
    
        <div id="resultados"> </div>

    </div>

</div>





<?php include("includes/footer.php"); ?>
<script src="js/filtros.js"></script>