<?php

/**
 * Funcio per mostrar els registres, alliberats i ocupats també pagina i posa els resgistres en divs
 * @author  Ignasi Sanfeliu & Brenda Palomino & Anush
 * @version 1.0
*/

error_reporting(0);

$conexion= mysqli_connect("localhost","root","","bd_reserva");

if ($conexion==false) {
    echo"<p align=center><h3>No s'ha pogut connectar a la base de dades, revisi lusuari,la contrasenya,la ip o el nom de la BD</h3></p><br><br>";
}
else{
$seguent="seguent";
$anterior="anterior";
//paginat inici
$max=$_REQUEST['max'];
$id=$_REQUEST['id'];
$idusu=$_REQUEST['idusu'];



//if else per paginat amb siguiente anterior

if (isset($max)) {
    switch ($id) {
        case 'seguent':
            $max=$max+10;
            break;

        case 'anterior':
             $max=$max-10;
            break;
}
}
else {
$max=0;
	   }

    $query="SELECT * FROM recurs WHERE rec_estat=0 ORDER BY rec_alliberacio DESC LIMIT 10 OFFSET $max";
    $consulta=mysqli_query($conexion,$query);
	//echo"$query";

if (mysqli_num_rows($consulta)>0) {

//array de camps
$camp = array("ID", "Nom", "Tipus", "Data d'Inici","Data alliberament","S'ha reservat ","Estat","Imatge","Descripcio");

echo"<br>";
//bucle mostrar registres

//variable que conta els registres per la pagina externa. inicialitzada a 1 perque el id no es visualitza
	while ($registro=mysqli_fetch_array($consulta)) {


for ($i=1;$i<8 ;$i++) {

	switch ($i) {

		case (3):
		    echo"<font size=1>$camp[$i]: </font>";
		    echo"<font size=1>$registro[$i] <br></font>";
		break;
		case (4):
		    echo"<font size=1>$camp[$i]: </font>";
		    echo"<font size=1>$registro[$i] <br></font>";
		break;
		case (5):
		    echo"$camp[$i]";
		    echo"$registro[$i] vegades <br>";
		break;
		case (6):
		break;
		case (7):
		    echo"<img src=$registro[$i] width=350 height=200> <br>";
		break;
			    default:
				echo"$camp[$i]: ";
				echo"$registro[$i] <br>";
				break;
	}	//tanca switch
//boto reserar _>
}//tanca for
echo"<br>";
echo"<br>";
}//tanca while

//boto seguent anterior registre

	echo"<form method=post>";
	echo"<input type=hidden name=max value=$max>";
    echo"<input type=submit name=id value=$anterior> ";
	echo"<input type=submit name=id value=$seguent>";
	}//tanca if consulta>0
else{
echo"No s'han trobat mes recursos!";
echo"<br><a href=reserves/funciolliures.php>Torna</a>";
}
}//tanca else si s'ha fet be la conexio
	echo"</form>";
?>
