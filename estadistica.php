<?php include("includes/headerTrabajador.php") ?>

<?php


include("includes/conexion.php");

$idpropuesta = $_GET['idpropuesta'];
$idusuario = $_SESSION['idusuarios'];

$query = "SELECT paisnombre FROM propuesta JOIN pais ON propuesta.idpais = pais.id WHERE idpropuesta = $idpropuesta";
$resultado = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
$inscritos = mysqli_fetch_array($resultado)[0];

$query5 = "SELECT educacion FROM propuesta WHERE idpropuesta = $idpropuesta";
$resultado5 = mysqli_query($conexion, $query5) or die(mysqli_error($conexion));
$educacion = mysqli_fetch_array($resultado5)[0];


$queryViajar = "SELECT viajes FROM propuesta WHERE idpropuesta = $idpropuesta";
$resultadoViajar = mysqli_query($conexion, $queryViajar) or die(mysqli_error($conexion));
$viajar = mysqli_fetch_array($resultadoViajar)[0];








$pais = $inscritos;


function nInscritos()
{
  include("includes/conexion.php");

  $idpropuesta = $_GET['idpropuesta'];

  $query = "SELECT * FROM usuarios_has_propuesta WHERE propuesta_idpropuesta ='$idpropuesta'";
  $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
  $numregistros = mysqli_num_rows($rsQuery);
  return $numregistros;
}

function coincideEducacion()
{
  include("includes/conexion.php");

  global $educacion;
  global $idpropuesta;

  $query = "SELECT * FROM usuarios_has_propuesta JOIN usuarios ON usuarios_has_propuesta.usuarios_idusuarios = usuarios.idusuarios JOIN propuesta ON usuarios_has_propuesta.propuesta_idpropuesta = propuesta.idpropuesta WHERE usuarios.educacion = '$educacion' AND propuesta.idpropuesta = '$idpropuesta'";
  $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
  $numregistros = mysqli_num_rows($rsQuery);
  return $numregistros;
}

function noEducacion()
{
  include("includes/conexion.php");

  global $educacion;
  global $idpropuesta;

  $query = "SELECT * FROM usuarios_has_propuesta JOIN usuarios ON usuarios_has_propuesta.usuarios_idusuarios = usuarios.idusuarios JOIN propuesta ON usuarios_has_propuesta.propuesta_idpropuesta = propuesta.idpropuesta WHERE usuarios.educacion != '$educacion' AND propuesta.idpropuesta = '$idpropuesta'";
  $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
  $numregistros = mysqli_num_rows($rsQuery);
  return $numregistros;
}

function viajarSi(){
  include("includes/conexion.php");

  global $viajar;
  global $idpropuesta;

  $query = "SELECT * FROM usuarios_has_propuesta JOIN usuarios ON usuarios_has_propuesta.usuarios_idusuarios = usuarios.idusuarios JOIN propuesta ON usuarios_has_propuesta.propuesta_idpropuesta = propuesta.idpropuesta WHERE usuarios.disponibilidadViajar = '$viajar' AND propuesta.idpropuesta = '$idpropuesta'";
  $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
  $numregistros = mysqli_num_rows($rsQuery);
  return $numregistros;
}

function viajarNo(){
  include("includes/conexion.php");
  global $viajar;
  global $idpropuesta;

  $query = "SELECT * FROM usuarios_has_propuesta JOIN usuarios ON usuarios_has_propuesta.usuarios_idusuarios = usuarios.idusuarios JOIN propuesta ON usuarios_has_propuesta.propuesta_idpropuesta = propuesta.idpropuesta WHERE usuarios.disponibilidadViajar != '$viajar' AND propuesta.idpropuesta = '$idpropuesta'";
  $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
  $numregistros = mysqli_num_rows($rsQuery);
  return $numregistros;
}

