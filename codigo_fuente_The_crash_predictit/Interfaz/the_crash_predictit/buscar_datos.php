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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

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
              <div class="" >

<?php
$buscar =  strtolower($_GET["buscar"]);

if (empty($buscar)) {
	header("Location: mostrar_datos.php");
}

     
include ("querys/bd.php");



$conexion = mysqli_connect($direccion, $usuario, $contraseña, $bd); // Podemos omitir el ultimo argumento (nombre de la BD)

if(mysqli_connect_errno()){ 
  
  echo "Fallo al conectar la BD ";
  exit();
  
}
mysqli_set_charset($conexion, "uft8"); 

$consulta_contar = "SELECT COUNT(*) as total_registro FROM acci_usu  WHERE tipo_calle1 LIKE '%$buscar%' OR calle1 LIKE '%$buscar%' OR tipo_calle2 LIKE '%$buscar%' OR calle2 LIKE '%$buscar%' OR clima LIKE '%$buscar%' OR luz LIKE '%$buscar%' OR hora LIKE '%$buscar%' OR minutos LIKE '%$buscar%' OR dia LIKE '%$buscar%' OR mes LIKE '%$buscar%' OR ano LIKE '%$buscar%' OR ano LIKE '%$buscar%' OR velocidad LIKE '%$buscar%' OR condi_calle LIKE '%$buscar%' OR tipo_vehiculo1 LIKE '%$buscar%' OR  tipo_vehiculo2 LIKE '%$buscar%' OR gravedad LIKE '%$buscar%' OR sexo LIKE '%$buscar%' OR ali_alcoho LIKE '%$buscar%' OR cintu_segu LIKE '%$buscar%' OR edad LIKE '%$buscar%'";

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




$consulta = "SELECT * FROM acci_usu WHERE tipo_calle1 LIKE '%$buscar%' OR calle1 LIKE '%$buscar%' OR tipo_calle2 LIKE '%$buscar%' OR calle2 LIKE '%$buscar%' OR clima LIKE '%$buscar%' OR luz LIKE '%$buscar%' OR hora LIKE '%$buscar%' OR minutos LIKE '%$buscar%' OR dia LIKE '%$buscar%' OR mes LIKE '%$buscar%' OR ano LIKE '%$buscar%' OR ano LIKE '%$buscar%' OR velocidad LIKE '%$buscar%' OR condi_calle LIKE '%$buscar%' OR tipo_vehiculo1 LIKE '%$buscar%' OR  tipo_vehiculo2 LIKE '%$buscar%'OR gravedad LIKE '%$buscar%' OR sexo LIKE '%$buscar%' OR ali_alcoho LIKE '%$buscar%' OR cintu_segu LIKE '%$buscar%' OR edad LIKE '%$buscar%' LIMIT $desde,$por_pagina";

$resultado = mysqli_query($conexion, $consulta);

  
?>

              <form action="buscar_datos.php" method="get" class="form_buscar">
                <input id="texto_buscar" type="text" name="buscar" class="form-control" placeholder="Buscar..." value="<?php echo $buscar;?>">
                <input id="boton_buscar" type="submit" name="buscar_elemento" value="Enviar" class="btn btn-primary mb-2">
              </form>
              </div>
              <form action = "querys/eliminar_choques.php" method="post">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style = "width: 8%">Tipo de calle 1</th>
                  <th style = "width: 5%">Calle 1</th>
                  <th style = "width: 8%">Tipo de calle 2</th>
                  <th style = "width: 5%">Calle 2</th>
                  <th style = "width: 5%">Clima</th>
                  <th style = "width: 3%">Iluminación</th>
                  <th style = "width: 3%">Hora</th>
               <!--   <th>Minuto</th> -->

                  <th style = "width: 3%">Día</th>
                  <th style = "width: 3%">Mes</th>
                 <!-- <th>Año</th> -->
                 <!-- <th>Limite de velocidad</th> -->
                <!-- <th>Condición de la calle</th> -->
                 <th style = "width: 9%">Tipo de vehículo 1</th>
                 <th style = "width: 9%">Tipo de vehículo 2</th>
                 <th style = "width: 3%">Gravedad</th>
                 <!--<th style = "width: 3%">Sexo</th> -->
                  <th style = "width: 3%">Aliento alcohólico</th> 
                 <th>Cinturón de seguridad</th>
                  <th style = "width: 3%">Edad</th>

          <th style = "width: 3%">Editar</th>
                  <th style = "width: 3%">Eliminar</th>
                </tr>
                </thead>
                <tbody>


