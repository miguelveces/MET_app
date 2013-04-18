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
        $libro = strip_tags($_POST['libro']);               
        $frase = strip_tags($_POST['frase']);
        $bandera = strip_tags($_POST['banda']);
        $audio = null;
        //$fecha = 
        $traduccion = strip_tags($_POST['frase_t']);
        $activa = strip_tags($_POST['radio-choice-2']);
        //comandos para subir los archivos
        $carpeta = "../../audios/" . $libro . "/";
        opendir($carpeta);
        $destino = $carpeta . $_FILES['audio']['name'];
        $tamanio = $_FILES['audio']['size'];
        $tipo = $_FILES['audio']['type'];        
       // if () {
            
            move_uploaded_file($_FILES['audio']['tmp_name'], $destino);
            $audio = $destino;

            $update = 'UPDATE mylittlemagicbook.frases  SET  frase = \''.$frase.'\', '.
                    ' audio_frase = \''.$audio.'\', ultima_fecha = sysdate(),'.
                    ' activo = '.$activa.', frase_traducida = \''.$traduccion.'\' WHERE id='.$bandera.';';
            $meter = @mysql_query($update);
            if ($meter) {
                echo $update;
                //echo '<script>  alert("Se insertaron los registros con exito");window.location="../../principal.php"</script>';
            } else {
                echo 'Hubo un error en al intentar registrar los campos.';
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

