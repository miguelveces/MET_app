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
        require_once('../conexion/conexion.php');


//Recibir
        $libro = strip_tags($_POST['id_padre']);        
        $tema = strip_tags($_POST['id_hija']);
        $palabra = strip_tags($_POST['palabra']);
        $palabraT =strip_tags($_POST['palabraT']);
        

            $insert = "INSERT INTO mylittlemagicbook.vocabularios(id_libro, id_tema, palabra, traduccion, fecha_modificacion)".
                "VALUES (". $libro.", ".$tema.", '". $palabra ."', '".$palabraT."', sysdate());";

            $meter = @mysql_query($insert);
            if ($meter) {
                echo '<script>  alert("Se insertaron los datos correctamente!");window.location="../../vocabulario.php"</script>';
            } else {
             echo '<script>  alert("Error! verificar los datos a insertar");window.location="../../vocabulario.php"</script>';
            }
       
//}
        ?>
    </body>
</html>

