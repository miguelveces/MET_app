<!DOCTYPE html>
<html>
    <head>
        <title>..::Mantenedor My English Time APP::..</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
        <link rel="stylesheet" href="css/estilos.css" />
        <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
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
                        <li><a href="vocabulario.php"  class="ui-btn-active">Tema / Vocabulario</a></li>
                        <li><a href="examen.php">Crear temas de quiz</a></li>
                        <li><a href="descargas.php">Demo</a></li> 
                        <li><a href="scripts/cerrar_sesion.php">cerrar sesion</a></li>
                    </ul>
                </nav>
                <br/>
                <div data-role="collapsible-set">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>Insertar Temas</h3>
                        <ul data-role="listview" data-theme="d" data-divider-theme="d">
                            <br/>
                            <label id="titulo"> Registrar temas nuevos </label>
                            <!-- este es el div para el forulario -->
                            <div class="formulario">                
                                <form data-ajax="false"  method="POST" enctype="multipart/form-data">                                                                
                                    <ul data-role="listview">
                                        <li data-role="fieldcontain">
                                            <label for="select-choice-a" class="select">Escoja el Libro:</label>
                                            <?php
                                            /* Incluimos el fichero de la de cnexion a base de dats */
                                            require 'scripts/NuevaConexion/ConexionDB.php';
                                            /* Incluimos el fichero de la clase Conf */
                                            require 'scripts/NuevaConexion/Conf.php';

                                            /* Creamos la instancia del objeto. Ya estamos conectados */
                                            $bd = ConexionDB::getInstance();
                                            $sql = "select id, nombre_libro from libros";
                                            $result = $bd->ejecutar($sql);

                                            if ($result === FALSE) {
                                                echo " fallo al momento de hacer la consulta";
                                            } else {
                                                echo "<select name='select-choice-a' id='select-choice-a' data-native-menu='false' >";
                                                foreach ($result as $fila) {
                                                    // while ($fila = mysql_fetch_array($result)) {
                                                    echo "<option value='" . $fila['id'] . "'>", $fila['nombre_libro'], "</option>";
                                                }
                                                echo "</select>";
                                            }
                                            include "scripts/conexion/cerrar_conexion.php";
                                            ?>
                                        </li>
                                        <li data-role="fieldcontain">
                                            <label for="tema" class="select">Nuevo Tema:</label>                                                                  
                                            <input type="tel" name="tema" id="tema" value="" />                      
                                        </li>
                                        <li data-role="fieldcontain">
                                            <div data-role="fieldcontain">
                                                <label for="descripcion">Escribir descripcion del tema</label>
                                                <textarea cols="40" rows="8" name="descripcion" id="descripcion"></textarea>
                                            </div>                   
                                        <li>
                                            <div id="enviar2">

                                                <input type="submit" onclick = "this.form.action = 'scripts/insert/insertar_tema.php'" value="Enviar" />
                                            </div>                      
                                        </li>
                                    </ul>
                                </form> 
                            </div>

                        </ul>
                    </div>
                    <div data-role="collapsible" data-collapsed="false">
                        <h3>Insertar palablas de Vocabulario</h3>
                        <ul data-role="listview" data-theme="d" data-divider-theme="d">
                            <br/>
                            <label id="titulo"> Registrar palabras nuevas </label>
                            <!-- este es el div para el forulario -->
                            <div class="formulario">                
                                <form data-ajax="false"  method="POST" enctype="multipart/form-data">                                                                
                                    <ul data-role="listview">
                                        <?php
                                        /* Incluimos el fichero de la de cnexion a base de dats */
                                        //require 'scripts/NuevaConexion/ConexionDB.php';
                                        /* Incluimos el fichero de la clase Conf */
                                        //require 'scripts/NuevaConexion/Conf.php';

                                        /* Creamos la instancia del objeto. Ya estamos conectados */
                                        $bd2 = ConexionDB::getInstance();

                                        // Inicio Formulario .. PHP_SELF enviamos a si mismo (a este script).
                                        //echo "<form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"POST\">\n\n";
                                        echo " <li data-role=\"fieldcontain\">\n";
                                        echo " <label for=\"id_padre\" class=\"select\">Escoja el Libro:</label>\n";
                                        // Formar Selec "Padre".
                                        echo "<select id=\"id_padre\" name=\"id_padre\" onChange=\"this.form.submit()\">\n";
                                        echo "<option value=\"\"> Seleccione un Libro </option>\n";

                                        $SQLconsulta_padre = "select id, nombre_libro from libros";
                                        $consulta_padre = $bd2->ejecutar($SQLconsulta_padre); //mysql_query($SQLconsulta_padre, $conexion) or die(mysql_error());
                                        $id_padre = $_POST['id_padre'];
                                        if ($consulta_padre === FALSE) {

                                            mysqli_error($mysqli);
                                        } else {
                                            foreach ($consulta_padre as $registro_padre) {

                                                if ($id_padre == $registro_padre['id']) {
                                                    echo "<option value=\"" . $registro_padre['id'] . "\" selected>" . $registro_padre['nombre_libro'] . "</option>\n";
                                                } else {
                                                    echo "<option value=\"" . $registro_padre['id'] . "\">" . $registro_padre['nombre_libro'] . "</option>\n";
                                                }
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
                                            $consulta_hija = $bd2->ejecutar($SQLconsulta_hija); //mysql_query($SQLconsulta_hija, $conexion) or die(mysql_error());
                                            // se mira el total de registros de la consulta .. si es 0 se muestra mensaje en el select ..
                                            if ($consulta_hija === FALSE) {
                                                mysqli_error($mysqli);
                                                echo "<option value=\"\"> No existe un tema relacionado </option>";
                                            } else {
                                                foreach ($consulta_hija as $registro_hija) {
                                                    echo "<option value=\"" . $registro_hija['id'] . "\">" . $registro_hija['nombre_tema'] . "</option>\n";
                                                }
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
                                            <label for="palabra" class="select">Nueva Palabra:</label>                                                                  
                                            <input type="tel" name="palabra" id="palabra" value="" />                      
                                        </li>
                                        <li data-role="fieldcontain">
                                            <label for="palabraT" class="select">Nueva Palabra traducida:</label>                                                                  
                                            <input type="tel" name="palabraT" id="palabraT" value="" />                      
                                        </li>
                                        <div id="enviar2">
                                            <input type="submit" onclick = "this.form.action = 'scripts/insert/insertar_vocabulario.php'" value="Enviar" />
                                        </div>                      
                                        </li>
                                    </ul>
                                </form> 
                            </div>

                        </ul>
                    </div>                            
                </div>
                <!-- aqui va el pie del bocabulario -->
                <div data-role="collapsible-set">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>Spanish - English | Palabras de Vocabulario</h3>
                        <ul data-role="listview" data-theme="d" data-divider-theme="d">
                            <?php
                            $bd3 = ConexionDB::getInstance();

                            $sql = "select  a.id, b.nombre_tema, a.palabra, a.fecha_modificacion, a.traduccion  from vocabularios a, temas b  where a.id_tema = b.id and a.id_libro = 1 order by a.id_tema, a.fecha_modificacion desc";
                            $result = $bd3->ejecutar($sql); //@mysql_query($sql, $conexion);
                            $num_rows = mysqli_num_rows($result);

                            $contador = 0;
                            $identificador_tema = "";
                            if (!$result) {
                                echo " fallo al momento de hacer la consulta";
                            } else {
                                #echo "<select name='select-choice-a' id='select-choice-a' data-native-menu='false' >";
                                foreach ($result as $fila) {
                                    if ($contador == $num_rows) {
                                        echo "<li data-role='list-divider'></li>";
                                    } else {
                                        if (empty($identificador_tema)) {
                                            echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                            echo "<li>";
                                            echo "<a href='#'>";
                                            echo "<h3>" . $fila['palabra'] . "</h3>";
                                            echo "<p><strong>" . $fila['traduccion'] . "</strong></p>";
                                            echo "<p class='ui-li-aside'><strong>" . $fila['fecha_modificacion'] . "</strong></p>";
                                            echo "</a>";
                                            $flag = $fila['id'];
                                            echo "<a href=\"edita_vocabulario.php?bandera= $flag\">Editar Frase</a>";
                                            echo "</li>";
                                            echo "<li data-role='list-divider'></li>";
                                            $identificador_tema = $fila['nombre_tema'];
                                        } else {
                                            if ($identificador_tema == $fila['nombre_tema']) {
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['palabra'] . "</h3>";
                                                echo "<p><strong>" . $fila['traduccion'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['fecha_modificacion'] . "</strong></p>";
                                                echo "</a>";
                                                $flag = $fila['id'];
                                                echo "<a href=\"edita_vocabulario.php?bandera= $flag\">Editar Frase</a>";
                                                echo "</li>";
                                                echo "<li data-role='list-divider'></li>";
                                                $identificador_tema = $fila['nombre_tema'];
                                            } else {
                                                echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['palabra'] . "</h3>";
                                                echo "<p><strong>" . $fila['traduccion'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['fecha_modificacion'] . "</strong></p>";
                                                echo "</a>";
                                                $flag = $fila['id'];
                                                echo "<a href=\"edita_vocabulario.php?bandera= $flag\">Editar Frase</a>";
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
                        <h3>English - Spanich | Palabras de Vocabulario</h3>
                        <ul data-role="listview" data-theme="d" data-divider-theme="d">
                            <?php
                            $bd4 = ConexionDB::getInstance();

                            $sql2 = "select  a.id, b.nombre_tema, a.palabra, a.fecha_modificacion, a.traduccion  from vocabularios a, temas b  where a.id_tema = b.id and a.id_libro = 2 order by a.id_tema, a.fecha_modificacion desc";
                            $result = $bd4->ejecutar($sql2);
                            $num_rows = mysqli_num_rows($result);
                            $contador = 0;
                            $identificador_tema = "";
                            if (!$result) {
                                echo " fallo al momento de hacer la consulta";
                            } else {


                                #echo "<select name='select-choice-a' id='select-choice-a' data-native-menu='false' >";
                                foreach ($result as $fila) {
                                    if ($contador == $num_rows) {
                                        echo "<li data-role='list-divider'></li>";
                                    } else {
                                        if (empty($identificador_tema)) {
                                            echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                            echo "<li>";
                                            echo "<a href='#'>";
                                            echo "<h3>" . $fila['palabra'] . "</h3>";
                                            echo "<p><strong>" . $fila['traduccion'] . "</strong></p>";
                                            echo "<p class='ui-li-aside'><strong>" . $fila['fecha_modificacion'] . "</strong></p>";
                                            echo "</a>";
                                            $flag = $fila['id'];
                                            echo "<a href=\"edita_vocabulario.php?bandera= $flag\">Editar Frase</a>";
                                            echo "</li>";
                                            echo "<li data-role='list-divider'></li>";
                                            $identificador_tema = $fila['nombre_tema'];
                                        } else {
                                            if ($identificador_tema == $fila['nombre_tema']) {
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['palabra'] . "</h3>";
                                                echo "<p><strong>" . $fila['traduccion'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['fecha_modificacion'] . "</strong></p>";
                                                echo "</a>";
                                                $flag = $fila['id'];
                                                echo "<a href=\"edita_vocabulario.php?bandera= $flag\">Editar Frase</a>";
                                                echo "</li>";
                                                echo "<li data-role='list-divider'></li>";
                                                $identificador_tema = $fila['nombre_tema'];
                                            } else {
                                                echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['palabra'] . "</h3>";
                                                echo "<p><strong>" . $fila['traduccion'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['fecha_modificacion'] . "</strong></p>";
                                                echo "</a>";
                                                $flag = $fila['id'];
                                                echo "<a href=\"edita_vocabulario.php?bandera= $flag\">Editar Frase</a>";
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
                        <h3>Chinese - English  | Palabras de Vocabulario</h3>
                        <ul data-role="listview" data-theme="d" data-divider-theme="d">                      
                            <?php
                             $bd5 = ConexionDB::getInstance();
                             
                            $sql5 = "select  a.id, b.nombre_tema, a.palabra, a.fecha_modificacion, a.traduccion  from vocabularios a, temas b  where a.id_tema = b.id and a.id_libro = 3 order by a.id_tema, a.fecha_modificacion desc";
                            $result = $bd5->ejecutar($sql5);
                            $num_rows = mysqli_num_rows($result);
                            $contador = 0;
                            $identificador_tema = "";
                            if (!$result) {
                                echo " fallo al momento de hacer la consulta";
                            } else {


                                #echo "<select name='select-choice-a' id='select-choice-a' data-native-menu='false' >";
                                foreach ($result as $fila ) {
                                    if ($contador == $num_rows) {
                                        echo "<li data-role='list-divider'></li>";
                                    } else {
                                        if (empty($identificador_tema)) {
                                            echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                            echo "<li>";
                                            echo "<a href='#'>";
                                            echo "<h3>" . $fila['palabra'] . "</h3>";
                                            echo "<p><strong>" . $fila['traduccion'] . "</strong></p>";
                                            echo "<p class='ui-li-aside'><strong>" . $fila['fecha_modificacion'] . "</strong></p>";
                                            echo "</a>";
                                            $flag = $fila['id'];
                                            echo "<a href=\"edita_vocabulario.php?bandera= $flag\">Editar Frase</a>";
                                            echo "</li>";
                                            echo "<li data-role='list-divider'></li>";
                                            $identificador_tema = $fila['nombre_tema'];
                                        } else {
                                            if ($identificador_tema == $fila['nombre_tema']) {
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['palabra'] . "</h3>";
                                                echo "<p><strong>" . $fila['traduccion'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['fecha_modificacion'] . "</strong></p>";
                                                echo "</a>";
                                                $flag = $fila['id'];
                                                echo "<a href=\"edita_vocabulario.php?bandera= $flag\">Editar Frase</a>";
                                                echo "</li>";
                                                echo "<li data-role='list-divider'></li>";
                                                $identificador_tema = $fila['nombre_tema'];
                                            } else {
                                                echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['palabra'] . "</h3>";
                                                echo "<p><strong>" . $fila['traduccion'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['fecha_modificacion'] . "</strong></p>";
                                                echo "</a>";
                                                $flag = $fila['id'];
                                                echo "<a href=\"edita_vocabulario.php?bandera= $flag\">Editar Frase</a>";
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
                        <h3>Portuguese - English | Palabras de Vocabulario</h3>
                        <ul data-role="listview" data-theme="d" data-divider-theme="d">                      
                            <?php
                            $bd6 = ConexionDB::getInstance();
                            $sql6 = "select  a.id, b.nombre_tema, a.palabra, a.fecha_modificacion, a.traduccion  from vocabularios a, temas b  where a.id_tema = b.id and a.id_libro = 4 order by a.id_tema, a.fecha_modificacion desc";
                            $result = $bd6->ejecutar($sql6);
                            $num_rows = mysqli_num_rows($result);
                            $contador = 0;
                            $identificador_tema = "";
                            if (!$result) {
                                echo " fallo al momento de hacer la consulta";
                            } else {

                                #echo "<select name='select-choice-a' id='select-choice-a' data-native-menu='false' >";
                                 foreach ($result as $fila){
                                    if ($contador == $num_rows) {
                                        echo "<li data-role='list-divider'></li>";
                                    } else {
                                        if (empty($identificador_tema)) {
                                            echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                            echo "<li>";
                                            echo "<a href='#'>";
                                            echo "<h3>" . $fila['palabra'] . "</h3>";
                                            echo "<p><strong>" . $fila['traduccion'] . "</strong></p>";
                                            echo "<p class='ui-li-aside'><strong>" . $fila['fecha_modificacion'] . "</strong></p>";
                                            echo "</a>";
                                            $flag = $fila['id'];
                                            echo "<a href=\"edita_vocabulario.php?bandera= $flag\">Editar Frase</a>";
                                            echo "</li>";
                                            echo "<li data-role='list-divider'></li>";
                                            $identificador_tema = $fila['nombre_tema'];
                                        } else {
                                            if ($identificador_tema == $fila['nombre_tema']) {
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['palabra'] . "</h3>";
                                                echo "<p><strong>" . $fila['traduccion'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['fecha_modificacion'] . "</strong></p>";
                                                echo "</a>";
                                                $flag = $fila['id'];
                                                echo "<a href=\"edita_vocabulario.php?bandera= $flag\">Editar Frase</a>";
                                                echo "</li>";
                                                echo "<li data-role='list-divider'></li>";
                                                $identificador_tema = $fila['nombre_tema'];
                                            } else {
                                                echo "<li data-role='list-divider'>" . $fila['nombre_tema'] . "<span class='ui-li-count'>" . $fila['id'] . "</span></li>";
                                                echo "<li>";
                                                echo "<a href='#'>";
                                                echo "<h3>" . $fila['palabra'] . "</h3>";
                                                echo "<p><strong>" . $fila['traduccion'] . "</strong></p>";
                                                echo "<p class='ui-li-aside'><strong>" . $fila['fecha_modificacion'] . "</strong></p>";
                                                echo "</a>";
                                                $flag = $fila['id'];
                                                echo "<a href=\"edita_vocabulario.php?bandera= $flag\">Editar Frase</a>";
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
                <!-- /aqui va el pie del bocabulario -->

            </article><!-- /content -->
            <footer data-role="footer" data-theme="c" data-position="fixed"
                    data-fullscreen="true">
                <p id="pie2">&copy; 2013 My English time by <a id="pie" href="#">FDSystems.com</a></p>
            </footer><!-- /footer -->
        </section>       
    </body>

</html>
