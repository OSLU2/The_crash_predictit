<?php
session_start();
if (isset($_SESSION["user"]) && $_SESSION["user"] != "" ) {
  

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>The crash predictit</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/paginado.css">

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
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="choque-accidente-herido-volcadura-vuelca.png" alt="Logo" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">The crash predictit</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
           <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item has-treeview">
      <a href="index.html" class="nav-link">
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
     <a href="analisis.html" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p> Análisis </p>
            </a>
        </li>
            <li class="nav-item has-treeview">
 <a href="Formulario.html" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              <p> Formulario </p>
            </a>
        </li>
            <li class="nav-item has-treeview">
 <a href="#" class="nav-link">
              <i class="nav-icon fas fa-map-marker-alt"></i>
              <p> Mapa </p>
            </a>
        </li>
  </li>
            </ul>
          </li>

          </li>
        </ul>
      </nav>
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
            <h1 class="m-0 text-dark">Datos</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Información ingresada por el usuario</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action = "querys/eliminar_choques.php" method="post">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tipo de calle 1</th>
                  <th>Calle 1</th>
                  <th>Tipo de calle 2</th>
                  <th>Calle 2</th>
                  <th>Clima</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>


<?php
     
include ("querys/bd.php");



$conexion = mysqli_connect($direccion, $usuario, $contraseña, $bd); // Podemos omitir el ultimo argumento (nombre de la BD)

if(mysqli_connect_errno()){ 
  
  echo "Fallo al conectar la BD ";
  exit();
  
}
mysqli_set_charset($conexion, "uft8"); 

$consulta_contar = "SELECT COUNT(*) as total_registro FROM usuario";

$resultado_contar = mysqli_query($conexion, $consulta_contar);
$resultado_de_registro = mysqli_fetch_array($resultado_contar);
$total_registro = $resultado_de_registro['total_registro'];

$por_pagina = 2;

if(empty($_GET['pagina'])){

  $pagina = 1;
}else{

  $pagina = $_GET['pagina'];
}

$desde = ($pagina-1) * $por_pagina;
$total_paginas = ceil($total_registro / $por_pagina);




$consulta = "SELECT * FROM usuario LIMIT $desde,$por_pagina"; //Filtrado porque esta el where

$resultado = mysqli_query($conexion, $consulta);

  
while($fila = mysqli_fetch_array($resultado, MYSQLI_BOTH)){ //Est es la mejor manera para ver todos los registros de un array asosiativo 
                      //mysqli_fetch_array = Necesita 2 parametros (resultado y )>
echo "<tr>";
echo "<td>" .$fila["nombre"] . "</td>";
echo '<td>' . $fila["numero"] . "</td>";
echo '<td>' . "</td>";
echo '<td>' . "</td>";
echo '<td>' . "</td>";

echo "<td><a class = ''href = '#'><i class='far fa-edit'></i></a></td>";
echo "<td><input class = '' type = 'checkbox' name = 'eliminar[]' value = '" . $fila['nombre'] . "'/></td>";

//echo '<td>' . $fila["numero"] . "</td>";
echo "</tr>";
}
     ?>

                

                </tbody>
                
              </table>
              <input  onclick="reload" type="submit" name="borrar" value="eliminar_registrsos"  class="btn btn-danger" style="margin-top: 5px;" />
              </form>
              <div class="paginado">
              <ul>
                <li><a href="?pagina=<?php echo 1;?>">|<</a></li>
                <li><a href="?pagina=<?php echo $pagina - 1;?>"><<</a></li>
<?php

for($i=1; $i <= $total_paginas; $i++){

if ($i == $pagina) {
  echo '<li class = "pageSelected">' . $i . '</li>';
}else{

  echo '<li><a href="?pagina='.$i.'">' . $i . '</a></li>';
}
}

?>

                <li><a href="?pagina=<?php echo $pagina + 1;?>">>></a></li>
                <li><a href="?pagina=<?php echo $total_paginas;?>">>|</a></li>

              </ul>                

              </div>
            </div>
            <!-- /.card-body -->
          </div>
    <!-- /.content -->
  </div>
<?php
}else{
    header("Location: index.html");
}

?>


  <!-- /.content-wrapper -->
  <footer class="main-footer" style="width: 70%">
    <strong>Copyright &copy; 2019 <a href="http://adminlte.io">The crash predictit</a>.</strong>

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