?>
<div class="container">

  
  <div class="alert alert-secondary mt-5" role="alert">
    <p>Numero de inscritos: <?php echo nInscritos() ?> </p> 
    <button class="btn btn-success" id="pdf">Descargar PDF</button>
  </div>

  <section class="charts" id="graficos"> 
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="chart-container">
            <h3>Estadisticas de Localizacion</h3>
            <div class="graficoLib">



              <div style="width: 100%">
                <canvas id="canvas1" height="190" width="600"></canvas>
              </div>



              <script>
                var randomScalingFactor = function() {
                  return Math.round(Math.random() * 100)
                };

                var medianaData = {
                  labels: ["Personas en <?php echo $pais ?>", "Resto de Personas que no estan en <?php echo $pais ?>"],
                  datasets: [{
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,0.8)",
                    highlightFill: "rgba(220,220,220,0.75)",
                    highlightStroke: "rgba(220,220,220,1)",
                    data: <?php

                          function pais()
                          {
                            include("includes/conexion.php");

                            global $pais;
                            global $idpropuesta;

                            $query = "SELECT * FROM usuarios_has_propuesta JOIN usuarios ON usuarios_has_propuesta.usuarios_idusuarios = usuarios.idusuarios JOIN propuesta ON usuarios_has_propuesta.propuesta_idpropuesta = propuesta.idpropuesta JOIN pais ON usuarios.idpais = pais.id WHERE pais.paisnombre = '$pais' AND propuesta.idpropuesta ='$idpropuesta'";
                            $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                            $numregistros = mysqli_num_rows($rsQuery);
                            return $numregistros;
                          }

                          function noPais()
                          {
                            include("includes/conexion.php");

                            global $pais;
                            global $idpropuesta;

                            $query = "SELECT * FROM usuarios_has_propuesta JOIN usuarios ON usuarios_has_propuesta.usuarios_idusuarios = usuarios.idusuarios JOIN propuesta ON usuarios_has_propuesta.propuesta_idpropuesta = propuesta.idpropuesta JOIN pais ON usuarios.idpais = pais.id WHERE pais.paisnombre != '$pais' AND propuesta.idpropuesta ='$idpropuesta'";;
                            $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                            $numregistros = mysqli_num_rows($rsQuery);
                            return $numregistros;
                          }

                          ?>


                    [<?php echo pais() ?>, <?php echo noPais() ?>]
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

      <div class="row">
        <div class="col-md-12">
          <div class="chart-container">
            <h3>Estadisticas de Educacion</h3>
            <div class="graficoLib">



              <div style="width: 100%">
                <canvas id="educacion" height="190" width="600"></canvas>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="chart-container">
            <h3>Estadisticas de Disponiblidad para Viajar</h3>
            <div class="graficoLib">



              <div style="width: 100%">
                <canvas id="viajar" height="190" width="600"></canvas>
              </div>

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

<script>
  var educacion = document.getElementById("educacion").getContext("2d");


  window.myBar = new Chart(educacion).Bar({
    labels: ["Personas que cumplen con el requerimiento de <?php echo $educacion ?>", "Personas que no cumplen con el requerimiento <?php echo $educacion; ?>"],
    datasets: [{
      fillColor: "#007bff",
      strokeColor: "rgba(220,220,220,0.8)",
      highlightFill: "rgba(220,220,220,0.75)",
      highlightStroke: "rgba(220,220,220,1)",
      data: [

        <?php echo coincideEducacion(); ?>,

        <?php echo noEducacion(); ?>


      ] //tiene que ser un arreglo
    }]
  }, {
    responsive: true
  });


  var viajar = document.getElementById("viajar").getContext("2d");


  window.myBar = new Chart(viajar).Bar({
    labels: ["Personas que cumplen con el requerimiento de NO viajar", "Personas que no cumplen con el requerimiento de viajar"],
    datasets: [{
      fillColor: "#007bff",
      strokeColor: "rgba(220,220,220,0.8)",
      highlightFill: "rgba(220,220,220,0.75)",
      highlightStroke: "rgba(220,220,220,1)",
      data: [

        <?php echo viajarSi(); ?>,

        <?php echo viajarNo(); ?>,

        


      ] //tiene que ser un arreglo
    }]
  }, {
    responsive: true
  });
</script>
<script src="js/generarPDF.js"></script>
<script src="js/direcciones.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
<script src="js/html2canvas.js"></script>
