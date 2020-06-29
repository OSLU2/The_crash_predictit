<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registro de accidentes vihales</title>
</head>
<body>
<?php

$tipo_calle1 = $_POST["tipo_calle1"];
$calle1 = $_POST["calle1"];
$tipo_calle2 = $_POST["tipo_calle2"];
$calle2 = $_POST["calle2"];
$dia = $_POST["dia"];
$mes = $_POST["mes"];
$ano = $_POST["ano"];
$minu = $_POST["minu"];
$hora = $_POST["hora"];
$sexo = $_POST["sexo"];
$edad = $_POST["edad"];
$cinturon = $_POST["cinturon"];
$alcohol = $_POST["alcohol"];
$clima = $_POST["clima"];
$luz = $_POST["luz"];
$velocidad = $_POST["velocidad"];
$condi_calle = $_POST["condi_calle"];
$cantidad_vehiculo = $_POST["cantidad_vehiculo"];
$tipo_vehi1 = $_POST["tipo_vehi1"];
$tipo_vehi2 = $_POST["tipo_vehi2"];
$gravedad = $_POST["gravedad"];

include("bd.php");

$conexion = mysqli_connect($direccion, $usuario, $contraseña, $bd);

if(mysqli_connect_errno()){ 
	
	echo "Fallo al conectar la BD ";
	exit();
	
}
mysqli_select_db($conexion, $bd) or die ("No se encuentra la base de datos");
mysqli_set_charset($conexion, "uft8");

$sql = "INSERT INTO acci_usu (tipo_calle1, calle1, tipo_calle2, calle2, clima, luz, hora, minutos, dia, mes, ano, velocidad, condi_calle, cantidad_vehiculos, tipo_vehiculo1, tipo_vehiculo2, gravedad, sexo, ali_alcoho, cintu_segu, edad) VALUES (? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$resultado = mysqli_prepare($conexion, $sql);

$exito = mysqli_stmt_bind_param($resultado, "sssssssssssssissssssi", $tipo_calle1, $calle1, $tipo_calle2, $calle2, $clima, $luz, $hora, $minu, $dia, $mes, $ano, $velocidad, $condi_calle, $cantidad_vehiculo, $tipo_vehi1, $tipo_vehi2, $gravedad ,$sexo, $alcohol, $cinturon, $edad);
$exito = mysqli_stmt_execute($resultado);


if($exito == false){
	
	echo "Error al ejecutar la consulta";
	header("refresh:1; ../Formulario.php");
}else{
	
	
	echo "Nuevo elemento agregado: <br><br>";
	header("refresh:1; ../Formulario.php");

	mysqli_stmt_close($resultado);
}

?>
</body>
</html>