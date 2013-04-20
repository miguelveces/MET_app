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
        $palabra = strip_tags($_POST['palabra']);
        $bandera = strip_tags($_POST['banda']);        
        $traduccion = strip_tags($_POST['palabraT']);                                                   
            $update = 'UPDATE mylittlemagicbook.vocabularios  SET  palabra = \''.$palabra.'\', '.
                    ' traduccion = \''.$traduccion.'\', fecha_modificacion = sysdate()'.
                    ' WHERE id='.$bandera.';';
            $meter = @mysql_query($update);
            if ($meter) {
                echo $update;
                echo '<script>  alert("Se insertaron los registros con exito");window.location="../../vocabulario.php"</script>';
            } else {                
                echo '<script>  alert("Hubo un error en al intentar registrar los campos.");window.location="../../vocabulario.php"</script>';
                echo $insert;
            }
       // } else {
          //  echo '<script>  alert("El audio seleccionado pesa demaciado!!");window.location="../../principal.php"</script>';
           // throw new UploadException($_FILES['file']['error']);
      // }      
//}        
        ?>
    </body>
</html>

