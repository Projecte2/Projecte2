<?php
$conexion= mysqli_connect("localhost","root","","bd_reserva");

if ($conexion==false) {
    echo"<p align=center><h3>No s'ha pogut connectar a la base de dades, revisi lusuari,la contrasenya,la ip o el nom de la BD</h3></p><br><br>";
}
else{
//filtre
$idusu['idusu'];

echo"<form method=post action=../funciolliures.php>";
        $sql2="SELECT DISTINCT rec_tipus FROM recurs";
        $qtalla= mysqli_query($conexion, $sql2);

        echo "<select name=filtre  id=textbox required><br>";
		echo"<option value=tots>Tots</option>";
        while ($row2=mysqli_fetch_array($qtalla)) {
                echo"<option value=$row2[rec_tipus]>$row2[rec_tipus]</option>";

            }
		echo "</select><br>";
		echo"<input type=hidden name=idusu value=$idusu>";
		echo"<input type=text name=text placeholder=Nom del recurs>";
		echo"<input type=submit value=Buscar>";
echo "</form><br>";
}

?>
