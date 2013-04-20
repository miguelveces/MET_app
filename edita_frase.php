<!DOCTYPE html>
<html>
    <head>
        <title>..::Mantenedor My English Time APP::..</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/estilos.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet"  href="jquery/css/themes/default/jquery.mobile-1.3.0.css">        
        <link rel="shortcut icon" href="jquery/favicon.ico">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <script src="jquery/js/jquery.js"></script>
        <script src="js/validadores.js"></script>
        <script src="jquery/_assets/js/jquery.mobile.demos.js"></script>
        <script src="jquery/js/jquery.mobile-1.3.0.js"></script>        
    </head>
    <body>
        <section id="frases" data-role="page">
            <header>
                <h1 id="titulo">My Little Magic Book </h1>        
                <div class="logo">
                    <a href="http://myenglishtime.net/">
                        <img src="img/LogoMET.png" id="logo" >        
                    </a>      
                </div>    
            </header>
            <article data-role="content">
                <br/>
                <nav data-role="navbar">
                    <ul>
                        <li><a href="principal.php">Inicio</a></li>
                        <li><a href="vocabulario.php">Tema / Vocabulario</a></li>
                        <li><a href="examen.php">Crear temas de quiz</a></li>
                        <li><a href="descargas.php">Demo</a></li> 
                        <li><a href="scripts/cerrar_sesion.php">cerrar sesion</a></li>
                    </ul>
                </nav>
                <br/>
                <label id="titulo_medio"> <strong> Editar datos de las Frases </strong></label>
                <br/>
                <br/>
                <!-- este es el div para el forulario -->

                <div class="formulario">                
                    <form data-ajax="false"  method="POST" enctype="multipart/form-data">                                                                
                        <ul data-role="listview">

                            <?php
                            error_reporting(E_ERROR | E_WARNING | E_PARSE);
                            // Conexión a la BD
                            include "scripts/conexion/conexion.php";
                            if (!$conexion) {
                                die('No se puede conectar: ' . mysql_error());
                            }
                            $flag = htmlspecialchars($_GET["bandera"]);
                            $sql = "select libro_id, frase, frase_traducida, audio_frase,  activo from frases where id = " . $flag;
                            $result = @mysql_query($sql, $conexion);
                            if (!$result) {
                                echo " fallo al momento de hacer la consulta";
                            } else {
                                #echo "<select name='select-choice-a' id='select-choice-a' data-native-menu='false' >";
                                while ($fila = mysql_fetch_array($result)) {
                                    $cheq1 = null;
                                    $cheq2 = null;
                                    if ($fila['activo'] == 1) {
                                        $cheq1 = "checked=\"checked\"";
                                    } else {
                                        $cheq2 = "checked=\"checked\"";
                                    }

                                    echo " <li data-role=\"fieldcontain\">\n";

                                    echo "</li>";



                                    echo "<li data-role=\"fieldcontain\">";
                                    echo "<div data-role=\"fieldcontain\">";
                                    echo " <label for=\"frase\">Editar descripcion de la Frase</label>";
                                    echo "<textarea cols=\"40\" rows=\"8\" name=\"frase\" id=\"frase\">" . $fila['frase'] . "</textarea>";
                                    echo "</div>";
                                    echo " </li>";

                                    echo " <li data-role=\"fieldcontain\">";
                                    echo "<div data-role=\"fieldcontain\">";
                                    echo "<input type=\"hidden\" id=\"libro\" name=\"libro\" value=\"" . $fila['libro_id'] . "\"/>";
                                    echo "<input type=\"hidden\" id=\"banda\" name=\"banda\" value=\"" . $flag . "\"/>";
                                    echo "  <label for=\"frase_t\">Editar Frase traducida</label>";
                                    echo " <textarea cols=\"40\" rows=\"8\" name=\"frase_t\" id=\"frase_t\">" . $fila['frase_traducida'] . "</textarea>";
                                    echo "</div>";
                                    echo "</li>";

                                    echo " <li>";
                                    echo " <div data-role=\"fieldcontain\">";
                                    echo "<fieldset data-role=\"controlgroup\">";
                                    echo "  <legend>Editar estado:</legend>";
                                    echo "  <input type=\"radio\" name=\"radio-choice-2\" id=\"radio-choice-21\" value=\"1\" " . $cheq1 . " />";
                                    echo " <label for=\"radio-choice-21\">Activado</label>";
                                    echo "<input type=\"radio\" name=\"radio-choice-2\" id=\"radio-choice-22\" value=\"2\" " . $cheq2 . " />";
                                    echo "<label for=\"radio-choice-22\">Desactivado</label>";
                                    echo " </fieldset>";
                                    echo "</div>";
                                    echo "</li>";
                                    echo " <li data-role=\"fieldcontain\">";
                                    $audio = substr($fila['audio_frase'], 15);
                                    //$audio = "veces";                           
                                    $valor = null;
                                    if ($audio === "") {
                                        echo '<script>  alert("Nota: no hay audio para esta frase")</script>';
                                        $valor = "No ha subido audio para esta frase...";
                                    } else {
                                        $valor = "Archivo actual: " . $audio;
                                    }
                                    echo " <h2>" . $valor . " </h2>";
                                    echo " <br>";
                                    echo " <label for=\"audio\">cambiar audio</label>";
                                    echo "  <input type=\"file\" name=\"audio\" id=\"audio\"/>";
                                    echo " </li>";
                                    echo " <li>";
                                    echo " <div id=\"enviar2\">";

                                    echo " <input type=\"submit\" onclick = \"this.form.action = 'scripts/update/editar_vocabulario.php'\" value=\"Actualizar\" onsubmit=\"validar_frase()\" />";
                                    echo " <label name=\"mensaje\" />";
                                    echo "</div>";

                                    echo "</li>";
                                }
                            }
                            ?>
                        </ul>
                    </form> 
                </div>
            </article>
            <footer data-role="footer" data-theme="c" data-position="fixed"
                    data-fullscreen="true">
                <p id="pie2">&copy; 2013 My English time by <a id="pie" href="#">FDSystems.com</a></p>
            </footer><!-- /footer -->
        </section>
    </body>
</html>
