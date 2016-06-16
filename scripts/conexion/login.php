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
        /* Incluimos el fichero de la de cnexion a base de dats */
        require '../NuevaConexion/ConexionDB.php';
        /* Incluimos el fichero de la clase Conf */
        require '../NuevaConexion/Conf.php';
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pwd']);
        /* Creamos la instancia del objeto. Ya estamos conectados */
        $conexiondb = ConexionDB::getInstance();
        $consulta = "select nombre_usuario from usuarios where nombre_usuario = '" . $user . "' and password = '" . $pass . "';";
        /* Ejecutamos la query */
        $stmt = $conexiondb->ejecutar($consulta);

        if ($stmt === FALSE) {
            echo '<script>  alert("Problemas de conexion");window.location="../../index.php"</script>';
            echo  'Problemas de conexion';
            echo $consulta;
        } else {
            $num_rows = mysqli_num_rows($stmt);
            if ($num_rows < 1) {
                 echo '<script>  alert("El usuario y/o pass son incorrectos. ");window.location="../../index.php"</script>';
                echo'El usuario y/o pass son incorrectos.' . $num_rows . $consulta;
            } else {
                foreach ($stmt as $row) {
                    echo $row["nombre_usuario"] . '<br />';
                }
                session_start();
                $_SESSION['logged'] = 'yes';
                $_SESSION['user'] = $user;
                //echo $consulta;
                echo '<script>window.location="../../principal.php"</script>';
            }
        }
        
        $conexiondb->cerrarConexion();
        ?>
    </body>
</html>
