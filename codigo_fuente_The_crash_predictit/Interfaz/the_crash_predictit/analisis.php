+++<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>The crash predictit</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="car-crash.png" alt="Logo" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">The crash predictit</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->

<?php
if (isset($_SESSION["user"]) && $_SESSION["user"] != "" ) {
  

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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Análisis sobre los datos obtenidos</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

         <div class="form-group" id = "pru">
    <label>Que información deseas ver?</label>
    <select class="form-control" id="pru2">
      <option value="" selected>Selecciona una opción</option>
      <option value="graficas/graficaBarrasEstados.png" data-price= "Gráfica de barras de estados de México" title="Se comparo la cantidad de choques entre las entidad y la entidad con más choques es Nuevo Leon en el cual en la gráfica es el número 19">Gráfica de barras de estados de México</option>
      <option value="graficas/graficaBarrasGenero.png" data-price = "Gráfica de barras por genero" title="Se comparo la cantidad total de accidentes entre hombres y muneres y se puede apreciar que el genero que tiene más accidentes son los hombres, claro que también son más hombres lo que conducen">Gráfica de barras por genero</option>
      <option value="graficas/histogramaHora.png" data-price = "Histograma por hora" title="Se comparo la cantidad total de choques entre las horas y la hora que más se frecuentas choques es a las 3">Histograma por hora</option>
      <option value="graficas/fatales_dia.png" data-price = "Relación de accidentes fatales por día" title="Se hizo una relación entre la clasificación de accidentes y los días para así demostrar que el día 20 es el más freceunte en choques con casos fatales (alguien murio en el accidentes)">Relación de accidentes fatales por día</option>
      <option value="graficas/fatales_entidad.png" data-price = "Relación de accidentes fatales por entidad" title="Se hizo una relación entre la clasificación de accidentes y las entidades para así demostrar que Chihuhua es el más freceunte en choques con casos fatales (alguien murio en el accidentes)">Relación de accidentes fatales por entidad</option>
      <option value="graficas/fatales_edad.png" data-price = "Relación de accidentes fatales por edad" title="Se hizo una relación entre la clasificación de accidentes y las edades para así demostrar que la edad de 18 años es la más freceunte en choques con casos fatales (alguien murio en el accidentes)">Relación de accidentes fatales por edad</option>
      <option value="graficas/fatales_hora.png" data-price = "Relación de accidentes fatales por hora" title="Se hizo una relación entre la clasificación de accidentes y las horas para así demostrar que a las 18 horas más freceunte en choques con casos fatales (alguien murio en el accidentes)">Relación de accidentes fatales por hora</option>
    </select>
  </div>

  </div>
       
    <div class="col-lg-12">
            
            <div class="card card-info">
              <div class="card-header"> 
                <h3 class="card-title" id="card-title">Graficas</h3>

               
              </div>
             <center>
              <div class="card-body form-inline">
                <p class="col-lg-4" id="prueba"  style="text-align: justify; padding-bottom: 200px; "></p>
          <img class = "col-lg-7 ml-md-auto" src="graficas/fatales_dia.png" id = "graf" style="height:350px; width: 35s0px; border: 1px solid black;">

          </center>

              </div>
            </div>

      
            </div>
            </div>

  </div>
  <footer class="main-footer" style="width: 70%">
    <strong><a href="index.php">The crash predictit</a>.</strong>

  </footer>


</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="js/buscar_grafica.js"></script>
</body>
</html>
