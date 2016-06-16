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
        $bd = ConexionDB::getInstance();
        $id_practica = strip_tags($_POST['flag']);
        $pregunta = strip_tags($_POST['pregunta']);
        $respesta1 = strip_tags($_POST['respuesta1']);
        $respesta2 = strip_tags($_POST['respuesta2']);
        $respesta3 = strip_tags($_POST['respuesta3']);

        $update = 'UPDATE mantenedor.practica SET  pregunta = \'' . $pregunta . '\', ' .
                ' respuesta1 = \'' . $respesta1 . '\', respuesta2 = \'' . $respesta2 . '\', respuesta3 = \'' . $respesta3 . '\', fecha = sysdate()  WHERE id =  ' . $id_practica . ';';
        $meter = $bd->ejecutar($update);
        if ($meter) {

            echo '<script>  alert("Se insertaron los registros con exito");window.location="../../examen.php"</script>';
        } else {
            //echo $update;
            echo '<script> alert("Hubo un error en al intentar registrar los campos.");window.location="../../examen.php" </script>';
        }
        ?>
    </body>
</html>