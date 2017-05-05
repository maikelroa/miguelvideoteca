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
 //	si el usuario ha dado al botón Registrar  
if(isset($_POST["register"])){
// si escribe
 //numero de tarjeta y clave
if(!empty($_POST['numero_tarjeta']) && !empty($_POST['password'])) {

 $nombre=$_POST['full_name'];
 $apellidos=$_POST['apellidos'];
 $telefono=$_POST['telefono'];
 $numero_tarjeta=$_POST['numero_tarjeta'];
 $password=$_POST['password'];
 $query=mysql_query("SELECT * FROM cliente WHERE numero_tarjeta='".$numero_tarjeta."'");
//Creamos variable $numrows y le asignamos 

 $numrows=mysql_num_rows($query);
 
 
 if($numrows==0)
 {
 $sql="INSERT INTO cliente
 (nombre, apellidos, telefono, numero_tarjeta, password)
 VALUES ('$nombre','$apellidos','$telefono','$numero_tarjeta','$password')";
 
$result=mysql_query($sql);
 
 if($result){
 $message = "Bienvenido, ' $nombre','$apellidos'";
 } else {
 $message = "Error al ingresar datos de la informacion!";
 }
 
} else {
 $message = "El nombre de usuario ya existe! Por favor, intenta con otro!";
 }
 
} else {
 $message = "Todos los campos no deben de estar vacios!";
}
}
?>
 
<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
 
<div class="container mregister">
 <div id="login">
 <h1>Registrar</h1>
<form name="registerform" id="registerform" action="register.php" method="post">
	 <p>
	 <label for="nombre">Nombre<br />
	 <input type="text" name="full_name" id="full_name" class="input" size="32" value="" /></label>
	 </p>
	 <label for="apellidos">Apellidos <br />
	 <input type="text" name="apellidos" id="apellidos" class="input"  value="" size="32" /></label> 
	 <p>
	 <label for="telefono">Telefono<br />
	 <input type="text" name="telefono" id="telefono" class="input"  value="" size="9" /></label>
	 <p>
	 <label for="numero_tarjeta">Numero de Tarjeta<br />
	 <input type="text" name="numero_tarjeta" id="numero_tarjeta" class="input" value="" size="20" /></label>
	 </p>
	 <p>
	 <label for="password">Password<br />
	 <input type="text" name="password" id="password" class="input" value="" size="20" /></label>
	 </p>
 
 
<p class="submit">
 <input type="submit" name="register" id="register" class="button" value="Registrar" />
 </p>
 
 <p class="regtext">Ya tienes una cuenta? <a href="login.php" >Entra Aquí!</a>!</p>
</form>
 
 </div>
 </div>
 
	<footer></footer>	
</body>
</html>