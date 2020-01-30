<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
  <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
  <?php
  session_start();
  include("includes/conexion.php");

  function nPostulados()
  {
    include("includes/conexion.php");
    $idempresa = $_SESSION['idempresa'];
    $query = "SELECT * FROM usuarios_has_propuesta JOIN propuesta ON usuarios_has_propuesta.propuesta_idpropuesta = propuesta.idpropuesta JOIN empresa ON propuesta.empresa_idempresa = empresa.idempresa WHERE empresa.idempresa = '$idempresa'";

    $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
    $numregistros = mysqli_num_rows($rsQuery);
    return $numregistros;
  }


  function trabajosPublicados()
  {
    include("includes/conexion.php");

    $idempresa = $_SESSION['idempresa'];

    $query = "SELECT * FROM propuesta WHERE empresa_idempresa = '$idempresa'";
    $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
    $numregistros = mysqli_num_rows($rsQuery);
    return $numregistros;
  }

  ?>
  <aside class="side-nav" id="show-side-navigation1">
    <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>


    <ul class="categories">

      <li id="controlPanel"> <i class="fas fa-solar-panel"></i> Panel de Control </li>

      <li id="publicar"> <i class="fas fa-briefcase"></i> Publicar </li>

      <li id="mistrabajos"> <i class="fas fa-briefcase"></i> Mis Publicaciones </li>


      <li id="perfilEmpresa"> <i class="fa fa-user-o fw"></i> Perfil</li>

      <li id="salir"> <i class="fa fa-sign-out"></i> Salir</li>

    </ul>
  </aside>
  <section id="contents">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <i class="fa fa-align-right"></i>
          </button>
          <a class="navbar-brand" href="#">Bolsa<span class="main-color">Trabajo</span></a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Mi Cuenta <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="perfilEmpresa.php"><i class="fa fa-user-o fw"></i> Mi Perfil</a></li>

                <li role="separator" class="divider"></li>
                <li><a href="includes/logout.php"><i class="fa fa-sign-out"></i>Salir</a></li>
              </ul>
            </li>

            <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Notificaciones <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <?php

                  while ($row = mysqli_fetch_array($resultado)) {
                    echo "<li class='mt-2 list-group-item list-group-item-success'> La empresa " . $row['nombreEmpresa'] . " Ha visto tu CV </li>";
                  }

                  ?>
                </ul>
              </li> -->

            <li><a href="#"><i data-show="show-side-navigation1" class="fa fa-bars show-side-btn"></i></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="welcome">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="content">
              <h2>Bienvenido</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="statistics">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="box">
              <i class="fa fa-envelope fa-fw bg-primary"></i>
              <div class="info">
                <h3> <?php echo trabajosPublicados() ?> </h3> <span>Trabajos</span>
                <p>Tus ofertas publicadas</p>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="box">
              <i class="fa fa-users fa-fw success"></i>
              <div class="info">
                <h3> <?php echo nPostulados() ?> </h3> <span>Postulados</span>
                <p>Numero de inscritos a tus ofertas de trabajo</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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
                    labels: ["Empresas", "Trabajos", "Usuarios"],
                    datasets: [{
                      fillColor: "rgba(220,220,220,0.5)",
                      strokeColor: "rgba(220,220,220,0.8)",
                      highlightFill: "rgba(220,220,220,0.75)",
                      highlightStroke: "rgba(220,220,220,1)",
                      data: <?php

                            function empresas()
                            {
                              include('includes/conexion.php');
                              $query = "SELECT * FROM empresa";
                              $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                              $numregistros = mysqli_num_rows($rsQuery);
                              return $numregistros;
                            }

                            function trabajos()
                            {
                              include('includes/conexion.php');
                              $query = "SELECT * FROM propuesta";
                              $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                              $numregistros = mysqli_num_rows($rsQuery);
                              return $numregistros;
                            }

                            function usuarios()
                            {
                              include('includes/conexion.php');
                              $query = "SELECT * FROM usuarios";
                              $rsQuery = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                              $numregistros = mysqli_num_rows($rsQuery);
                              return $numregistros;
                            }
                            ?>


                      [<?php echo empresas() ?>, <?php echo trabajos() ?>, <?php echo usuarios() ?>]
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

  </section>
  <script src='http://code.jquery.com/jquery-latest.js'></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
  <script src='js/db.js'></script>
  <script src="js/Chart.js"></script>
  <script src="js/Chart.Doughnut.js"></script>
  <script src="js/direccionesEmpresa.js"></script>
</body>

</html>