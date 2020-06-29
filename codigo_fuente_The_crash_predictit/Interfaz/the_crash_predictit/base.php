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
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
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
    <a href="index.php" class="brand-link">
      <img src="car-crash.png" alt="Logo" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">The crash predictit</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


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
              <div class="" >
              <form action="buscar_datos.php" method="get" class="form_buscar">
                <input id="texto_buscar" type="text" name="buscar" class="form-control" placeholder="Buscar...">
                <input id="boton_buscar" type="submit" name="buscar_elemento" value="Enviar" class="btn btn-primary mb-2">
              </form>
              </div>
              <form action = "querys/eliminar_choques.php" method="post">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style = "width: 8%">Entidad</th>
                  <th style = "width: 5%">Municipio</th>
                  <th style = "width: 8%">Mes</th>
                  <th style = "width: 5%">Hora</th>
                  <th style = "width: 5%">Día</th>
                <!--  <th style = "width: 3%">Zona urbana</th>
                  <th style = "width: 3%">Zona sub-urbana</th>
                 <th>Minuto</th> -->

                  <th style = "width: 3%">Tipo del accidente</th>
                  <th style = "width: 3%">Causa del accidente</th>
                 <!-- <th>Año</th> -->
                 <!-- <th>Limite de velocidad</th> -->
                <!-- <th>Condición de la calle</th> -->
                 <th style = "width: 9%">Material de la calle </th>
                 <th style = "width: 3%">Sexo</th>
                 <th style = "width: 3%">Aliento alcohólico</th>
                  <th style = "width: 3%">Cinturón de seguridad</th> 
                 <th style = "width: 3%">Edad</th>

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

$consulta_contar = "SELECT COUNT(*) as total_registro FROM acci_base";

$resultado_contar = mysqli_query($conexion, $consulta_contar);
$resultado_de_registro = mysqli_fetch_array($resultado_contar);
$total_registro = $resultado_de_registro['total_registro'];

$por_pagina = 100;

if(empty($_GET['pagina'])){

  $pagina = 1;
}else{

  $pagina = $_GET['pagina'];
}

$desde = ($pagina-1) * $por_pagina;
$total_paginas = ceil($total_registro / $por_pagina);




$consulta = "SELECT * FROM acci_base LIMIT $desde,$por_pagina"; //Filtrado porque esta el where

$resultado = mysqli_query($conexion, $consulta);

  
while($fila = mysqli_fetch_array($resultado, MYSQLI_BOTH)){ 

echo "<tr>";
echo "<td>" . $fila["ID_ENTIDAD"] . "</td>";
echo '<td>' . $fila["ID_MUNICIPIO"] . "</td>";
echo '<td>' . $fila["MES"] . "</td>";
echo '<td>' . $fila["ID_HORA"] . "</td>";
echo '<td>' . $fila["ID_DIA"] . "</td>";
//echo '<td>' . $fila["URBANA"] . "</td>";
//echo '<td>' . $fila["SUBURBANA"] . "</td>";
//echo '<td>' . $fila["minutos"] . "</td>";
echo '<td>' . $fila["TIPACCID"] . "</td>";
echo '<td>' . $fila["CAUSAACCI"] . "</td>";
//echo '<td>' . $fila["ano"] . "</td>";
//echo '<td>' . $fila["velocidad"] . "</td>";
//echo '<td>' . $fila["condi_calle"] . "</td>";
echo '<td>' . $fila["CAPAROD"] . "</td>";
echo '<td>' . $fila["SEXO"] . "</td>";
echo '<td>' . $fila["ALIENTO"] . "</td>";
echo '<td>' . $fila["CINTURON"] . "</td>";
echo '<td>' . $fila["ID_EDAD"] . "</td>";
//echo '<td>' . $fila["numero"] . "</td>";
echo "</tr>";


}
     ?>

                

                </tbody>
                
              </table>
              </form>
              <?php
                  if ($total_registro != 0) 
                  {
                                    
                ?>
              <div class="paginado">
              <ul>
                 <?php
                  if ($pagina != 1) 
                  {
                                    
                ?>
              
                <li><a href="?pagina=<?php echo 1;?>">|<</a></li>
                <li><a href="?pagina=<?php echo $pagina - 1;?>"><<</a></li>
<?php
}
for($i=1; $i <= $total_paginas; $i++){

if ($i == $pagina) {
  if ($i > 10) {
    # code...
  }
//  echo '<li class = "pageSelected">' . $i . '</li>';
}else{

  //echo '<li><a href="?pagina='.$i.'">' . $i . '</a></li>';
}
}

if ($pagina != $total_paginas) {

?>


                <li><a href="?pagina=<?php echo $pagina + 1;?>">>></a></li>
                <li><a href="?pagina=<?php echo $total_paginas;?>">>|</a></li>
<?php
} 
?>
              </ul>                

              </div>
                            <?php
        }
              ?>
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
    <strong><a href="index.php">The crash predictit</a>.</strong>

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
