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
        $idioma = 2;
        $tema = strip_tags($_POST['id_hija']);
        $frase = strip_tags($_POST['frase']);
        $audio = "veces";
        //$fecha = 
        $traduccion = strip_tags($_POST['frase_t']);
        $activa = strip_tags($_POST['radio-choice-2']);
        //comandos para subir los archivos
        $carpeta = "../../audios/" . $libro . "/";
        opendir($carpeta);
        $destino = $carpeta . $_FILES['audio']['name'];
        $tamanio = $_FILES['audio']['size'];
        $tipo = $_FILES['audio']['type'];
        echo $tamanio;
            echo "esta es una prueba "."$tipo";
        //if ()) {
            
            move_uploaded_file($_FILES['audio']['tmp_name'], $destino);
            $audio = $destino;

            $insert = 'INSERT INTO mylittlemagicbook.frases(libro_id, idioma_id, tema_id, ' .
                    'frase, audio_frase, ultima_fecha, activo, frase_traducida) VALUES (' . $libro . ', ' . $idioma . ' , ' . $tema . ',' .
                    ' \'' . $frase . '\', \'' . $audio . '\', sysdate(), ' . $activa . ', \'' . $traduccion . '\');';

            $meter = @mysql_query($insert);
            if ($meter) {
                echo $insert;
               // echo '<script>  alert("Se insertaron los registros con exito");window.location="../../principal.php"</script>';
            } else {
                echo 'Hubo un error en al intentar registrar los campos.';
                echo $insert;
            }
       // } else {
          //  echo '<script>  alert("El audio seleccionado pesa demaciado!!");window.location="../../principal.php"</script>';
           // throw new UploadException($_FILES['file']['error']);
       //}      
//}        
        ?>
    </body>
</html>

