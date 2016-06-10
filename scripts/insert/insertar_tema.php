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
        require '../NuevaConexion/ConexionDB.php';
        /* Incluimos el fichero de la clase Conf */
        require '../NuevaConexion/Conf.php';

        /* Creamos la instancia del objeto. Ya estamos conectados */
        $bd = ConexionDB::getInstance();
        //require_once('../conexion/conexion.php');


//Recibir
        $libro = strip_tags($_POST['select-choice-a']);
        $idioma = 2;
        $tema = strip_tags($_POST['tema']);
        $descripcion = strip_tags($_POST['descripcion']);

        $insert = "INSERT INTO mantenedor.temas (libro_id, idioma_id, nombre_tema, descripcion_tema, ultima_fecha)" .
                "VALUES (" . $libro . ", " . $idioma . ", '" . $tema . "', '" . $descripcion . "', sysdate());";

        $meter = $bd->ejecutar($insert); //@mysql_query($insert);
        if ($meter) {
            echo '<script>  alert("Se insertaron los datos correctamente");window.location="../../vocabulario.php"</script>';
        } else {
            echo '<script>  alert("Error! al insertar datos");window.location="../../vocabulario.php"</script>';
        }

//}
        ?>
    </body>
</html>

