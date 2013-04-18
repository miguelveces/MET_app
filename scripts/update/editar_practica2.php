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
        $id_practica= strip_tags($_POST['var']);
        $frase = strip_tags($_POST['frases']);               
       
        
       $update = 'UPDATE mylittlemagicbook.practica2 SET  acomoda_frase = \''.$frase.'\', fecha = sysdate() WHERE id = '.$id_practica.';';
            $meter = @mysql_query($update);
            if ($meter) {
                echo '<script>  alert("Se insertaron los registros con exito");window.location="../../examen.php"</script>';
            } else {               
                echo '<script> alert("Hubo un error en al intentar registrar los campos.");window.location="../../examen.php" </script>';
                
            }
        
 ?>
    </body>
</html>