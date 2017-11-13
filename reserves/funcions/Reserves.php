<?php

error_reporting(0);
$conexion= mysqli_connect("localhost","root","","bd_reserva");

if ($conexion==false) {
    echo"<p align=center><h3>No s'ha pogut connectar a la base de dades, revisi lusuari,la contrasenya,la ip o el nom de la BD</h3></p><br><br>";
}
else{
echo"<h1><p align=center>S'ha reservat el recurs escollit correctament</p></h1>";
//error_reporting(0);
//$id=$_REQUEST['usuari'];

$idrecurs=$_REQUEST['recursid'];
//echo"$rec_id";

$update="UPDATE `recurs` SET `rec_estat` = '0'AND rec_alliberacio = NULL WHERE `recurs`.`rec_id` = $idrecurs;";
$consulta=mysqli_query($conexion,$update);
$update="UPDATE `recurs` SET `rec_inici` = now() WHERE `recurs`.`rec_id` = $idrecurs;" ;
$consulta=mysqli_query($conexion,$update);
$insert="INSERT INTO `reserva` WHERE `reserva`.`rec_id` = $idrecurs";
$insertar=mysqli_query($conexion,$insert);
echo"<p align=center><a href=misreservas.php>Tornar</a></p>";
header('Location:misreservas.php');
}
?>
