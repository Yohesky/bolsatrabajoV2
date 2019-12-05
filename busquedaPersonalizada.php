<?php include("includes/headerTrabajador.php"); ?>

<div class="container row">

    <div class="col-md-6">

        <div class="mt-4 card card-body">
            <form id="formulario">

                <div class="form-group">
                    <input type="text" id="titulo" name="titulo" placeholder="Titular del Empleo" class="form-control" autofocus>
                </div>

                <div class="form-group">
                <input type="text" id="sueldo" name="sueldo" placeholder="Salario" class="form-control" autofocus>
                </div>

                <div class="form-group">
                    <label for="localizacion">Localización</label>
                    <select id="localizacion" name="localizacion">
                        <option >Seleccione una Opcion</option>
                        <option value="Maracaibo">Maracaibo</option>
                        <option value="Cabimas">Cabimas</option>
                        <option value="CiudadOjeda">Ciudad Ojeda</option>
                    </select>
                </div>

                <div class="form-group">
                <label for="localizacion">Categoria</label>
                    <select name="categoria" id="categoria">
                        <option >Seleccione una Opcion</option>
                        <option value="Ventas">Ventas</option>
                        <option value="mantenimiento">Mantenimiento</option>
                    </select>

                </div>

                <!-- btn-block para que ocupe el ancho disponible -->
                <button type="submit" class="btn btn-primary btn-block text-center" id="btnEnviar">
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
<script src="js/filtro.js"></script>