<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Panel De Control</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
  </head>
  <body>
    <aside class="side-nav" id="show-side-navigation1">
      <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
      
      
      <ul class="categories">
        <li><i class="fa fa-home fa-fw" aria-hidden="true"></i><a href="#"> About us</a>
          <ul class="side-nav-dropdown">
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">ipsum dolor</a></li>
            <li><a href="#">dolor ipsum</a></li>
            <li><a href="#">amet consectetur</a></li>
            <li><a href="#">ipsum dolor sit</a></li>
          </ul>
        </li>
        <li><i class="fa fa-support fa-fw"></i><a href="#"> Subscribe us</a>
          <ul class="side-nav-dropdown">
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">ipsum dolor</a></li>
            <li><a href="#">dolor ipsum</a></li>
            <li><a href="#">amet consectetur</a></li>
            <li><a href="#">ipsum dolor sit</a></li>
          </ul>
        </li>
        <li><i class="fa fa-envelope fa-fw"></i><a href="#"> Contact us</a>
          <ul class="side-nav-dropdown">
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">ipsum dolor</a></li>
            <li><a href="#">dolor ipsum</a></li>
            <li><a href="#">amet consectetur</a></li>
            <li><a href="#">ipsum dolor sit</a></li>
          </ul>
        </li>
        <li><i class="fa fa-users fa-fw"></i><a href="#"> Our team</a>
          <ul class="side-nav-dropdown">
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">ipsum dolor</a></li>
            <li><a href="#">dolor ipsum</a></li>
            <li><a href="#">amet consectetur</a></li>
            <li><a href="#">ipsum dolor sit</a></li>
          </ul>
        </li>
        <li><i class="fa fa-bolt fa-fw"></i><a href="#"> Testimonials</a>
          <ul class="side-nav-dropdown">
            <li><a href="#">Lorem ipsum</a></li>
            <li><a href="#">ipsum dolor</a></li>
            <li><a href="#">dolor ipsum</a></li>
            <li><a href="#">amet consectetur</a></li>
            <li><a href="#">ipsum dolor sit</a></li>
          </ul>
        </li>
        
      </ul>

    <section class="d-flex justify-content-center fixed-button">
      <button class="btn btn-primary">Descargar Reporte</button>
    </section>

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
                  <li><a href="#"><i class="fa fa-user-o fw"></i> Mi Perfil</a></li>
                  <li><a href="#"><i class="fa fa-envelope-o fw"></i></a></li> 
                  <li role="separator" class="divider"></li>
                  <li><a href="includes/logout.php"><i class="fa fa-sign-out"></i> salir</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-comments"></i><span>23</span></a></li>
              <li><a href="#"><i class="fa fa-bell-o"></i><span>98</span></a></li>
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
                <h2 class="text-center">Estadísticas Generales</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="statistics">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <div class="box h-100">
                <i class="fa fa-envelope fa-fw bg-primary"></i>
                <div class="info">
                  <h3 id="numEmpresas"></h3> <span>Empresas</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box h-100"> 
                <i class="fa fa-file fa-fw danger"></i>
                <div class="info">
                  <h3 id="numOfertas"></h3> <span>Ofertas de Trabajo</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box h-100">
                <i class="fa fa-users fa-fw success"></i>
                <div class="info">
                  <h3 id="numTrabajadores"></h3> <span>Trabajadores</span>
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
                <div class="row">
                <div class="col-4">
			            <canvas id="canvas1" class="w-100"></canvas>
                </div>

                <div class="col-4">
			            <canvas id="canvas2" class="w-100"></canvas>
                </div>

                <div class="col-4">
			            <canvas id="canvas3" class="w-100"></canvas>
                </div>
                </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </section> 

      <!--Estadisticas de educacion-->

      <div class="welcome">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="content">
                <h2 class="text-center">Estadisticas de Nivel de Educación</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="statistics">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <div class="box h-100">
                <i class="fa fa-envelope fa-fw bg-primary"></i>
                <div class="info">
                  <h3 id="numBachiller"></h3> <span>Bachilleres</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box h-100"> 
                <i class="fa fa-file fa-fw danger"></i>
                <div class="info">
                  <h3 id="numTecnicoMedio"></h3> <span>Técnicos Medios</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box h-100">
                <i class="fa fa-users fa-fw success"></i>
                <div class="info">
                  <h3 id="numTSU"></h3> <span>Técnicos Superiores Universitarios</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 mt-4">
              <div class="box h-100">
                <i class="fa fa-users fa-fw success"></i>
                <div class="info">
                  <h3 id="numUniversitario"></h3> <span>Universitarios</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class=charts>
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="chart-container">
                <h3>Nivel de Educación</h3>
                <div class="graficoLib">

                <div>
			            <canvas id="canvasEducacion"></canvas>
                </div>

                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </section>

      <!--Estadisticas Sueldos-->
      <div class="welcome">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="content">
                <h2 class="text-center">Estadisticas de Sueldos de las Postulaciones</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="statistics">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
              <div class="box h-100">
                <i class="fa fa-envelope fa-fw bg-primary"></i>
                <div class="info">
                  <h3 id="numSueldo1"></h3> <span>0 - 50$</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box h-100"> 
                <i class="fa fa-file fa-fw danger"></i>
                <div class="info">
                  <h3 id="numSueldo2"></h3> <span>50$ - 100$</span>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box h-100">
                <i class="fa fa-users fa-fw success"></i>
                <div class="info">
                  <h3 id="numSueldo3"></h3> <span>100$ o más</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class=charts>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="chart-container">
                <h3>Nivel de Sueldo</h3>
                <div class="graficoLib">

                  <div>
			              <canvas id="canvasSueldo"></canvas>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!--Estadisticas de Localizacion-->
      <div class="welcome">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="content">
                <h2 class="text-center">Indice de Carrera más Demandada</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="statistics">
        <div class="container-fluid">
          <div class="row" id="carreras">

          </div>
        </div>
      </section>
      <section class=charts>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="chart-container">
                <h3>Nivel de Sueldo</h3>
                <div class="graficoLib">

                  <div>
			              <canvas id="canvasCarreras"></canvas>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script src="js/jquery-3.3.1.min.js"></script>
      <script src='http://code.jquery.com/jquery-latest.js'></script>
      <script src="js/bootstrap.min.js"></script>
      
      <script src='js/db.js'></script>
      <script src="js/Chart.js"></script>
      <script src="js/Chart.Doughnut.js"></script>
      <script src="js/panelesControl/panelAdmin.js"></script>
      </body>
    </html>
