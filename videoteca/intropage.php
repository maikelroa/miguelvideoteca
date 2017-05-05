<?php
session_start();
require_once("includes/connection.php");
if(!isset($_SESSION["session_username"])) {
 header("location:login.php");
} else {
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Inicio de sesión</title>
	<link href="css/estilos.css" media="screen" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 

<body>
	<div id="welcome">
	 <h2>Bienvenido, <span><?php echo $_SESSION['nombre_usuario'];?>! </span></h2>
	 <p><a href="logout.php">Finalice</a> sesión aquí!</p>
	 <p><a href="editar.php">Pulse aquí </a> para cambiar su datos</p>
	</div>
	 <TABLE border=2 align= center bgcolor= yellow width=600>
 
<caption> <h2><strong><u> Tabla de <i> PELICULAS </i></u></strong></h2> </caption>

<p><p><p>

<tr bgcolor="aqua">

      <th> TITULO <th> PROTAGONISTA <th> DIRECTOR  <th> CODIGO PEL
<?php

//consulta a la tabla peliculas 
//Recorrer los datos como en editar.php

$consulta = "select * from peliculas";
$resultado = mysql_query($consulta);
while ($row=mysql_fetch_assoc($resultado)){
	echo "<tr bgcolor=white><td>".$row['titulo']."</td><td>".$row['protagonista']."</td><td>".$row['director']."</td><td>".$row['codigo_pelicula']."</td></tr>";
}



?>

<!--



       <td> El señor de los anillos     <td> Peter Jackson <td> Martin Freeman <td> 2546

<tr bgcolor=silver>

       <td> Indiana Jones  <td> Harrison Ford  <td> Steven Spielberg <td> 1025 

<tr bgcolor=white>

       <td> Gladiator <td> Russel Crowe   <td> Ridley Scott <td> 5694 

<tr bgcolor=silver>

       <td> Scream <td> Neve Campbell   <td> Wes Craven <td> 4691

<tr bgcolor=white>

       <td> American Beauty <td>  Kevin Spacey  <td> Sam Mendes	  <td> 4752-->

</table>


<br><br><br>
<a href="newfilms.php">Crear pelis</a>

Pinchando <a href="#inicio pag"> <h3> AQUI </h3> </a> vamos al inicio de la pagina.

<a name="final pag">


</BODY>
	<footer></footer>	
</body>
</html>
 
<?php
}
?>
