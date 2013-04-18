<!DOCTYPE html>
<html>
<head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
      <link rel="stylesheet" href="css/estilos.css" />
      <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
      <script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>

</head>

<body>

<?php
//session_start();
require_once('funciones.php');
//conectar('68.178.140.218', 'metapp', 'mike28veceS@', 'metapp');
conectar('localhost', 'root', '', 'mylittlemagicbook');

//Recibir
$user = strip_tags($_POST['user']);
//$pass = strip_tags(sha1($_POST['pass']));
$pass = strip_tags($_POST['pwd']);

//origuinal $query = @mysql_query('SELECT * FROM tutorial1_usuarios WHERE user="'.mysql_real_escape_string($user).'" AND pass="'.mysql_real_escape_string($pass).'"');
// segunda
$consulta  = "select nombre_usuario from usuarios where usuario = '".mysql_real_escape_string($user)."' and password = '".mysql_real_escape_string($pass)."';";
$query = @mysql_query($consulta);

if($existe = @mysql_fetch_object($query))
{
	$_SESSION['logged'] = 'yes';
	$_SESSION['user'] = $user;
	//echo $consulta;
        echo '<script>window.location="../../principal.php"</script>';
     
}else{
	echo 'El usuario y/o pass son incorrectos.';	
        echo $consulta;
}
?>
</body>
</html>
