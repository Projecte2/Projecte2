<?php
$conexion= mysqli_connect("localhost","root","","bd_reserva");

if ($conexion==false) {
    echo"<p align=center><h3>No s'ha pogut connectar a la base de dades, revisi lusuari,la contrasenya,la ip o el nom de la BD</h3></p><br><br>";
}
else{
error_reporting(0);
$idusu=$_REQUEST['idusu'];
//echo"$idusu";
switch ($idusu) {
    case '1':
	echo"<h1>INCIDENCIES</h1>";
			echo"<br>";
					echo"<br>";
          //funcions admin
		  $recurs="SELECT * FROM recurs WHERE rec_estat=2";
		  $queryrecurs=mysqli_query($conexion,$recurs);

          if (mysqli_num_rows($queryrecurs)>0) {

		$camp = array("ID", "Nom", "Tipus", "Data d'Inici","Data alliberament","S'ha reservat ","Estat","Imatge","Descripcio");


		  while ($registro=mysqli_fetch_array($queryrecurs)) {

			for ($a=0;$a<9 ;$a++ ) {
					switch ($a) {
				case (0):
					$recursid="$registro[rec_id]";
				break;
				case (1):
					   echo"$camp[$a]: ";
					   echo"$registro[$a] <br>";
				break;
				case (3):
					    echo"<font size=1>$camp[$a]: </font>";
					    echo"<font size=1>$registro[$a] <br></font>";
				break;
				case (4):
				break;
				case (5):
			    break;
				case (6);
				break;
				case (7):
				 echo"<img src=$registro[$a] width=350 height=200> <br>";
				break;
				case (8):
					echo"$camp[$a]: ";
					echo"$registro[$a] <br>";
				break;
			    default:
					echo"$camp[$a]: ";
				    echo"$registro[$a] <br>";
				break;
						}
				}
					echo"<form method=post action=IncidenciaResolta.proc.php>";
				    echo"<br><input type=hidden name=rec_id value=$recursid>";
				    echo"<br><input type=hidden name=idusu value=$idusu>";
				    echo"<input type=submit value='Incid�ncia resolta'>";
					echo"</form>";
					echo"<br>";
					echo"<br>";
			}
			}
			else{
			echo"Tot correcte";
			}

	      //SELECT * FROM recurs WHERE rec_estat=2
		  //boto incidencia resolta-> UPDATE estat =1 data lliberacio=

    break;
	default:


$reserva="SELECT * FROM reserva WHERE usu_id=$idusu";
//echo"$reserva";
$consulta=mysqli_query($conexion,$reserva);
if (mysqli_num_rows($consulta)>0) {
	$i=0;
$camp = array("ID", "Nom", "Tipus", "Data d'Inici","Data alliberament","S'ha reservat ","Estat","Imatge","Descripcio");
	while ($registro=mysqli_fetch_array($consulta)) {
	//echo"$registro[rec_id] <br>";
	$recursid="$registro[rec_id]";
	$recursarray[$i] = $recursid;

	$recurs="SELECT * FROM recurs WHERE rec_id=$recursarray[$i] AND rec_estat=0";
	$i++;
	$queryrecurs=mysqli_query($conexion,$recurs);
	if (mysqli_num_rows($queryrecurs)>0) {
		while ($recursmostrar=mysqli_fetch_array($queryrecurs)) {
				for ($a=0;$a<8 ;$a++ ) {
					switch ($a) {
				case (1):
					   echo"$camp[$a]: ";
					    echo"$recursmostrar[$a] <br>";
				break;
				case (3):
					    echo"<font size=1>$camp[$a]: </font>";
					    echo"<font size=1>$recursmostrar[$a] <br></font>";
				break;
				case (4):
					 echo"<font size=1>$camp[$a]: </font>";
				     echo"<font size=1>$recursmostrar[$a] <br></font>";
				break;
				case (5):
					echo"$camp[$a]: ";
				    echo"$recursmostrar[$a] vegades<br>";
			    break;
				case (6):

				break;
				case (7):
				    echo"<img src=$recursmostrar[$a] width=350 height=200> <br>";
				break;
			    default:
					echo"$camp[$a]: ";
				    echo"$recursmostrar[$a] <br>";
				break;
						}
				}

			echo"<form method=post action=funcions/Retornar.proc.php>";
				   echo"<br><input type=hidden name=rec_id value=$recursid>";
				   echo"<input type=hidden name=idusu value=$idusu>";
				   echo"<input type=submit value=Retornar>";
			echo"</form>";


			echo"<form method=post action=funcions/Incidencies.proc.php>";
				   echo"<textarea rows=5 cols=40 name='Descripcio' placeholder='Escriu el problema que t� el recurs'></textarea>";
				   echo"<input type=hidden name=rec_id value=$recursid><br>";
				   echo"<input type=hidden name=idusu value=$idusu>";
				   echo"<input type=submit value='Publicar Incid�ncia'><br><br>";
   				//  echo"<input type=hidden name=usu_id value=$id>";
			echo"</form>";

}
}


}
//print_r ($recursarray);

}
else{
echo"No hi ha reserves";
}


	break;
}


}

?>
