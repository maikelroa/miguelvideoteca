 <?php
session_start();
?>
<?php require_once("includes/connection.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"  />
	<title>Inicio de sesión</title>
	<link href="css/estilos.css" media="screen" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 

<body>
 
<?php
 
if(isset($_SESSION["session_username"])){
// echo "Session is set"; // for testing purposes
header("Location: intropage.php");
}
 
if(isset($_POST["login"])){
 
if(!empty($_POST['username']) && !empty($_POST['password'])) {
 $username=$_POST['username'];
 $password=$_POST['password'];
 
$query =mysql_query("SELECT * FROM cliente WHERE numero_tarjeta='".$username."' AND password='".$password."'");
 
$numrows=mysql_num_rows($query);
 if($numrows!=0)
 
{
 while($row=mysql_fetch_assoc($query))
 {
 $dbusername=$row['numero_tarjeta'];
 $dbpassword=$row['password'];
 $nombreUsuario=$row['nombre'];
 }
if($username == $dbusername && $password == $dbpassword)
 
{
 
 $_SESSION['session_username']=$username;
 $_SESSION['nombre_usuario']=$nombreUsuario;
 
/* Redirect browser */
 header("Location: intropage.php");
 }
 } else {
 
$message = "Nombre de usuario o contraseña inválida!";
 }
 
} else {
 $message = "Todos los campos son requeridos!";
}
}
?>
 
 <div class="container mlogin">
 <div id="login">
 <h1>Logueo</h1>
<form name="loginform" id="loginform" action="" method="POST">
 <p>
 <label for="user_login">Numero tarjeta<br />
 <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
 </p>
 <p>
 <label for="user_pass">Contraseña<br />
 <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
 </p>
 <p class="submit">
 <input type="submit" name="login" class="button" value="Entrar" />
 </p>
 <p class="regtext">No estas registrado? <a href="register.php">Registrate Aquí</a>!</p>
</form>
 
</div>
 
</div>
 
	 
	<footer></footer>	
</body>
</html>
 
 <?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>