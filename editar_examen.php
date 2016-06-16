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

                <h2 cass="centro">Editar Prguntas para escojer la mejor respuesta</h2>
                <div data-role="collapsible-set" data-theme="b" data-content-theme="d">
                    <?php
                    /* Incluimos el fichero de la de cnexion a base de dats */
                    require 'scripts/NuevaConexion/ConexionDB.php';
                    /* Incluimos el fichero de la clase Conf */
                    require 'scripts/NuevaConexion/Conf.php';

                    $bd = ConexionDB::getInstance();
                    $id_libro = strip_tags($_POST['id_padre']);
                    $id_tema = strip_tags($_POST['id_hija']);
                    
                    $sql = "select id, pregunta, respuesta1, respuesta2, respuesta3 from practica " .
                            " where libro_id = " . $id_libro . " and tema_id = " . $id_tema . "";
                    
                    $result = $bd->ejecutar($sql);
                    if (!$result) {
                        echo " fallo al momento de hacer la consulta";
                    } else {

                         foreach ($result as $fila){

                            echo"<form data-ajax = \"false\" method = \"POST\" enctype = \"multipart/form-data\">";
                            echo"<div data-role = \"collapsible\">";
                            echo"<h2>" . $fila['pregunta'] . "</h2>";
                            echo"<ul data-role = \"listview\" data-filter = \"false\" data-filter-theme = \"c\" data-divider-theme = \"d\">";
                            echo"<li>";
                            echo"<div data-role = \"fieldcontain\">";
                            echo"<label for = \"pregunta\">Pregunta</label>";
                            echo"<textarea cols = \"40\" rows = \"8\" name = \"pregunta\" id = \"pregunta\">" . $fila['pregunta'] . "</textarea>";
                            echo"</div>";
                            echo"</li>";
                            echo"<li>";
                            echo"<label>Respuestas: </label>";
                            echo"<div class = \"ui-grid-b\">";
                            echo"<div class = \"ui-block-a\"><input type = \"text\" name = \"respuesta1\" id = \"respuesta1\" value=\"" . $fila['respuesta1'] . "\"/></div>";
                            echo"<div class = \"ui-block-b\"><input type = \"text\" name = \"respuesta2\" id = \"respuesta2\" value=\"" . $fila['respuesta2'] . "\"/></div>";
                            echo"<div class = \"ui-block-c\"><input type = \"text\" name = \"respuesta3\" id = \"respuesta3\" value=\"" . $fila['respuesta3'] . "\"/></div>";
                            echo"</div>";
                            echo"</li>";
                            echo"<li>";
                            echo"<div id = \"enviar2\">";
                            echo"<input type = \"hidden\" name=\"flag\" id=\"flag\" value = \"" . $fila['id'] . "\">";
                            echo"<input type = \"submit\" onclick = \"this.form.action = 'scripts/update/editar_practica1.php'\" value = \"editar\" />";
                            echo"</div>";
                            echo"</li>";
                            echo"</ul>";
                            echo"</div>";
                            echo"</form>";
                        }
                    }
                    include "scripts/conexion/cerrar_conexion.php";
                    ?>                               
                </div>
                <h2>Editar frases para oredenar</h2>

                <div data-role="collapsible-set" data-theme="b" data-content-theme="d">
                    <?php
                   $bd2 = ConexionDB::getInstance();
                    $sql2 = "select id, acomoda_frase from practica2" .
                            " where libro_id = " . $id_libro . " and tema_id = " . $id_tema . "";
                    $result2 = $bd2->ejecutar($sql2);
                    if (!$result2) {
                        echo " fallo al momento de hacer la consulta";
                    } else {

                         foreach ($result2 as $fila2){

                            echo"<form data-ajax = \"false\" method = \"POST\" enctype = \"multipart/form-data\">";
                            echo"<div data-role = \"collapsible\">";
                            echo"<h2>" . $fila2['acomoda_frase'] . "</h2>";
                            echo"<ul data-role = \"listview\" data-filter = \"false\" data-filter-theme = \"c\" data-divider-theme = \"d\">";
                            echo"<li>";
                            echo"<div data-role = \"fieldcontain\">";
                            echo"<label for = \"frases\">Frase para ordenar</label>";
                            echo"<textarea cols = \"40\" rows = \"8\" name = \"frases\" id = \"frases\">" . $fila2['acomoda_frase'] . "</textarea>";
                            echo"</div>";
                            echo"</li>";
                            echo"<li>";
                            echo"<div id = \"enviar2\">";
                            echo"<input type = \"hidden\" name=\"var\" id=\"var\" value = \"" . $fila2['id'] . "\">";
                            echo"<input type = \"submit\" onclick = \"this.form.action = 'scripts/update/editar_practica2.php'\" value = \"editar\" />";
                            echo"</div>";
                            echo"</li>";
                            echo"</ul>";
                            echo"</div>";
                            echo"</form>";
                        }
                    }
                    include "scripts/conexion/cerrar_conexion.php";
                    ?>

                </div>

            </article>
            <footer data-role="footer" data-theme="c" data-position="fixed"
                    data-fullscreen="true">
                <p id="pie2">&copy; 2013 My English time by <a id="pie" href="#">FDSystems.com</a></p>
            </footer><!-- /footer -->
        </section>  
    </body>
</html>