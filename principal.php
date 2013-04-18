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
                        <li><a href="principal.php" class="ui-btn-active">Inicio</a></li>
                        <li><a href="vocabulario.php">Tema / Vocabulario</a></li>
                        <li><a href="examen.php">Crear temas de quiz</a></li>
                        <li><a href="descargas.php">Demo</a></li>        
                        <li><a href="scripts/cerrar_sesion.php">cerrar sesion</a></li>
                    </ul>
                </nav>
                <br/>
                <label id="titulo_medio"> <strong> Ingresar datos de los temas </strong></label>
                <br/>
                <br/>
                <!-- este es el div para el forulario -->
                <div class="formulario">                
                    <form data-ajax="false"  method="POST" enctype="multipart/form-data" >                                                                
                        <ul data-role="listview">

                            <?php
                            include "scripts/conexion/conexion.php";
                            if (!$conexion) {
                                die('No se puede conectar: ' . mysql_error());
                            }

                            error_reporting(E_ERROR | E_WARNING | E_PARSE);
                            // Conexión a la BD
                            // Obtener el $id_padre del envio a si mismo del formulario ..
                            $id_padre = $_POST['id_padre'];



                            // Inicio Formulario .. PHP_SELF enviamos a si mismo (a este script).
                            //echo "<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"POST\">\n\n";
                            echo " <li data-role=\"fieldcontain\">\n";
                            echo " <label for=\"id_padre\" class=\"select\">Escoja el Libro:</label>\n";
                            // Formar Selec "Padre".
                            echo "<select id=\"id_padre\" name=\"id_padre\" onChange=\"this.form.submit()\">\n";
                            echo "<option value=\"\"> Seleccione un Libro </option>\n";

                            $SQLconsulta_padre = "select id, nombre_libro from libros";
                            $consulta_padre = mysql_query($SQLconsulta_padre, $conexion) or die(mysql_error());

                            While ($registro_padre = mysql_fetch_assoc($consulta_padre)) {
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
                            mysql_free_result($consulta_padre); // Liberar memoria usada por consulta.
                            // Formar Select "Hijo"
                            echo " <li data-role=\"fieldcontain\">\n";
                            echo " <label for=\"id_hija\" class=\"select\">Escoja el tema:</label>\n";
                            echo "<select id=\"id_hija\" name=\"id_hija\">\n";

                            // Si $id_padre no tiene valor (caso de que no se ha seleccionado ningua opcion del select hijo
                            // se muestra el mensaje de "seleccine un item" (del select padre).
                            if (!empty($id_padre)) {

                                $SQLconsulta_hija = "select id, nombre_tema from temas where libro_id = '$id_padre' order by 2";
                                $consulta_hija = mysql_query($SQLconsulta_hija, $conexion) or die(mysql_error());
                                // se mira el total de registros de la consulta .. si es 0 se muestra mensaje en el select ..
                                if (mysql_num_rows($consulta_hija) != 0) {
                                    While ($registro_hija = mysql_fetch_assoc($consulta_hija)) {
                                        echo "<option value=\"" . $registro_hija['id'] . "\">" . $registro_hija['nombre_tema'] . "</option>\n";
                                    }
                                } else {
                                    echo "<option value=\"\"> No hay temas registrados para este libro </option>";
                                }
                            } else {
                                echo "<option value=\"\"> <-- Seleccione un tema  </option>";
                            }
                            mysql_free_result($consulta_hija); // Liberar memoria usada por consulta.
                            echo "</select>\n\n";
                            // echo "</form>\n";
                            echo "</li>";
                            ?>


                            <li data-role="fieldcontain">
                                <div data-role="fieldcontain">
                                    <label for="frase">Escribir descripcion de la Frase</label>
                                    <textarea cols="40" rows="8" name="frase" id="frase"></textarea>
                                </div>
                            </li>

                            <li data-role="fieldcontain">
                                <div data-role="fieldcontain">                                    
                                    <label for="frase_t">Escribir Frase traducida</label>
                                    <textarea cols="40" rows="8" name="frase_t" id="frase_t"></textarea>
                                </div>
                            </li>

                            <li>
                                <div data-role="fieldcontain">
                                    <fieldset data-role="controlgroup">
                                        <legend>Escoja una alternativa:</legend>
                                        <input type="radio" name="radio-choice-2" id="radio-choice-21" value="1" checked="checked" />
                                        <label for="radio-choice-21">Activado</label>
                                        <input type="radio" name="radio-choice-2" id="radio-choice-22" value="2"  />
                                        <label for="radio-choice-22">Desactivado</label>
                                    </fieldset>
                                </div>
                            </li>
                            <li data-role="fieldcontain">

                                <label for="audio">Enviar audio</label>
                                <input type="file" name="audio" id="audio"/>
                            </li>
                            <li>
                                <div id="enviar2">

                                    <input type="submit" onclick = "this.form.action = 'scripts/insert/insertar_frases.php'" value="Enviar" onsubmit="validar_frase()" />
                                    <label name="mensaje" />
                                </div>

                            </li>
                        </ul>
                    </form> 
                </div>

                <div data-role="collapsible-set">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>Spanish - English</h3>
                        <ul data-role="listview" data-theme="d" data-divider-theme="d">
                            <?php
                            include "scripts/conexion/conexion.php";
                            if (!$conexion) {
                                die('No se puede conectar: ' . mysql_error());
                            }
                            $sql = "select  a.id, b.nombre_tema, a.frase, a.ultima_fecha, a.frase_traducida, a.activo from frases a, temas b where a.tema_id = b.id and a.libro_id = 4 order by a.tema_id, a.ultima_fecha asc";
                            $result = @mysql_query($sql, $conexion);
                            $num_rows = mysql_num_rows($result);
                            $contador = 0;
                            $identificador_tema = "";
                            if (!$result) {
                                echo " fallo al momento de hacer la consulta";
                            } else {
                                #echo "<select name='select-choice-a' id='select-choice-a' data-native-menu='false' >";
                                while ($fila = mysql_fetch_array($result)) {
                                    if ($contador == $num_rows) {
                                        echo "<li data-role='list-divider'></li>";
                                    } else {
                                        if ($fila['activo'] == 1) {
                                            $activo = "Activado";
                                        } else {
                                            $activo = "Desactivado";
                                        }
                                        if (empty($identificador_tema)) {
                                            echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                            echo "<li>";
                                            echo "<a href='#'>";
                                            echo "<h3>" . $fila['frase'] . "</h3>";
                                            echo "<p><strong>" . $fila['frase_traducida'] . "</strong></p>";
                                            echo "<p class='ui-li-aside'><strong>" . $fila['ultima_fecha'] . "  | El tema se encuentra " . $activo . "</strong></p>";
                                            $flag = $fila['id'];
                                            echo "</a>";
                                            echo "<a href=\"edita_frase.php?bandera= $flag\">Editar Frase</a>";
                                            echo "</li>";
                                            echo "<li data-role='list-divider'></li>";
                                            $identificador_tema = $fila['nombre_tema'];
                                        } else {
                                            if ($identificador_tema == $fila['nombre_tema']) {
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['frase'] . "</h3>";
                                                echo "<p><strong>" . $fila['frase_traducida'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['ultima_fecha'] . "  | El tema se encuentra " . "</strong></p>";
                                                $flag = $fila['id'];
                                                echo "</a>";
                                                echo "<a href=\"edita_frase.php?bandera= $flag\">Editar Frase</a>";
                                                echo "</li>";
                                                echo "<li data-role='list-divider'></li>";
                                                $identificador_tema = $fila['nombre_tema'];
                                            } else {
                                                echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['frase'] . "</h3>";
                                                echo "<p><strong>" . $fila['frase_traducida'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['ultima_fecha'] . "  | El tema se encuentra " . "</strong></p>";
                                                $flag = $fila['id'];
                                                echo "</a>";
                                               echo "<a href=\"edita_frase.php?bandera= $flag\">Editar Frase</a>";
                                                echo "</li>";
                                                echo "<li data-role='list-divider'></li>";
                                                $identificador_tema = $fila['nombre_tema'];
                                            }
                                        }
                                    }
                                }
                            }
                            include "scripts/conexion/cerrar_conexion.php";
                            ?>
                        </ul>
                    </div>
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>English - Spanich</h3>
                        <ul data-role="listview" data-theme="d" data-divider-theme="d">
                            <?php
                            include "scripts/conexion/conexion.php";
                            if (!$conexion) {
                                die('No se puede conectar: ' . mysql_error());
                            }
                            $sql = "select a.id, b.nombre_tema, a.frase, a.ultima_fecha, a.frase_traducida, a.activo from frases a, temas b where a.tema_id = b.id and a.libro_id = 5 order by a.tema_id, a.ultima_fecha asc";
                            $result = @mysql_query($sql, $conexion);
                            $num_rows = mysql_num_rows($result);
                            $contador = 0;
                            $identificador_tema = "";
                            if (!$result) {
                                echo " fallo al momento de hacer la consulta";
                            } else {
                                #echo "<select name='select-choice-a' id='select-choice-a' data-native-menu='false' >";
                                while ($fila = mysql_fetch_array($result)) {
                                    if ($contador == $num_rows) {
                                        echo "<li data-role='list-divider'></li>";
                                    } else {
                                        if ($fila['activo'] == 1) {
                                            $activo = "Activado";
                                        } else {
                                            $activo = "Desactivado";
                                        }
                                        if (empty($identificador_tema)) {
                                            echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                            echo "<li>";
                                            echo "<a href='#'>";
                                            echo "<h3>" . $fila['frase'] . "</h3>";
                                            echo "<p><strong>" . $fila['frase_traducida'] . "</strong></p>";
                                            echo "<p class='ui-li-aside'><strong>" . $fila['ultima_fecha'] . "  | El tema se encuetra " . $activo . "</strong></p>";
                                            $flag = $fila['id'];
                                            echo "</a>";
                                            echo "<a href=\"edita_frase.php?bandera= $flag\">Editar Frase</a>";
                                            echo "</li>";
                                            echo "<li data-role='list-divider'></li>";
                                            $identificador_tema = $fila['nombre_tema'];
                                        } else {
                                            if ($identificador_tema == $fila['nombre_tema']) {
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['frase'] . "</h3>";
                                                echo "<p><strong>" . $fila['frase_traducida'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['ultima_fecha'] . "  | El tema se encuetra " . $activo . "</strong></p>";
                                                $flag = $fila['id'];
                                                echo "</a>";
                                                echo "<a href=\"edita_frase.php?bandera= $flag\">Editar Frase</a>";
                                                echo "</li>";
                                                echo "<li data-role='list-divider'></li>";
                                                $identificador_tema = $fila['nombre_tema'];
                                            } else {
                                                echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['frase'] . "</h3>";
                                                echo "<p><strong>" . $fila['frase_traducida'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['ultima_fecha'] . "  | El tema se encuetra " . $activo . "</strong></p>";
                                                $flag = $fila['id'];
                                                echo "</a>";
                                                echo "<a href=\"edita_frase.php?bandera= $flag\">Editar Frase</a>";
                                                echo "</li>";
                                                echo "<li data-role='list-divider'></li>";
                                                $identificador_tema = $fila['nombre_tema'];
                                            }
                                        }
                                    }
                                }
                            }
                            include "scripts/conexion/cerrar_conexion.php";
                            ?>                     
                        </ul>                  
                    </div>  
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>Chinese - English</h3>
                        <ul data-role="listview" data-theme="d" data-divider-theme="d">                      
                            <?php
                            include "scripts/conexion/conexion.php";
                            if (!$conexion) {
                                die('No se puede conectar: ' . mysql_error());
                            }
                            $sql = "select  a.id, b.nombre_tema, a.frase, a.ultima_fecha, a.frase_traducida, a.activo from frases a, temas b where a.tema_id = b.id and a.libro_id = 6 order by a.tema_id, a.ultima_fecha asc";
                            $result = @mysql_query($sql, $conexion);
                            $num_rows = mysql_num_rows($result);
                            $contador = 0;
                            $identificador_tema = "";
                            if (!$result) {
                                echo " fallo al momento de hacer la consulta";
                            } else {
                                #echo "<select name='select-choice-a' id='select-choice-a' data-native-menu='false' >";
                                while ($fila = mysql_fetch_array($result)) {
                                    if ($contador == $num_rows) {
                                        echo "<li data-role='list-divider'></li>";
                                    } else {
                                        if ($fila['activo'] == 1) {
                                            $activo = "Activado";
                                        } else {
                                            $activo = "Desactivado";
                                        }
                                        if (empty($identificador_tema)) {
                                            echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                            echo "<li>";
                                            echo "<a href='#'>";
                                            echo "<h3>" . $fila['frase'] . "</h3>";
                                            echo "<p><strong>" . $fila['frase_traducida'] . "</strong></p>";
                                            echo "<p class='ui-li-aside'><strong>" . $fila['ultima_fecha'] . "  | El tema se encuentra " . $activo . "</strong></p>";
                                            echo "</a>";
                                            $flag = $fila['id'];
                                            echo "<a href=\"edita_frase.php?bandera= $flag\">Editar Frase</a>";
                                            echo "</li>";
                                            echo "<li data-role='list-divider'></li>";
                                            $identificador_tema = $fila['nombre_tema'];
                                        } else {
                                            if ($identificador_tema == $fila['nombre_tema']) {
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['frase'] . "</h3>";
                                                echo "<p><strong>" . $fila['frase_traducida'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['ultima_fecha'] . "  | El tema se encuetra " . $activo . "</strong></p>";
                                                echo "</a>";
                                                $flag = $fila['id'];
                                                echo "<a href=\"edita_frase.php?bandera= $flag\">Editar Frase</a>";
                                                echo "</li>";
                                                echo "<li data-role='list-divider'></li>";
                                                $identificador_tema = $fila['nombre_tema'];
                                            } else {
                                                echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['frase'] . "</h3>";
                                                echo "<p><strong>" . $fila['frase_traducida'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['ultima_fecha'] . "  | El tema se encuetra " . $activo . "</strong></p>";
                                                echo "</a>";
                                                $flag = $fila['id'];
                                               echo "<a href=\"edita_frase.php?bandera= $flag\">Editar Frase</a>";
                                                echo "</li>";
                                                echo "<li data-role='list-divider'></li>";
                                                $identificador_tema = $fila['nombre_tema'];
                                            }
                                        }
                                    }
                                }
                            }
                            include "scripts/conexion/cerrar_conexion.php";
                            ?>                     
                        </ul>
                    </div>                           
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>Portuguese - English</h3>
                        <ul data-role="listview" data-theme="d" data-divider-theme="d">                      
                            <?php
                            include "scripts/conexion/conexion.php";
                            if (!$conexion) {
                                die('No se puede conectar: ' . mysql_error());
                            }
                            $sql = "select  a.id, b.nombre_tema, a.frase, a.ultima_fecha, a.frase_traducida, a.activo from frases a, temas b where a.tema_id = b.id and a.libro_id = 7 order by a.tema_id, a.ultima_fecha asc";
                            $result = @mysql_query($sql, $conexion);
                            $num_rows = mysql_num_rows($result);
                            $contador = 0;
                            $identificador_tema = "";
                            if (!$result) {
                                echo " fallo al momento de hacer la consulta";
                            } else {

                                #echo "<select name='select-choice-a' id='select-choice-a' data-native-menu='false' >";
                                while ($fila = mysql_fetch_array($result)) {
                                    if ($contador == $num_rows) {
                                        echo "<li data-role='list-divider'></li>";
                                    } else {
                                        if ($fila['activo'] == 1) {
                                            $activo = "Activado";
                                        } else {
                                            $activo = "Desactivado";
                                        }
                                        if (empty($identificador_tema)) {
                                            echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                            echo "<li>";
                                            echo "<a href='#'>";
                                            echo "<h3>" . $fila['frase'] . "</h3>";
                                            echo "<p><strong>" . $fila['frase_traducida'] . "</strong></p>";
                                            echo "<p class='ui-li-aside'><strong>" . $fila['ultima_fecha'] . "  | El tema se encuentra " . $activo . "</strong></p>";
                                            echo "</a>";
                                            $flag = $fila['id'];
                                            echo "<a href=\"edita_frase.php?bandera= $flag\">Editar Frase</a>";
                                            echo "</li>";
                                            echo "<li data-role='list-divider'></li>";
                                            $identificador_tema = $fila['nombre_tema'];
                                        } else {
                                            if ($identificador_tema == $fila['nombre_tema']) {
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['frase'] . "</h3>";
                                                echo "<p><strong>" . $fila['frase_traducida'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['ultima_fecha'] . "  | El tema se encuentra " . $activo . "</strong></p>";
                                                echo "</a>";
                                                $flag = $fila['id'];
                                               echo "<a href=\"edita_frase.php?bandera= $flag\">Editar Frase</a>";
                                                echo "</li>";
                                                echo "<li data-role='list-divider'></li>";
                                                $identificador_tema = $fila['nombre_tema'];
                                            } else {
                                                echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['frase'] . "</h3>";
                                                echo "<p><strong>" . $fila['frase_traducida'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['ultima_fecha'] . "  | El tema se encuentra " . $activo . "</strong></p>";
                                                echo "</a>";
                                                $flag = $fila['id'];
                                                echo "<a href=\"edita_frase.php?bandera= $flag\">Editar Frase</a>";
                                                echo "</li>";
                                                echo "<li data-role='list-divider'></li>";
                                                $identificador_tema = $fila['nombre_tema'];
                                            }
                                        }
                                    }
                                }
                            }
                            include "scripts/conexion/cerrar_conexion.php";
                            ?>                     
                        </ul>
                    </div>                           

                </div>
           
            
            </article><!-- /content -->
            <footer data-role="footer" data-theme="c" data-position="fixed"
                    data-fullscreen="true">
                <p id="pie2">&copy; 2013 My English time by <a id="pie" href="#">FDSystems.com</a></p>
            </footer><!-- /footer -->
        </section>     
    </body>
</html>
