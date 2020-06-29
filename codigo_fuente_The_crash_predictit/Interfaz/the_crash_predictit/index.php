<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>The crash predictit</title>

  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="car-crash.png" alt="Logo" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">The crash predictit</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

<?php
if (isset($_SESSION["user"]) && $_SESSION["user"] != "" ) {
  

?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<li class="nav-item has-treeview">
      <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p> Inicio </p>
            </a>
        </li>
            <li class="nav-item has-treeview">
     <a href="mostrar_datos.php" class="nav-link">
              <i class="nav-icon far fa-sticky-note"></i>
              <p> Datos </p>
            </a>
        </li>
              <li class="nav-item has-treeview">
     <a href="base.php" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p> Base </p>
            </a>
        </li>
            <li class="nav-item has-treeview">
     <a href="analisis.php" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p> Análisis </p>
            </a>
        </li>
            <li class="nav-item has-treeview">
 <a href="Formulario.php" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              <p> Formulario </p>
            </a>
        </li>

        <li class="nav-item has-treeview">
  <a href="querys/cerrar_sesion.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p> Cerrar sesión </p>
            </a>
        </li>

          </li>
        </ul>
      </nav>

<?php
}else{

  ?>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

<li class="nav-item has-treeview">
      <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p> Inicio </p>
            </a>
        </li>
            <li class="nav-item has-treeview">
     <a href="analisis.php" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p> Análisis </p>
            </a>
        </li>
            <li class="nav-item has-treeview">
 <a href="Formulario.php" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              <p> Formulario </p>
            </a>
        </li>

          </li>
        </ul>
      </nav>


<?php
}
?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="encabezado">
      <div class="ima">
    <img src="logo2.png" style=" width: 100%; height: 100%;" >
      </div>

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

         <div class="form-group" id = "pru">
    <label for="exampleFormControlSelect1">Que información deseas ver?</label>
    <select class="form-control" id="pru2">
      <option value="" selected>Selecciona una opción</option>
      <option value="graficas/cm.JPG" data-price= "Gráfica de clasificación" title="Cada columna representa el número de predicciones de cada clase, miestras que cada fila representa a las instancias en clase real (predección valores valor real)">Matriz de confusión</option>
      <option value="graficas/confusionMatrix.JPG" data-price = "Reporte de clasificación"  title="Reporte compuesto por las principáles metricas de clasificación; precisión, sensibilidad y F1 score.">Reporte de clasificación</option>
    </select>
  </div>

  </div>
       
    <div class="col-lg-12">


            
            <div class="card card-info">
              <div class="card-header"> 
                <h3 class="card-title" id="card-title">Modelos</h3>

              </div>
             <center>
              <div class="card-body form-inline">
                <p class="col-lg-4" id="prueba" style="text-align: justify; padding-bottom: 200px; "></p>
          <img class = "col-lg-7 ml-md-auto" src="graficas/cm.JPG" id = "graf" style="height:350px; width: 350px; border: 1px solid black;">

          </center>

              </div>
            </div>

            </div>

  </div>
  <footer class="main-footer" style="width: 70%">
    <strong><a href="index.php">The crash predictit</a>.</strong>

  </footer>

</div>

<link rel="stylesheet" type="text/css" href="css/paginado.css">
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="js/buscar_grafica.js"></script>
</body>
</html>
