<?php include("includes/headerTrabajador.php") ?>
<!-- <?php include("includes/sesionTrabajador.php") ?> -->
<div class="container mx-auto">

<table class="table table-hover table-dark mt-5">
                <thead>
                    <tr>
                        
                        <td scope="col">Titulo</td>
                        <td scope="col">Descripción</td>
                        <td scope="col">Vacantes</td>
                        <td scope="col">Sueldo</td>
                        <td scope="col">Estado</td>
                        <td scope="col">Funciones</td>
                        

                        <td scope="col"> </td>
                    </tr>
                </thead>

                <tbody id="postulaciones">

                </tbody>
</table>

</div>
<?php include("includes/footer.php") ?>
<script src="js/postulacion.js"></script>
<script src="js/direcciones.js"></script>