<?php

while($fila = mysqli_fetch_array($resultado, MYSQLI_BOTH)){ //Est es la mejor manera para ver todos los registros de un array asosiativo 
                      //mysqli_fetch_array = Necesita 2 parametros (resultado y )>
echo "<tr>";
echo "<td>" . $fila["tipo_calle1"] . "</td>";
echo '<td>' . $fila["calle1"] . "</td>";
echo '<td>' . $fila["tipo_calle2"] . "</td>";
echo '<td>' . $fila["calle2"] . "</td>";
echo '<td>' . $fila["clima"] . "</td>";
echo '<td>' . $fila["luz"] . "</td>";
echo '<td>' . $fila["hora"] . "</td>";
//echo '<td>' . $fila["minutos"] . "</td>";
echo '<td>' . $fila["dia"] . "</td>";
echo '<td>' . $fila["mes"] . "</td>";
//echo '<td>' . $fila["ano"] . "</td>";
//echo '<td>' . $fila["velocidad"] . "</td>";
//echo '<td>' . $fila["condi_calle"] . "</td>";
echo '<td>' . $fila["tipo_vehiculo1"] . "</td>";
echo '<td>' . $fila["tipo_vehiculo2"] . "</td>";
echo '<td>' . $fila["gravedad"] . "</td>";
//echo '<td>' . $fila["sexo"] . "</td>";
echo '<td>' . $fila["ali_alcoho"] . "</td>";
echo '<td>' . $fila["cintu_segu"] . "</td>";
echo '<td>' . $fila["edad"] . "</td>";

echo "<td><a class = '' href = 'querys/editar.php?id=" .  $fila["id"] . "'><i class='far fa-edit'></i></a></td>";
echo "<td><input class = '' type = 'checkbox' name = 'eliminar[]' value = '" . $fila['id'] . "'/></td>";

//echo '<td>' . $fila["numero"] . "</td>";
echo "</tr>";
}
     ?>

                

                </tbody>
                
              </table>
              <input  onclick="reload" type="submit" name="borrar" value="eliminar_registrsos"  class="btn btn-danger" style="margin-top: 5px;" />
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
              
                <li><a href="?pagina=<?php echo 1; ?>&buscar=<?php echo $buscar; ?>">|<</a></li>
                <li><a href="?pagina=<?php echo $pagina - 1;?>&buscar=<?php echo $buscar; ?>"><<</a></li>
<?php
}
for($i=1; $i <= $total_paginas; $i++){

if ($i == $pagina) {
  echo '<li class = "pageSelected">' . $i . '</li>';
}else{

  echo '<li><a href="?pagina='. $i .'&buscar=' . $buscar . '">' . $i . '</a></li>';
}
}
	if ($pagina != $total_paginas) {
	
?>

                <li><a href="?pagina=<?php echo $pagina + 1;?>&buscar=<?php echo $buscar; ?>">>></a></li>
                <li><a href="?pagina=<?php echo $total_paginas;?>&buscar=<?php echo $buscar; ?>">>|</a></li>
<?php
}	
?>
              </ul>                

              </div>
              <?php
				}
              ?>
            </div>
          </div>
  </div>
<?php
}else{
    header("Location: index.html");
}

?>


  <footer class="main-footer" style="width: 70%">
    <strong><a href="index.php">The crash predictit</a>.</strong>

  </footer>


</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>

</body>
</html>
