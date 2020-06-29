<?php
session_start();
$user = $_POST["usuario"];
$password = $_POST["pass"];

include ("bd.php");


$conexion = mysqli_connect($direccion, $usuario, $contraseña, $bd);

 // mysqli_select_db($conexion, $bd) or die ("No se encuentra la base de datos");
 
$consulta = "SELECT * FROM admin WHERE usuario = \"$user\" and password = \"$password\"";
$resultado = mysqli_query($conexion, $consulta);	
$fila = mysqli_fetch_array($resultado);
//$fila = mysqli_num_rows($resultado);
if($fila==true) {

$_SESSION["user"] = $user;
header("Location: ../index.php");


}else{
echo "Datos incorrectos";
header("refresh:1; ../tp-admin.html");
}



?>