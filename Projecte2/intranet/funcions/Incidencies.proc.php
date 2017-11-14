<?php
$conexion= mysqli_connect("localhost","root","","bd_reserva");

if ($conexion==false) {
    echo"<p align=center><h3>No s'ha pogut connectar a la base de dades, revisi lusuari,la contrasenya,la ip o el nom de la BD</h3></p><br><br>";
}
else{
//error_reporting(0);
echo"<h1><p align=center>S'ha passat la incid�ncia correctament</p></h1>";
$rec_id=$_REQUEST['rec_id'];
$idusu=$_REQUEST['idusu'];

$desc=mysqli_real_escape_string($conexion,$_REQUEST['Descripcio']);
$update="UPDATE `recurs` SET `rec_estat` = 2 WHERE `recurs`.`rec_id` = $rec_id;";
$consulta=mysqli_query($conexion,$update);
$update="UPDATE `recurs` SET `rec_descripcio`= '$desc' WHERE `recurs`.`rec_id` = $rec_id;";
echo"$update";

$consulta=mysqli_query($conexion,$update);
  echo"<form name=login method=post action=../misreservas.php>";
  echo"<input type=hidden name=idusu value=$idusu>";
 echo"<input type=submit value=Tornar a les meves reserves>";
  echo "</form>";


}
?>
