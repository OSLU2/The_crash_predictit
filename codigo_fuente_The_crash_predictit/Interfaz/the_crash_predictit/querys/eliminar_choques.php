<?php
include ("bd.php");



$conexion = mysqli_connect($direccion, $usuario, $contraseña, $bd); // Podemos omitir el ultimo argumento (nombre de la BD)



if(isset($_POST["borrar"])){

if (empty($_POST["eliminar"])) {

echo "<h1>no se ha seleccionado ningun registro</h1>";

  }else{

    foreach ($_POST["eliminar"] as $id_borrar) {

	  $consulta2 = "DELETE FROM acci_usu WHERE id = '$id_borrar'"; 

      $resultado2 = mysqli_query($conexion, $consulta2); 
      echo "Registro eliminado correctamente";
      header("refresh:1; ../mostrar_datos.php");


    }

  }


}

?>