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
                        <li><a href="examen.php" class="ui-btn-active">Crear temas de quiz</a></li>
                        <li><a href="descargas.php">Demo</a></li> 
                        <li><a href="scripts/cerrar_sesion.php">cerrar sesion</a></li>
                    </ul>
                </nav>
                <br/>
                <form data-ajax="false"  method="POST" enctype="multipart/form-data">
                    <div >  
                        <div class="formulario_ex">               
                            <h3>Ingresar datos para escojer la mejor respuesta</h3>
                            <ul data-role="listview">
                                <?php
                                //Inicio la sesión
                                session_start();
                                //COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
                                if ($_SESSION["logged"] != "yes") {
                                    //si no existe, va a la página de autenticacion
                                    echo '<script>window.location="index.php"</script>';
                                    //salimos de este script
                                    exit();
                                }
                                require 'scripts/NuevaConexion/ConexionDB.php';
                                /* Incluimos el fichero de la clase Conf */
                                require 'scripts/NuevaConexion/Conf.php';
                                $bd = ConexionDB::getInstance();
                                // Obtener el $id_padre del envio a si mismo del formulario ..
                                // Inicio Formulario .. PHP_SELF enviamos a si mismo (a este script).
                                //echo "<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"POST\">\n\n";
                                echo " <li data-role=\"fieldcontain\">\n";
                                echo " <label for=\"id_padre\" class=\"select\">Escoja el Libro:</label>\n";
                                // Formar Selec "Padre".
                                echo "<select id=\"id_padre\" name=\"id_padre\" onChange=\"this.form.submit()\">\n";
                                echo "<option value=\"\"> Seleccione un Libro </option>\n";

                                $SQLconsulta_padre = "select id, nombre_libro from libros";
                                $consulta_padre = $bd->ejecutar($SQLconsulta_padre); //mysql_query($SQLconsulta_padre, $conexion) or die(mysql_error());
                                $id_padre = $_POST['id_padre'];
                                foreach ($consulta_padre as $registro_padre) {
                                    // Se mira si el ID del registro es el mismo q el $id_padre q recibimos si hemos cambiado el select hijo.
                                    // Se selecciona en consecuencia (selected) la opción elegida.
                                    if ($id_padre == $registro_padre['id']) {
                                        echo "<option value=\"" . $registro_padre['id'] . "\" selected>" . $registro_padre['nombre_libro'] . "</option>\n";
                                    } else {
                                        echo "<option value=\"" . $registro_padre['id'] . "\">" . $registro_padre['nombre_libro'] . "</option>\n";
                                    }
                                }
                                echo "</select>\n\n";
                                echo "</li>";
                                mysqli_free_result($consulta_padre); // Liberar memoria usada por consulta.
                                // Formar Select "Hijo"
                                echo " <li data-role=\"fieldcontain\">\n";
                                echo " <label for=\"id_hija\" class=\"select\">Escoja el tema:</label>\n";
                                echo "<select id=\"id_hija\" name=\"id_hija\">\n";

                                // Si $id_padre no tiene valor (caso de que no se ha seleccionado ningua opcion del select hijo
                                // se muestra el mensaje de "seleccine un item" (del select padre).
                                if (!empty($id_padre)) {

                                    $SQLconsulta_hija = "select id, nombre_tema from temas where libro_id = '$id_padre' order by 2";
                                    $consulta_hija = $bd->ejecutar($SQLconsulta_hija); //mysql_query($SQLconsulta_hija, $conexion) or die(mysql_error());
                                    // se mira el total de registros de la consulta .. si es 0 se muestra mensaje en el select ..
                                    if (mysqli_num_rows($consulta_hija) != 0) {
                                        foreach ($consulta_hija as $registro_hija) {
                                            echo "<option value=\"" . $registro_hija['id'] . "\">" . $registro_hija['nombre_tema'] . "</option>\n";
                                        }
                                    } else {
                                        echo "<option value=\"\"> No hay temas registrados para este libro </option>";
                                    }
                                } else {
                                    echo "<option value=\"\"> Seleccione un tema  </option>";
                                }
                                mysqli_free_result($consulta_hija); // Liberar memoria usada por consulta.
                                echo "</select>\n\n";
                                // echo "</form>\n";
                                echo "</li>";
                                ?>


                                <li>

                                    <label for="fr">Pregunta</label>
                                    <textarea cols="40" rows="8" name="fr" id="fr"></textarea>                                    
                                </li>
                                <li>
                                    <label>Respuestas: </label>
                                    <div class="ui-grid-b">
                                        <div class="ui-block-a"><input type="text" name="respuesta1" id="respuesta1"/></div>
                                        <div class="ui-block-b"><input type="text" name="respuesta2" id="respuesta2"/></div>
                                        <div class="ui-block-c"><input type="text" name="respuesta3" id="respuesta3"/></div>                        
                                    </div>
                                </li>

                                <li>
                                    <div id="enviar2">
                                        <input type="submit" onclick = "this.form.action = 'scripts/insert/insertar_practica1.php'" value="Crear una nueva" onsubmit="validar_frase()" />
                                        <input type="submit" onclick = "this.form.action = 'editar_examen.php'" value="Editar" onsubmit="validar_frase()" />                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <br/>
                        <br/>
                        <div class="formulario_ex">               
                            <h3>Ingresar datos de frases para ordenar (II parte del examen)</h3>                           
                            <ul data-role="listview">
                                <li>
                                    <div data-role="fieldcontain">
                                        <label for="pregunta">Frases para ordenar</label>
                                        <textarea cols="40" rows="8" name="pregunta" id="pregunta"></textarea>
                                    </div>
                                </li>                         
                                <li>
                                    <div id="enviar2">
                                        <input type="submit" onclick = "this.form.action = 'scripts/insert/insertar_practica2.php'" value="Crear una nueva"  />
                                        <input type="submit" onclick = "this.form.action = 'editar_examen.php'" value="Editar"  />
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>

            </article>

            <footer data-role="footer" data-theme="c" data-position="fixed"
                    data-fullscreen="true">
                <p id="pie2">&copy; 2013 My English time by <a id="pie" href="#">FDSystems.com</a></p>
            </footer><!-- /footer -->
        </section> 
    </body>
</html>