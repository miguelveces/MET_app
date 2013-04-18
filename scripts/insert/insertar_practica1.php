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
        $pregunta = strip_tags($_POST['fr']);       
        //$fecha = 
        $respuesta1 = strip_tags($_POST['respuesta1']);
        $respuesta2 = strip_tags($_POST['respuesta2']);
        $respuesta3 = strip_tags($_POST['respuesta3']);        
      
            $insert = 'INSERT INTO mylittlemagicbook.practica '.
                    '(libro_id, tema_id, pregunta, respuesta1, respuesta2, respuesta3, fecha) '.
                    'VALUES ('.$libro.', '.$tema.', \''.$pregunta.'\', \''.$respuesta1.'\', \''.$respuesta2.'\','.
                    ' \''.$respuesta3.'\', sysdate());';
            $meter = @mysql_query($insert);
            if ($meter) {
               
                echo '<script>  alert("Se insertaron los registros con exito");window.location="../../examen.php"</script>';
            } else {
                echo '<script>  alert("Error! revise los datos");window.location="../../examen.php"</script>';
            }
             
//}        
        ?>
    </body>
</html>

