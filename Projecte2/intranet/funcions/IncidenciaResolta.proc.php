<?php
$conexion= mysqli_connect("localhost","root","","bd_reserva");

if ($conexion==false) {
    echo"<p align=center><h3>No s'ha pogut connectar a la base de dades, revisi lusuari,la contrasenya,la ip o el nom de la BD</h3></p><br><br>";
}
else{
error_reporting(0);
$rec_id=$_REQUEST['rec_id'];
$idusu=$_REQUEST['idusu'];

$update="UPDATE `recurs` SET `rec_estat` = 1 WHERE `recurs`.`rec_id` = $rec_id;";
$consulta=mysqli_query($conexion,$update);

$update="UPDATE `recurs` SET rec_alliberacio=now() WHERE `recurs`.`rec_id` = $rec_id;";
$consulta=mysqli_query($conexion,$update);

$delete="DELETE FROM `reserva` WHERE `reserva`.`rec_id` = $rec_id";
$borrar=mysqli_query($conexion,$delete);

  echo"<form name=login method=post action=../misreservas.php>";
  echo"<input type=hidden name=idusu value=$idusu>";
  echo "</form>";
  echo "<script language=JavaScript>";
  echo"document.login.submit()";
  echo"</script>";

}
?>
