<?php include("includes/headerTrabajador.php") ?>

<?php

session_start();
include("includes/conexion.php");

$idpropuesta = $_GET['idpropuesta'];
$idusuario = $_SESSION['idusuarios'];

$query = "SELECT estado FROM propuesta WHERE idpropuesta = $idpropuesta";
$resultado = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
$inscritos = mysqli_fetch_array($resultado)[0];; 
print_r($inscritos);

$estado = $inscritos;

function nInscritos()
{
    include("includes/conexion.php");

    $idpropuesta = $_GET['idpropuesta'];

    $query = "SELECT * FROM usuarios_has_propuesta WHERE propuesta_idpropuesta ='$idpropuesta'";
    $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
    $numregistros = mysqli_num_rows($rsQuery);
    return $numregistros;

?>
<div class="container">


    <div class="alert alert-secondary mt-5" role="alert">
        <p>Numero de inscritos: <?php echo nInscritos() ?> </p>
    </div>

    <section class="charts">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="chart-container">
              <h3>Chart</h3>
              <div class="graficoLib">



                <div style="width: 100%">
                  <canvas id="canvas1" height="190" width="600"></canvas>
                </div>



                <script>
                  var randomScalingFactor = function() {
                    return Math.round(Math.random() * 100)
                  };

                  var medianaData = {
                    labels: ["Personas en el <?php echo $estado ?>", "Resto de Personas que no estan en <?php echo $estado ?>"],
                    datasets: [{
                      fillColor: "rgba(220,220,220,0.5)",
                      strokeColor: "rgba(220,220,220,0.8)",
                      highlightFill: "rgba(220,220,220,0.75)",
                      highlightStroke: "rgba(220,220,220,1)",
                      data: <?php

                                function estado()
                                {
                                    include("includes/conexion.php");

                                    global $estado;
                                    global $idpropuesta;

                                    $query = "SELECT * FROM usuarios_has_propuesta JOIN usuarios ON usuarios_has_propuesta.usuarios_idusuarios = usuarios.idusuarios JOIN propuesta ON usuarios_has_propuesta.propuesta_idpropuesta = propuesta.idpropuesta WHERE usuarios.estado = '$estado' AND propuesta.idpropuesta = '$idpropuesta'";
                                    $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                                    $numregistros = mysqli_num_rows($rsQuery);
                                    return $numregistros;
                                }

                                function noestado()
                                {
                                    include("includes/conexion.php");

                                    global $estado;
                                    global $idpropuesta;

                                    $query = "SELECT * FROM usuarios_has_propuesta JOIN usuarios ON usuarios_has_propuesta.usuarios_idusuarios = usuarios.idusuarios JOIN propuesta ON usuarios_has_propuesta.propuesta_idpropuesta = propuesta.idpropuesta WHERE usuarios.estado != '$estado' AND propuesta.idpropuesta = '$idpropuesta'";
                                    $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                                    $numregistros = mysqli_num_rows($rsQuery);
                                    return $numregistros;
                                }

                            ?>


                      [<?php echo estado() ?>, <?php echo noEstado() ?>]
                    }]

                  }
                  window.onload = function() {
                    var ctx = document.getElementById("canvas1").getContext("2d");
                    window.myBar = new Chart(ctx).Bar(medianaData, {
                      responsive: true
                    });
                  }
                </script>

              </div>
            </div>
          </div>
        </div>

        
      </div>
      </div>
    </section>
</div>



<?php include("includes/footer.php") ?>
<script src="js/direcciones.js"></script>

<script src="js/Chart.js"></script>

