<?php require_once("includes/connection.php"); 
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Edicion de datos</title>
	<link href="css/estilos.css" media="screen" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 

<body>
 
 <?php
 //Consultar el usuario que ha iniciado sesión con la variable $_SESSION
 // SELECT
 // Leo los campos que me devuelve la query
$consulta = "select * from cliente where numero_tarjeta='".$_SESSION["session_username"]."'";
echo $consulta;
$resultado = mysql_query($consulta);
$datos_cliente = mysql_fetch_assoc($resultado);
  
 
if(isset($_POST["register"])){
 
if(!empty($_POST['full_name']) && !empty($_POST['user_pass']) && !empty($_POST['password'])) {
 $nombre=$_POST['full_name'];
 $apellidos=$_POST['apellidos'];
 $telefono=$_POST['telefono'];
 $user_pass=$_POST['user_pass'];
 $password=$_POST['password'];
 $query=mysql_query("SELECT * FROM cliente WHERE numero_tarjeta='".$user_pass."'");
 $numrows=mysql_num_rows($query);
 

 if($numrows>0)
 {
 $sql="UPDATE cliente SET numero_tarjeta='$user_pass', password='$password', nombre='$nombre', apellidos='$apellidos',telefono='$telefono' WHERE numero_tarjeta='".$user_pass."'";
 
 echo $sql;
$result=mysql_query($sql);
 
 if($result){
 $message = "Bienvenido, '$nombre $apellidos'";
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
 <h1>Editar</h1>
<form name="registerform" id="registerform" action="editar.php" method="post">
	 <p>
	 <label for="full_name">Nombre<br />
	 <input type="text" name="full_name" id="full_name" class="input" size="32" value="<?php echo $datos_cliente['nombre'];?>" /></label>
	 </p>
	 <label for="apellidos">Apellidos <br />
	 <input type="text" name="apellidos" id="apellidos" class="input"  value="<?php echo $datos_cliente['apellidos'];?>" size="32" /></label> 
	 <p>
	 <label for="telefono">Telefono<br />
	 <input type="text" name="telefono" id="telefono" class="input"  value="<?php echo $datos_cliente['telefono'];?>" size="9" /></label>
	 <p>
	 <label for="user_pass">Numero de Tarjeta<br />
	 <input type="text" name="user_pass" id="user_pass" class="input" value="<?php echo $datos_cliente['numero_tarjeta'];?>" size="20" /></label>
	 </p>
	 <p>
	 <label for="password">Password<br />
	 <input type="text" name="password" id="password" class="input" value="<?php echo $datos_cliente['password'];?>" size="20" /></label>
	 </p>
 
 
<p class="submit">
 <input type="submit" name="register" id="register" class="button" value="Guardar" />
 </p>
 
 <p class="regtext">Ya tienes una cuenta? <a href="login.php" >Entra Aquí!</a>!</p>
</form>
 
 </div>
 </div>
 
	<footer></footer>	
</body>
</html>