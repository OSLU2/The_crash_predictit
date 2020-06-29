<?php
session_start();

date_default_timezone_set("America/Mexico_City");
$dia=date("d");
$mes=date("m");
$ano=date("y");
$hora=date("H");
$minu=date("i")
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

<?php
if (isset($_SESSION["user"]) && $_SESSION["user"] != "" ) {
  

?>      <!-- Sidebar Menu -->
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
            <h1 class="m-0 text-dark">Ingresa la información del accidente</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="col-md-12">
    <div class="card col-md-12">

<form action="querys/insertar_choque.php" method="post">
  
<!--  <div class="form-group">
    <label for="exampleFormControlInput1">Tipo de calle</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Ejem. Rojo, Azul, Amarillo">
  </div>-->

  <div class="form-group">
    <label>Tipo de calle 1</label>
    <select class="form-control" id="nombre" name="tipo_calle1">
      <option value="" selected>Selecciona una opción</option>
      <option value="Avenida">Avenida</option>
      <option value="Calle">Calle</option>
      <option value="Callejon">Callejón</option>
      <option value="Carretera">Carretera</option>
      <option value="Ciclovia">Ciclovía</option>
      <option value="Tunel">Túnel</option>

    </select>
  </div>
  <div class="form-group">

 <label>Nombre de calle 1 </label>

<input type="text" list="calle" class="form-control" name="calle1">
</div>
    <div class="form-group">
    <label>Tipo de calle 2</label>
    <select class="form-control" id="nombre" name="tipo_calle2">
      <option value="" selected>Selecciona una opción</option>
      <option value="Avenida"  >Avenida</option>
      <option value="Calle">Calle</option>
      <option value="Callejon">Callejón</option>
      <option value="Carretera">Carretera</option>
      <option value="Ciclovia">Ciclovía</option>
      <option value="Tunel">Túnel</option>

    </select>
  </div>

    <div class="form-group">

 <label>Nombre de calle 2 </label>

<input type="text" list="calle" class="form-control" name="calle2">
</div>



<input type="hidden" name="dia" value="<?php echo $dia; ?>">

<input type="hidden" name="mes" value="<?php echo $mes; ?>">

<input type="hidden" name="ano" value="<?php echo $ano; ?>">

<input type="hidden" name="hora" value="<?php echo $hora; ?>">

<input type="hidden" name="minu" value="<?php echo $minu; ?>">

  <div class="form-group">
    <label>Sexo</label>
    <select class="form-control" id="nombre" name="sexo">
      <option value="" selected>Selecciona una opción</option>
      <option value="hombre" >Hombre</option>
      <option value="mujer">Mujer</option>
      <option value="se_ignora">Se ignora</option>
    </select>
  </div>

  <div class="form-group">
    <label>Edad</label>
    <select class="form-control" id="nombre" name="edad">
      <option value="" selected>Selecciona una opción</option>
      <?php 
$edad = 90;

for ($i=15; $i < $edad; $i++) { 

echo '<option value="' . $i . '">' . $i . '</option>';
}


       ?>
      <option value="0">Se ignora</option>
    </select>
  </div>

  <div class="form-group">
    <label>Cinturon de seguridad</label>
    <select class="form-control" id="nombre" name="cinturon">
      <option value="" selected>Selecciona una opción</option>
      <option value="Si" >Si</option>
      <option value="No">No</option>
      <option value="se_ignora">Se ignora</option>
    </select>
  </div>

    <div class="form-group">
    <label>Aliento alcohólico</label>
    <select class="form-control" id="nombre" name="alcohol">
      <option value="" selected>Selecciona una opción</option>
      <option value="Si" >Si</option>
      <option value="No">No</option>
      <option value="se_ignora">Se ignora</option>
    </select>
  </div>

  <div class="form-group">
    <label>Clima</label>
    <select class="form-control" id="numero" name="clima">
      <option>Selecciona una opción</option>
      <option value="Lluvia">Lluvia</option>
      <option value="Granizo">Granizo</option>
      <option value="Neblina">Neblina</option>
      <option value="Nublado">Nublado</option>
      <option value="Soleado">Soleado</option>
      <option value="Fuertes vientos">Fuertes vientos</option>
      <option value="Clima neutro">Despejado</option>
    </select>
  </div>

  <div class="form-group">
    <label>Condiciones de Luz</label>
    <select class="form-control" id="numero" name="luz">
      <option>Selecciona una opción</option>
      <option value="Iluminado">Iluminado</option>
      <option value="Oscuro">Oscuro</option>
    </select>
  </div>


    <div class="form-group">
    <label>Velocidad máxima</label>
    <select class="form-control" id="nombre" name="velocidad">
      <option value="" selected>Selecciona una opción</option>
      <option value="lento" >0 a 40 KM por hora</option>
      <option value="medio">41 a 60 KM por hora</option>
      <option value="alto" >61 a 80 KM por hora</option>
      <option value="maximo">Más de 81 KM por hora</option>
      <option value="se_ignora">Se ignora</option>
    </select>
  </div>

    <div class="form-group">
    <label>Condición de la calle</label>
    <select class="form-control" id="nombre" name="condi_calle">
      <option value="" selected>Selecciona una opción</option>
      <option value="buenas" >Sin problemas</option>
      <option value="malas">Malas condiciones</option>
      <option value="se_ignora">Se ignora</option>
    </select>
  </div>

      <div class="form-group">
    <label>Cuantos vehículos estuvieron involucrados</label>
    <select class="form-control" id="nombre" name="cantidad_vehiculo">
      <option value="" selected>Selecciona una opción</option>
      <option value="buenas" >1</option>
      <option value="malas">2</option>
      <option value="se_ignora">Más vehículos</option>
    </select>
  </div>

    <div class="form-group">
    <label>Tipo de vehículo 1</label>
    <select class="form-control" id="nombre" name="tipo_vehi1">
      <option value="" selected>Selecciona una opción</option>
      <option value="automovil" >Automóvil</option>
      <option value="camion_pasajeros">Camión de pasajeros</option>
      <option value="camioneta" >Camioneta</option>
      <option value="camion">Camión</option>
      <option value="motocicleta" >Motocicleta</option>
      <option value="bicicleta">Bicicleta</option>
      <option value="otro">Otro vehículo</option>
      <option value="se_ignora">Se ignora</option>
    </select>
  </div>

      <div class="form-group">
    <label>Tipo de vehículo 2</label>
    <select class="form-control" id="nombre" name="tipo_vehi2">
      <option value="" selected>Selecciona una opción</option>
      <option value="automovil" >Automóvil</option>
      <option value="camion_pasajeros">Camión de pasajeros</option>
      <option value="camioneta" >Camioneta</option>
      <option value="camion">Camión</option>
      <option value="motocicleta" >Motocicleta</option>
      <option value="bicicleta">Bicicleta</option>
      <option value="otro">Otro vehículo</option>
      <option value="se_ignora">Se ignora</option>
    </select>
  </div>

    <div class="form-group">
    <label>Gravedad del accidente</label>
    <select class="form-control" id="nombre" name="gravedad">
      <option value="" selected>Selecciona una opción</option>
      <option value="sin_daños" >Sin daños</option>
      <option value="heridos">Heridos</option>
      <option value="muertos">Muertos</option>
      <option value="se_ignora">Se ignora</option>
    </select>
  </div>



<div class="form-group col-lg-6">






  <datalist  id="calle"> 
<option value="">Selecciona una opción</option>

<option value="Palacio de Gobierno Del Estado de Jalisco">Palacio de Gobierno Del Estado de Jalisco</option>

<option value="Guadalajara Centro">Guadalajara Centro</option>

<option value="Vallarta Poniente">Vallarta Poniente</option>

<option value="Arcos Vallarta">Arcos Vallarta</option>

<option value="Arcos">Arcos</option>

<option value="Obrera Centro">Obrera Centro</option>

<option value="Lafayette">Lafayette</option>

<option value="Barrera">Barrera</option>

<option value="Deitz">Deitz</option>

<option value="Americana">Americana</option>

<option value="San Antonio">San Antonio</option>

<option value="Mexicaltzingo">Mexicaltzingo</option>

<option value="Moderna">Moderna</option>

<option value="Capilla de Jesús">Capilla de Jesús</option>

<option value="El Santuario">El Santuario</option>

<option value="Sagrada Familia">Sagrada Familia</option>

<option value="Artesanos">Artesanos</option>

<option value="Jardines del Country">Jardines del Country</option>

<option value="Jardines del Country 2a. Sección">Jardines del Country 2a. Sección</option>

<option value="Universidad">Universidad</option>

<option value="Parían">Parían</option>

<option value="Del Trabajo CTM">Del Trabajo CTM</option>

<option value="Fidel Velázquez">Fidel Velázquez</option>

<option value="Residencial Vallarta Country">Residencial Vallarta Country</option>

<option value="Fabrica de Atemajac">Fabrica de Atemajac</option>

<option value="Casa Hogar CTM">Casa Hogar CTM</option>

<option value="Santa Mónica">Santa Mónica</option>

<option value="Guadalupana Norte">Guadalupana Norte</option>

<option value="Santa Elena Alcalde Oriente">Santa Elena Alcalde Oriente</option>

<option value="Simón Bolívar">Simón Bolívar</option>

<option value="Guadalupana Sur">Guadalupana Sur</option>

<option value="Santa Elena Alcalde Poniente">Santa Elena Alcalde Poniente</option>

<option value="Circunvalación Metro Carballo">Circunvalación Metro Carballo</option>

<option value="Jardines de Atemajac">Jardines de Atemajac</option>

<option value="Santa Elena Estadio">Santa Elena Estadio</option>

<option value="División del Norte">División del Norte</option>

<option value="Autocinema">Autocinema</option>

<option value="Santa Elena de La Cruz">Santa Elena de La Cruz</option>

<option value="Rancho Nuevo 2da. Sección">Rancho Nuevo 2da. Sección</option>

<option value="Villas Del Estadio">Villas Del Estadio</option>

<option value="Estadio">Estadio</option>

<option value="FOVISSSTE Independencia">FOVISSSTE Independencia</option>

<option value="Lomas de Independencia">Lomas de Independencia</option>

<option value="Colomos Independencia">Colomos Independencia</option>

<option value="Nuevo Sur">Nuevo Sur</option>

<option value="Paseos Independencia">Paseos Independencia</option>

<option value="Independencia INFONAVIT">Independencia INFONAVIT</option>

<option value="Rancho Nuevo 1ra. Sección">Rancho Nuevo 1ra. Sección</option>

<option value="Residencial San Elias">Residencial San Elias</option>

<option value="Ricardo Flores Magón">Ricardo Flores Magón</option>

<option value="Estadio Poniente">Estadio Poniente</option>

<option value="Rancho Nuevo INFONAVIT">Rancho Nuevo INFONAVIT</option>

<option value="El Jaguey">El Jaguey</option>

<option value="Lomas del Paraíso 4a. Sección">Lomas del Paraíso 4a. Sección</option>

<option value="Lomas del Paraíso 1a. Sección">Lomas del Paraíso 1a. Sección</option>

<option value="Praderas del Paraíso (Rinconadas del Paraíso)">Praderas del Paraíso (Rinconadas del Paraíso)</option>

<option value="Balcones de Huentitán">Balcones de Huentitán</option>

<option value="Huentitán El Bajo">Huentitán El Bajo</option>

<option value="Lomas del Paraíso 2a. Sección">Lomas del Paraíso 2a. Sección</option>

<option value="Lomas del Paraíso 5a. Sección">Lomas del Paraíso 5a. Sección</option>

<option value="Lomas del Paraíso 3a. Sección">Lomas del Paraíso 3a. Sección</option>

<option value="San Antonio">San Antonio</option>

<option value="INFONAVIT Planetario">INFONAVIT Planetario</option>

<option value="Colonial Independencia">Colonial Independencia</option>

<option value="Zoológico">Zoológico</option>

<option value="Panorámica Huentitán">Panorámica Huentitán</option>

<option value="Mezquitan Country">Mezquitan Country</option>

<option value="San Bernardo">San Bernardo</option>

<option value="San Miguel de Mezquitan">San Miguel de Mezquitan</option>

<option value="Barrio Mezquitan">Barrio Mezquitan</option>

<option value="La Normal">La Normal</option>

<option value="Mezquitan">Mezquitan</option>

<option value="Miguel Galindo">Miguel Galindo</option>

<option value="Niños Héroes">Niños Héroes</option>

<option value="Ramón Corona">Ramón Corona</option>

<option value="Observatorio">Observatorio</option>

<option value="Eugenia">Eugenia</option>

<option value="Fray Antonio Alcalde">Fray Antonio Alcalde</option>

<option value="Miraflores">Miraflores</option>

<option value="Alcalde Barranquitas">Alcalde Barranquitas</option>

<option value="Colinas de La Normal">Colinas de La Normal</option>

<option value="El Retiro">El Retiro</option>

<option value="Independencia Poniente">Independencia Poniente</option>

<option value="Independencia">Independencia</option>

<option value="Jardines Alcalde">Jardines Alcalde</option>

<option value="Villas de San Juan">Villas de San Juan</option>

<option value="Esperanza">Esperanza</option>

<option value="Jardines de Santa Isabel">Jardines de Santa Isabel</option>

<option value="San Miguel de Huentitán El Alto 1a Secc">San Miguel de Huentitán El Alto 1a Secc</option>

<option value="La Federacha">La Federacha</option>

<option value="Batallón de San Patricio">Batallón de San Patricio</option>

<option value="Margarita Maza de Juárez">Margarita Maza de Juárez</option>

<option value="La Joya">La Joya</option>

<option value="Colonia No. 9">Colonia No. 9</option>

<option value="La Cantera">La Cantera</option>

<option value="Bosques de La Cantera">Bosques de La Cantera</option>

<option value="Villas de la Cantera">Villas de la Cantera</option>

<option value="Estadio">Estadio</option>

<option value="Monumental">Monumental</option>

<option value="Belisario Domínguez">Belisario Domínguez</option>

<option value="Belisario Domínguez">Belisario Domínguez</option>

<option value="San Marcos Poniente">San Marcos Poniente</option>

<option value="Vicente Guerrero">Vicente Guerrero</option>

<option value="Circunvalación Belisario">Circunvalación Belisario</option>

<option value="San Marcos Oriente">San Marcos Oriente</option>

<option value="San Vicente">San Vicente</option>

<option value="Independencia Oriente">Independencia Oriente</option>

<option value="Postes Cuates (Federalismo)">Postes Cuates (Federalismo)</option>

<option value="Lomas Independencia">Lomas Independencia</option>

<option value="Santa María">Santa María</option>

<option value="Santa María Oriente">Santa María Oriente</option>

<option value="La Natividad">La Natividad</option>

<option value="San Juan de Dios">San Juan de Dios</option>

<option value="Sagrado Corazón">Sagrado Corazón</option>

<option value="La Perla">La Perla</option>

<option value="El Mirador">El Mirador</option>

<option value="San Ramón">San Ramón</option>

<option value="San Felipe">San Felipe</option>

<option value="Rinconada de Huentitán">Rinconada de Huentitán</option>

<option value="La Joyita">La Joyita</option>

<option value="Huentitán El Alto">Huentitán El Alto</option>

<option value="Real de Huentitán">Real de Huentitán</option>

<option value="San Miguel de Huentitán El Alto 3a Secc">San Miguel de Huentitán El Alto 3a Secc</option>

<option value="Balcones de La Joya">Balcones de La Joya</option>

<option value="INFONAVIT El Verde">INFONAVIT El Verde</option>

<option value="Colinas de Huentitán">Colinas de Huentitán</option>

<option value="Altavista de Guadalajara">Altavista de Guadalajara</option>

<option value="Villas de La Barranca">Villas de La Barranca</option>

<option value="Dr. Atl">Dr. Atl</option>

<option value="Gral. Real">Gral. Real</option>

<option value="Real">Real</option>

<option value="La Divina Providencia">La Divina Providencia</option>

<option value="Revolución">Revolución</option>

<option value="Medrano">Medrano</option>

<option value="La Loma">La Loma</option>

<option value="Obrera">Obrera</option>

<option value="Unidad Modelo">Unidad Modelo</option>

<option value="Valentín Gómez Farías">Valentín Gómez Farías</option>

<option value="González Gallo">González Gallo</option>

<option value="Quinta Velarde">Quinta Velarde</option>

<option value="Olímpica">Olímpica</option>

<option value="El Periodista">El Periodista</option>

<option value="Dólar">Dólar</option>

<option value="Valle Del Álamo">Valle Del Álamo</option>

<option value="Valle Del Álamo">Valle Del Álamo</option>

<option value="Ferrocarril">Ferrocarril</option>

<option value="El Dean">El Dean</option>

<option value="Analco">Analco</option>

<option value="Las Conchas">Las Conchas</option>

<option value="San Carlos">San Carlos</option>

<option value="La Aurora">La Aurora</option>

<option value="Rincón de Agua Azul">Rincón de Agua Azul</option>

<option value="Barragán y Hernández">Barragán y Hernández</option>

<option value="Higuerillas 1a Secc">Higuerillas 1a Secc</option>

<option value="Higuerillas 2a Secc">Higuerillas 2a Secc</option>

<option value="La Nogalera">La Nogalera</option>

<option value="Parque Industrial El Álamo">Parque Industrial El Álamo</option>

<option value="Lázaro Cárdenas">Lázaro Cárdenas</option>

<option value="Las Juntas">Las Juntas</option>

<option value="Jardines de los Arcos">Jardines de los Arcos</option>

<option value="Chapalita">Chapalita</option>

<option value="Residencial Chapalita">Residencial Chapalita</option>

<option value="Campo de Polo Chapalita">Campo de Polo Chapalita</option>

<option value="Vallarta Sur">Vallarta Sur</option>

<option value="Vallarta Cuauhtémoc">Vallarta Cuauhtémoc</option>

<option value="Jardines de Plaza Del Sol">Jardines de Plaza Del Sol</option>

<option value="Juan Diego">Juan Diego</option>

<option value="Residencial Del Bosque">Residencial Del Bosque</option>

<option value="Jardines del Bosque Norte">Jardines del Bosque Norte</option>

<option value="Jardines del Bosque Centro">Jardines del Bosque Centro</option>

<option value="Mercado de Abastos">Mercado de Abastos</option>

<option value="Comercial Abastos">Comercial Abastos</option>

<option value="Margal">Margal</option>

<option value="Bertha Cuervo de Jaredo">Bertha Cuervo de Jaredo</option>

<option value="Rincón Del Bosque">Rincón Del Bosque</option>

<option value="Villa La Victoria">Villa La Victoria</option>

<option value="Rinconada de La Victoria">Rinconada de La Victoria</option>

<option value="Bosques Del Valle">Bosques Del Valle</option>

<option value="Jardines del Valle">Jardines del Valle</option>

<option value="Bosques de La Victoria">Bosques de La Victoria</option>

<option value="Rinconada de La Arboleda">Rinconada de La Arboleda</option>

<option value="Verde Valle Anexo">Verde Valle Anexo</option>

<option value="Verde Valle">Verde Valle</option>

<option value="Turquesa">Turquesa</option>

<option value="Santa Eduwiges">Santa Eduwiges</option>

<option value="Santa Teresita">Santa Teresita</option>

<option value="Ladrón de Guevara">Ladrón de Guevara</option>

<option value="Villaseñor">Villaseñor</option>

<option value="Lomas Del Country">Lomas Del Country</option>

<option value="Country Club">Country Club</option>

<option value="Villas Del Country">Villas Del Country</option>

<option value="Ayuntamiento">Ayuntamiento</option>

<option value="Chapultepec Country">Chapultepec Country</option>

<option value="Providencia 2a Secc">Providencia 2a Secc</option>

<option value="Circunvalación Américas">Circunvalación Américas</option>

<option value="Providencia 1a Secc">Providencia 1a Secc</option>

<option value="Providencia 3a Secc">Providencia 3a Secc</option>

<option value="Rubio y Corona">Rubio y Corona</option>

<option value="Providencia 5a Secc">Providencia 5a Secc</option>

<option value="Providencia 4a Secc">Providencia 4a Secc</option>

<option value="Lomas de Providencia">Lomas de Providencia</option>

<option value="Italia Providencia">Italia Providencia</option>

<option value="Las Américas">Las Américas</option>

<option value="Rojas Ladrón de Guevara">Rojas Ladrón de Guevara</option>

<option value="Jesús Garcia">Jesús Garcia</option>

<option value="Lomas de Guevara">Lomas de Guevara</option>

<option value="Providencia Sur">Providencia Sur</option>

<option value="Italia">Italia</option>

<option value="Secretaria de Relaciones Exteriores">Secretaria de Relaciones Exteriores</option>

<option value="Aldrete">Aldrete</option>

<option value="Colomos Providencia">Colomos Providencia</option>

<option value="Villa de los Colomos">Villa de los Colomos</option>

<option value="Colinas de San Javier">Colinas de San Javier</option>

<option value="Los Colomos">Los Colomos</option>

<option value="Rinconada Del Arroyo">Rinconada Del Arroyo</option>

<option value="Agraria">Agraria</option>

<option value="Vista Del Country">Vista Del Country</option>

<option value="Terrazas Monraz">Terrazas Monraz</option>

<option value="Prados de Providencia">Prados de Providencia</option>

<option value="Monraz">Monraz</option>

<option value="Lomas del Valle">Lomas del Valle</option>

<option value="Eulogio Parra">Eulogio Parra</option>

<option value="Lomas Santa Rita">Lomas Santa Rita</option>

<option value="Circunvalación Sarcófago">Circunvalación Sarcófago</option>

<option value="Circunvalación Guevara">Circunvalación Guevara</option>

<option value="Residencial Juan Manuel">Residencial Juan Manuel</option>

<option value="Circunvalación Vallarta">Circunvalación Vallarta</option>

<option value="Terranova">Terranova</option>

<option value="Villa Santa Rita">Villa Santa Rita</option>

<option value="Vallarta San Jorge">Vallarta San Jorge</option>

<option value="Rinconada Santa Rita">Rinconada Santa Rita</option>

<option value="Vallarta Norte">Vallarta Norte</option>

<option value="Vallarta San Lucas">Vallarta San Lucas</option>

<option value="Santa Cecilia 3a. Sección">Santa Cecilia 3a. Sección</option>

<option value="Guadalajara Oriente">Guadalajara Oriente</option>

<option value="Santa Cecilia 2a. Sección">Santa Cecilia 2a. Sección</option>

<option value="Unidad Río Verde">Unidad Río Verde</option>

<option value="Río Verde Oblatos">Río Verde Oblatos</option>

<option value="Oblatos">Oblatos</option>

<option value="Santa Rosa">Santa Rosa</option>

<option value="Santa Cecilia 1a. sección">Santa Cecilia 1a. sección</option>

<option value="Popular">Popular</option>

<option value="San Martín Anexo">San Martín Anexo</option>

<option value="Santos Degollado">Santos Degollado</option>

<option value="San Martín">San Martín</option>

<option value="Circunvalación Oblatos">Circunvalación Oblatos</option>

<option value="Talpita Oriente">Talpita Oriente</option>

<option value="Talpita Poniente">Talpita Poniente</option>

<option value="Ampliación Talpita">Ampliación Talpita</option>

<option value="Lomas de San Eugenio">Lomas de San Eugenio</option>

<option value="Heliodoro Hernández Loza 2a Secc">Heliodoro Hernández Loza 2a Secc</option>

<option value="Bethel">Bethel</option>

<option value="Heliodoro Hernández Loza 1a Secc">Heliodoro Hernández Loza 1a Secc</option>

<option value="Arandas">Arandas</option>

<option value="Lomas de Oblatos 1a Secc">Lomas de Oblatos 1a Secc</option>

<option value="Villas de Guadalupe">Villas de Guadalupe</option>

<option value="Balcones de Oblatos">Balcones de Oblatos</option>

<option value="Lomas de Oblatos 2a Secc">Lomas de Oblatos 2a Secc</option>

<option value="San José Río Verde 2a. Sección">San José Río Verde 2a. Sección</option>

<option value="Plutarco Elias Calles 1">Plutarco Elias Calles 1</option>

<option value="San Eugenio">San Eugenio</option>

<option value="San Eugenio">San Eugenio</option>

<option value="Plutarco Elias Calles 2">Plutarco Elias Calles 2</option>

<option value="San José Río Verde 1a. Sección">San José Río Verde 1a. Sección</option>

<option value="Tetlán Rio Verde">Tetlán Rio Verde</option>

<option value="Jardines de La Barranca">Jardines de La Barranca</option>

<option value="Residencial de La Barranca">Residencial de La Barranca</option>

<option value="Antigua Penal de Oblatos">Antigua Penal de Oblatos</option>

<option value="El Porvenir Unidad Hogar">El Porvenir Unidad Hogar</option>

<option value="Progreso">Progreso</option>

<option value="Blanco y Cuellar 1ra.">Blanco y Cuellar 1ra.</option>

<option value="Rinconada San Andres Poniente">Rinconada San Andres Poniente</option>

<option value="Blanco y Cuellar 3ra.">Blanco y Cuellar 3ra.</option>

<option value="San Juan Bosco">San Juan Bosco</option>

<option value="Blanco y Cuellar 2da.">Blanco y Cuellar 2da.</option>

<option value="Los Mártires">Los Mártires</option>

<option value="San Isidro">San Isidro</option>

<option value="Industria">Industria</option>

<option value="Jardines de Guadalupe">Jardines de Guadalupe</option>

<option value="Potrero Alto">Potrero Alto</option>

<option value="Esteban Alatorre">Esteban Alatorre</option>

<option value="Cuauhtémoc Popular">Cuauhtémoc Popular</option>

<option value="Santa María de Silo">Santa María de Silo</option>

<option value="Cuauhtémoc INFONAVIT">Cuauhtémoc INFONAVIT</option>

<option value="Barajas Villaseñor San Pablo">Barajas Villaseñor San Pablo</option>

<option value="Libertad">Libertad</option>

<option value="Rinconada San Andres">Rinconada San Andres</option>

<option value="El Porvenir Oriente">El Porvenir Oriente</option>

<option value="Los Romo">Los Romo</option>

<option value="Beatriz Hernández">Beatriz Hernández</option>

<option value="Lomas Del Gallo">Lomas Del Gallo</option>

<option value="Miguel Hidalgo">Miguel Hidalgo</option>

<option value="Ramón López Velarde">Ramón López Velarde</option>

<option value="El Zalate">El Zalate</option>

<option value="Pablo Valdez">Pablo Valdez</option>

<option value="Los Tulipanes">Los Tulipanes</option>

<option value="Pablo Valdez">Pablo Valdez</option>

<option value="Pablo Valdez">Pablo Valdez</option>

<option value="Ampliación Provincia">Ampliación Provincia</option>

<option value="Los Arrayanes">Los Arrayanes</option>

<option value="Rinconada del Valle">Rinconada del Valle</option>

<option value="Joaquín Aarón">Joaquín Aarón</option>

<option value="La Campesina">La Campesina</option>

<option value="Benito Juárez">Benito Juárez</option>

<option value="Lagos de Oriente 2a. Sección">Lagos de Oriente 2a. Sección</option>

<option value="San Joaquín">San Joaquín</option>

<option value="Lagos de Oriente">Lagos de Oriente</option>

<option value="Hermosa Provincia">Hermosa Provincia</option>

<option value="INFONAVIT Benito Juárez">INFONAVIT Benito Juárez</option>

<option value="San Miguel de Huentitán El Alto 2a Secc">San Miguel de Huentitán El Alto 2a Secc</option>

<option value="Jardines de San Francisco">Jardines de San Francisco</option>

<option value="La Florida">La Florida</option>

<option value="Lagos de Oriente">Lagos de Oriente</option>

<option value="Versalles">Versalles</option>

<option value="La Aurora">La Aurora</option>

<option value="Agustín Yánez">Agustín Yánez</option>

<option value="Javier Mina">Javier Mina</option>

<option value="Magaña">Magaña</option>

<option value="San Antonio">San Antonio</option>

<option value="INFONAVIT San Rafael">INFONAVIT San Rafael</option>

<option value="San Rafael">San Rafael</option>

<option value="Lomas de Revolución">Lomas de Revolución</option>

<option value="Residencial San Andrés">Residencial San Andrés</option>

<option value="San Andrés 2a. Sección">San Andrés 2a. Sección</option>

<option value="Hormiguero">Hormiguero</option>

<option value="San Andrés 1a. Sección">San Andrés 1a. Sección</option>

<option value="Residencial Del Parque">Residencial Del Parque</option>

<option value="San Andrés">San Andrés</option>

<option value="San Rafael">San Rafael</option>

<option value="Electricistas">Electricistas</option>

<option value="San Andrés Gigantes">San Andrés Gigantes</option>

<option value="Jardines de los Escritores">Jardines de los Escritores</option>

<option value="San Rafael 2">San Rafael 2</option>

<option value="Plan de Ayala">Plan de Ayala</option>

<option value="Insurgentes 1a Secc">Insurgentes 1a Secc</option>

<option value="Jardines de los Historiadores">Jardines de los Historiadores</option>

<option value="Jardines de los Poetas">Jardines de los Poetas</option>

<option value="Parques Del Nilo">Parques Del Nilo</option>

<option value="2001">2001</option>

<option value="Tetlán I">Tetlán I</option>

<option value="Villas de la Presa">Villas de la Presa</option>

<option value="Dioses Del Nilo">Dioses Del Nilo</option>

<option value="Tetlán II">Tetlán II</option>

<option value="Insurgentes 2a Secc">Insurgentes 2a Secc</option>

<option value="Insurgentes La Presa">Insurgentes La Presa</option>

<option value="Tetlán">Tetlán</option>

<option value="Aldama Tetlán">Aldama Tetlán</option>

<option value="Insurgentes 3a Secc">Insurgentes 3a Secc</option>

<option value="Los Obeliscos">Los Obeliscos</option>

<option value="Villas Del Nilo">Villas Del Nilo</option>

<option value="Florencia">Florencia</option>

<option value="Parques de San Pedro">Parques de San Pedro</option>

<option value="Popular Hornos">Popular Hornos</option>

<option value="El Barro">El Barro</option>

<option value="Las Piedrotas">Las Piedrotas</option>

<option value="Vistas del Nilo">Vistas del Nilo</option>

<option value="Cantarranas">Cantarranas</option>

<option value="Prados Del Nilo">Prados Del Nilo</option>

<option value="Lomas Del Paradero">Lomas Del Paradero</option>

<option value="Ciudad Universitaria">Ciudad Universitaria</option>

<option value="Sutaj">Sutaj</option>

<option value="Universitaria">Universitaria</option>

<option value="Vicente Guerrero">Vicente Guerrero</option>

<option value="El Manantial">El Manantial</option>

<option value="Jardines del Nilo Sur">Jardines del Nilo Sur</option>

<option value="Jardines del Nilo Norte">Jardines del Nilo Norte</option>

<option value="La Paz">La Paz</option>

<option value="Jardines de La Paz">Jardines de La Paz</option>

<option value="Jardines del Nilo">Jardines del Nilo</option>

<option value="Jardines de La Paz Norte">Jardines de La Paz Norte</option>

<option value="Atlas">Atlas</option>

<option value="Atlas">Atlas</option>

<option value="Atlas Poniente">Atlas Poniente</option>

<option value="Atlas 2a. Sección">Atlas 2a. Sección</option>

<option value="Arandas">Arandas</option>

<option value="Jardines Del Rosario">Jardines Del Rosario</option>

<option value="Rancho Blanco Álamo">Rancho Blanco Álamo</option>

<option value="El Rosario">El Rosario</option>

<option value="Reforma">Reforma</option>

<option value="Rancho Blanco">Rancho Blanco</option>

<option value="El Mirador Álamo">El Mirador Álamo</option>

<option value="Orozco El Mirador">Orozco El Mirador</option>

<option value="Lomas de San Pedro">Lomas de San Pedro</option>

<option value="El Rosario">El Rosario</option>

<option value="Bosques Del Boulevard">Bosques Del Boulevard</option>

<option value="Del Fresno 2a. sección">Del Fresno 2a. sección</option>

<option value="Del Fresno 1a. Sección">Del Fresno 1a. Sección</option>

<option value="8 de Julio">8 de Julio</option>

<option value="Tepopote">Tepopote</option>

<option value="Morelos">Morelos</option>

<option value="Mariano Matamoros">Mariano Matamoros</option>

<option value="Tepopote Oeste">Tepopote Oeste</option>

<option value="Colón">Colón</option>

<option value="Villa La Cruz">Villa La Cruz</option>

<option value="Las Torres">Las Torres</option>

<option value="Del Sur">Del Sur</option>

<option value="Del Sur">Del Sur</option>

<option value="Colón Industrial">Colón Industrial</option>

<option value="Bienestar Social">Bienestar Social</option>

<option value="Zona Industrial">Zona Industrial</option>

<option value="Villa Hermosa">Villa Hermosa</option>

<option value="Zona Industrial 2a. Sección">Zona Industrial 2a. Sección</option>

<option value="Jardines Del Sur">Jardines Del Sur</option>

<option value="Residencial La Cruz">Residencial La Cruz</option>

<option value="Jardines de La Cruz 1a. Sección">Jardines de La Cruz 1a. Sección</option>

<option value="Jardines de La Cruz 2a. Sección">Jardines de La Cruz 2a. Sección</option>

<option value="Jardines de San José">Jardines de San José</option>

<option value="Villas del Sur 1">Villas del Sur 1</option>

<option value="Villas del Sur 2">Villas del Sur 2</option>

<option value="Villas Jardín">Villas Jardín</option>

<option value="18 de Marzo">18 de Marzo</option>

<option value="Lomas de Polanco">Lomas de Polanco</option>

<option value="López Portillo">López Portillo</option>

<option value="Polanco Oriente">Polanco Oriente</option>

<option value="Patria Nueva">Patria Nueva</option>

<option value="Patria">Patria</option>

<option value="Polanquito">Polanquito</option>

<option value="5 de Mayo">5 de Mayo</option>

<option value="Francisco Villa">Francisco Villa</option>

<option value="José Clemente Orozco">José Clemente Orozco</option>

<option value="1 de Mayo">1 de Mayo</option>

<option value="Zona Industrial 3a. Sección">Zona Industrial 3a. Sección</option>

<option value="Echeverría 3a. Sección">Echeverría 3a. Sección</option>

<option value="Echeverría 2a. Sección">Echeverría 2a. Sección</option>

<option value="5 de Mayo 2a Secc">5 de Mayo 2a Secc</option>

<option value="Echeverría 1a. Sección">Echeverría 1a. Sección</option>

<option value="Zona Industrial 1a. Sección">Zona Industrial 1a. Sección</option>

<option value="Valentín Gómez Farias">Valentín Gómez Farias</option>

<option value="El Rocio">El Rocio</option>

<option value="Vistas Del Sur">Vistas Del Sur</option>

<option value="Las Palmas">Las Palmas</option>

<option value="Arboledas Del Sur">Arboledas Del Sur</option>

<option value="Los Colorines">Los Colorines</option>

<option value="Nueva España">Nueva España</option>

<option value="El Carmen">El Carmen</option>

<option value="Emiliano Zapata">Emiliano Zapata</option>

<option value="Lázaro Cárdenas Sur">Lázaro Cárdenas Sur</option>

<option value="Nueva Santa María">Nueva Santa María</option>

<option value="Balcones Del 4">Balcones Del 4</option>

<option value="Revolucionaria">Revolucionaria</option>

<option value="Loma Linda">Loma Linda</option>

<option value="Lomas Del Pedregal">Lomas Del Pedregal</option>

<option value="El Sauz INFONAVIT">El Sauz INFONAVIT</option>

<option value="Villa Vicente Guerrero">Villa Vicente Guerrero</option>

<option value="Parques de Colón Sección 2">Parques de Colón Sección 2</option>

<option value="Jardines El Sauz">Jardines El Sauz</option>

<option value="Colón C.R.O.C.">Colón C.R.O.C.</option>

<option value="Miravalle">Miravalle</option>

<option value="Terralta">Terralta</option>

</datalist>
</div>

  <center>
    <div class="form-group">
  <input class = "btn btn-primary btn-lg" type="submit" name="enviado" value="Enviar">
  </center>
</form>
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

<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="dist/js/adminlte.js"></script>

</body>
</html>
