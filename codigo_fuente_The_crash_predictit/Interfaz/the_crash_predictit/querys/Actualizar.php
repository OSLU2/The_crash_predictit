<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Actualizar</title>
<body>
<?php


include ("bd.php");

$conexion = mysqli_connect($direccion, $usuario, $contraseña, $bd); // Podemos omitir el ultimo argumento (nombre de la BD)

$id = $_GET["id"];
$tipo_calle1 = $_GET["tipo_calle1"];
$calle1 = $_GET["calle1"];
$tipo_calle2 = $_GET["tipo_calle2"];
$calle2 = $_GET["calle2"];
$dia = $_GET["dia"];
$mes = $_GET["mes"];
$ano = $_GET["ano"];
$minu = $_GET["minu"];
$hora = $_GET["hora"];
$sexo = $_GET["sexo"];
$edad = $_GET["edad"];
$cinturon = $_GET["cinturon"];
$alcohol = $_GET["alcohol"];
$clima = $_GET["clima"];
$luz = $_GET["luz"];
$velocidad = $_GET["velocidad"];
$condi_calle = $_GET["condi_calle"];
$tipo_vehi1 = $_GET["tipo_vehi1"];
$tipo_vehi2 = $_GET["tipo_vehi2"];
$gravedad = $_GET["gravedad"];


if(mysqli_connect_errno()){ //Sirve cuando hay un error en la BD 
	
	echo "Fallo al conectar la BD ";
	exit();
	
}


// mysqli_select_db($conexion, $bd) or die ("No se encuentra la base de datos"); Sirve para seleccionar la BD y si no la encuentra un msj

mysqli_set_charset($conexion, "uft8"); //Para que funcionec con los acentos 

$consulta = "UPDATE acci_usu SET tipo_calle1 = '$tipo_calle1', calle1 = '$calle1', tipo_calle2 = '$tipo_calle2', calle2 = '$calle2', clima = '$clima', luz = '$luz' , hora = '$hora', minutos = '$minu', dia = '$dia', mes = '$mes' , ano = '$ano', velocidad = '$velocidad', condi_calle = '$condi_calle', tipo_vehiculo1 = '$tipo_vehi1', tipo_vehiculo2 = '$tipo_vehi2', gravedad = '$gravedad', sexo = '$sexo', ali_alcoho = '$alcohol', cintu_segu = '$cinturon', edad = '$edad' WHERE id = '$id'";//Actualizar

$resultado = mysqli_query($conexion, $consulta); //Para hacer las consulatas

if($resultado==false){ 
	echo "Error en la consulta";
}else{
	
	echo "Se guardo con exito el registro <br><br>";
	
header("refresh:1; ../mostrar_datos.php");	
}


	
mysqli_close($conexion); //Para que cierre la BD y no gaste recursos
?>	
</body>
</html>