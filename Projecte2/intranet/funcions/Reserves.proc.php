<?php

error_reporting(0);
$conexion= mysqli_connect("localhost","root","","bd_reserva");

if ($conexion==false) {
    echo"<p align=center><h3>No s'ha pogut connectar a la base de dades, revisi lusuari,la contrasenya,la ip o el nom de la BD</h3></p><br><br>";
}
else{

error_reporting(0);
$idusu=$_REQUEST['idusu'];

$idrecurs=$_REQUEST['recursid'];
//echo"$rec_id";

$update="UPDATE `recurs` SET `rec_estat` = '0'AND rec_alliberacio = NULL WHERE `recurs`.`rec_id` = $idrecurs;";
$consulta=mysqli_query($conexion,$update);
$update="UPDATE `recurs` SET `rec_inici` = now() WHERE `recurs`.`rec_id` = $idrecurs;" ;
$consulta=mysqli_query($conexion,$update);
$update="UPDATE `recurs` SET `rec_contador` = `rec_contador`+1  WHERE `recurs`.`rec_id` = $idrecurs;" ;
$consulta=mysqli_query($conexion,$update);

$insert="INSERT INTO `reserva` (`rec_id`, `usu_id`) VALUES ($idrecurs, $idusu);";
$insertar=mysqli_query($conexion,$insert);



echo"<p align=center><a href=../misreservas.php>Tornar</a></p>";

  echo"<form name=login method=post action=../misreservas.php>";
  echo"<input type=hidden name=idusu value=$idusu>";
  echo "</form>";
  echo "<script language=JavaScript>";
  echo"document.login.submit()";
  echo"</script>";
}
?>
