<?php require_once("includes/connection.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>registro</title>
	<link href="css/estilos.css" media="screen" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 

<body>
 
 <?php
 //	si el usuario ha dado al botón para introducir una nueva película
if(isset($_POST["insertfilm"])){

 
if(!empty($_POST['titulo']) && !empty($_POST['director'])) {
 $codigo = 			$_POST['codigo'];
 $titulo = 			$_POST['titulo'];
 $director = 		$_POST['director'];
 $protagonista = 	$_POST['protagonista'];
 $estreno = 		$_POST['estreno'];
 $genero = 			$_POST['genero'];
 $disponibilidad = 	$_POST['disponibilidad'];
 $precio_alquiler = $_POST['precio_alquiler'];
 $query = mysql_query("SELECT * FROM peliculas WHERE codigo_pelicula='".$codigo."'");
//Creamos variable $numrows y le asignamos 

 $numrows = mysql_num_rows($query);
 echo var_dump($numrows);
 
 if($numrows == 0)
 {
 $sql="INSERT INTO peliculas
 (codigo_pelicula, titulo, director, protagonista, fecha_estreno, genero, disponibilidad, precio_alquiler)
 VALUES ('$codigo','$titulo','$director','$protagonista','$estreno','$genero','$disponibilidad','$precio_alquiler')";
 
$result = mysql_query($sql);
 
 if($result){
 $message = "Película insertada";
 } else {
 $message = "Error al ingresar datos de la informacion!";
 }
 
} else {
 $message = "La pelicula ya existe entre las registradas!";
 }

} else {
 $message = "Ninguno de los campos puede quedar vacio!";
}
}
?>
 
<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
 
<div class="container mregister">
 <div id="newfilms">
 <h1>Nuevas peliculas</h1>
<form name="insertfilmform" id="insertfilmform" action="newfilms.php" method="post">
	<p>
	 <label for="codigo">Codigo<br />
	 <input type="number" name="codigo" id="codigo" class="input" size="4" value="" /></label>
	 </p>
	 <p>
	 <label for="titulo">Titulo<br />
	 <input type="text" name="titulo" id="titulo" class="input" size="100" value="" /></label>
	 </p>
	 <p>
	 <label for="director">Director<br />
	 <input type="text" name="director" id="director" class="input"  value="" size="70" /></label> 
	 <p>
	 <label for="protagonista">Protagonista<br />
	 <input type="text" name="protagonista" id="protagonista" class="input"  value="" size="70" /></label>
	 </p>
	 <p>
	 <label for="estreno">Fecha_estreno<br />
	 <input type="date" name="estreno" id="estreno" class="input" size="100" value="" /></label>
	 </p>
	 <p>
	 <label for="genero">Genero<br />
	 <select name="OS">
	
	<?php	
		$consulta = "select * from genero";
		$resultado = mysql_query($consulta);
		
		 while ($row = mysql_fetch_assoc($resultado)){
			echo "<option value='".$row['Id']."'>".$row['Nombre']."</option>"; 
		 }
   ?>
	</select>
	 <input name="genero" id="genero" class="input" value="" size="20" ><br /><br /></label>
	 </p>
	  <p>
	 <label for="disponibilidad">Disponibles<br />
	 <input type="number" name="disponibilidad" id="disponibilidad" class="input" size="2" value="" /></label>
	 </p>
	  <p>
	 <label for="number">Precio_alquiler<br />
	 <input type="text" name="precio_alquiler" id="precio_alquiler" class="input" size="4" value="" /></label>
	 </p>
	 
<p class="submit">
 <input type="submit" name="insertfilm" id="insertfilm" class="button" value="Guardar" />
 </p>
 
 <p class="regtext">Ponla en la lista<a href="intropage.php" >Entra Aquí!</a>!</p>
</form>
 
 </div>
 </div>
 
	<footer></footer>	
</body>
</html>