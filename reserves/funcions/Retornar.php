<?php
$conexion= mysqli_connect("localhost","root","","bd_reserva");

if ($conexion==false) {
    echo"<p align=center><h3>No s'ha pogut connectar a la base de dades, revisi lusuari,la contrasenya,la ip o el nom de la BD</h3></p><br><br>";
}
else{
echo"<h1><p align=center>S'ha retornat el recurs correctament</p></h1>";
error_reporting(0);
$rec_id=$_REQUEST['rec_id'];
//echo"$rec_id";

$update="UPDATE `recurs` SET `rec_estat` = 1 WHERE `recurs`.`rec_id` = $rec_id;";
$consulta=mysqli_query($conexion,$update);
$update="UPDATE `recurs` SET rec_alliberacio=now() WHERE `recurs`.`rec_id` = $rec_id;";
$consulta=mysqli_query($conexion,$update);

$delete="DELETE FROM `reserva` WHERE `reserva`.`rec_id` = $rec_id";
$borrar=mysqli_query($conexion,$delete);
echo"<p align=center><a href=misreservas.php>Tornar</a></p>";
header('Location:misreservas.php');
}
?>