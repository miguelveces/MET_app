<!DOCTYPE html>
<html>
<head>
	<title>..::My English Time Mantenedor APP::..</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes" />
 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
     <link rel="stylesheet" href="css/estilos.css" />
	<script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>
  <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  cargar_libros();
  $("#libros").change(function(){dependencia_temas();});
  $("#temas").attr("disabled",true);
});

function cargar_libroshhh()
{
  $.get("scripts/cargar-libros.php", function(resultado){
    
    if(resultado == false)
    {
      alert("Error");
    }
    else
    {     
      $('#libros').append(resultado);     
    }
  }); 
}
function dependencia_temas()
{
  var code = $("#libros").val();
  $.get("scripts/dependencia_temas.php", { code: code },
    function(resultado)
    {      
      if(resultado == false)
      {
        alert("Error");
      }
      else
      {
        $("#temas").attr("disabled",false);
        document.getElementById("temas").options.length=1;
        $('#temas').append(resultado);     
      }
    }

  );
}
</script>
</head>
<body> 
      
        
    
     <section id="frases" data-role="page">
        <header>
      <h1 >My Little Magic Bookmmmmm maintainer</h1>        
        <div class="logo">
          <a href="http://myenglishtime.net/">
            <img src="img/LogoMET.png" id="logo" >        
          </a>      
        </div>    
      </header>

       <article data-role="content">
        <nav data-role="navbar">
          <ul>
        <li><a href="index_2.php" class="ui-btn-active">Inicio</a></li>
        <li><a href="vocabulario.php">Tema / Vocabulario</a></li>
        <li><a href="#">Demo</a></li>        
      </ul>
        </nav>
        <br/>

        <label id="titulo"> <strong> Ingresar datos de los temas </strong></label>
        <br/>
        <br/>

          <!-- este es el div para el forulario -->
           <div class="formulario">                
              <form>   

                  <ul data-role="listview">
                    <li data-role="fieldcontain">                                 
                      <label for="libros" class="select">Escoja el Libro:</label>
                      <select id="libros" name="libros">
                          <option value="0">Selecciona Uno...</option>
                      </select> 
                    </li>
                     <li data-role="fieldcontain">
                      <label for="temas" class="select">Escoja el Tema:</label>                       
                           <select id="temas" name="temas">
                              <option value="0">Selecciona Uno...</option>
                          </select>                                                            
                    </li>
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
                              <input type="radio" name="radio-choice-2" id="radio-choice-21" value="choice-1" checked="checked" />
                              <label for="radio-choice-21">Activado</label>
                              <input type="radio" name="radio-choice-2" id="radio-choice-22" value="choice-2"  />
                              <label for="radio-choice-22">Desactivado</label>
                        </fieldset>
                    </div>
                    </li>

                    <li>
                      <div id="enviar2"><a href="#" data-role="button">Enviar</a></div>
                      
                    </li>
                  </ul>
              </form> 
           </div>
            
            <div data-role="collapsible-set">
              <div data-role="collapsible" data-collapsed="true">
                 <h3>English - Spanich</h3>
                 <ul data-role="listview" data-theme="d" data-divider-theme="d">
                 <?php 
                          include "conexion.php"; 
                          if (!$conexion) {
                              die('No se puede conectar: ' . mysql_error());
                              }
                            $sql="select  b.id, b.nombre_tema, a.frase, a.ultima_fecha, a.frase_traducida from frases a, temas b where a.tema_id = b.id and a.libro_id = 1 order by a.tema_id, a.ultima_fecha asc"; 
                            $result=@mysql_query($sql, $conexion);
                            $num_rows = mysql_num_rows($result);
                            $contador=0;
                            $identificador_tema="";
                          if(!$result){
                              echo " fallo al momento de hacer la consulta";
                              }
                          else{
                              #echo "<select name='select-choice-a' id='select-choice-a' data-native-menu='false' >";
                              while ($fila=mysql_fetch_array($result))
                {
                   if($contador == $num_rows){
                   echo "<li data-role='list-divider'></li>";
                   }
                  else{ 
                    if(empty($identificador_tema)){
                       echo "<li data-role='list-divider'>".$fila['nombre_tema']."<span class='ui-li-count'>".$fila['id']."</span></li>";
                      echo "<li>";
                            echo "<a href='index.html'>";
                              echo "<h3>".$fila['frase']."</h3>";
                              echo "<p><strong>".$fila['frase_traducida']."</strong></p>";                              
                              echo "<p class='ui-li-aside'><strong>".$fila['ultima_fecha']."</strong></p>";
                             echo "</a>";
                            echo "<a href='#' data-rel='popup' data-position-to='window' data-transition='pop'>Editar Frase</a>";
                            echo "</li>";
                            echo "<li data-role='list-divider'></li>";
                       $identificador_tema=$fila['nombre_tema'];
                      }
                    else{
                        if ($identificador_tema == $fila['nombre_tema']){
                           echo "<li>";
                            echo "<a href='index.html'>";
                              echo "<h3>".$fila['frase']."</h3>";
                              echo "<p><strong>".$fila['frase_traducida']."</strong></p>";                              
                              echo "<p class='ui-li-aside'><strong>".$fila['ultima_fecha']."</strong></p>";
                             echo "</a>";
                            echo "<a href='#' data-rel='popup' data-position-to='window' data-transition='pop'>Editar Frase</a>";
                            echo "</li>";
                            echo "<li data-role='list-divider'></li>";
                        $identificador_tema=$fila['nombre_tema'];
                        }
                        else{
                           echo "<li data-role='list-divider'>".$fila['nombre_tema']."<span class='ui-li-count'>".$fila['id']."</span></li>";
                           echo "<li>";
                            echo "<a href='index.html'>";
                              echo "<h3>".$fila['frase']."</h3>";
                              echo "<p><strong>".$fila['frase_traducida']."</strong></p>";                              
                              echo "<p class='ui-li-aside'><strong>".$fila['ultima_fecha']."</strong></p>";
                             echo "</a>";
                            echo "<a href='#' data-rel='popup' data-position-to='window' data-transition='pop'>Editar Frase</a>";
                            echo "</li>";
                            echo "<li data-role='list-divider'></li>";
                           $identificador_tema=$fila['nombre_tema'];
                        }
                      }                                         
                   }                                                                      
                  }                            
                  }
                 include "cerrar.php"; 
               ?>
               </ul>
              </div>
              <div data-role="collapsible" data-collapsed="true">
                <h3>Libor de Chinese - English</h3>
                    <ul data-role="listview" data-theme="d" data-divider-theme="d">
                       <?php 
                          include "conexion.php"; 
                          if (!$conexion) {
                              die('No se puede conectar: ' . mysql_error());
                              }
                            $sql="select  b.id, b.nombre_tema, a.frase, a.ultima_fecha, a.frase_traducida from frases a, temas b where a.tema_id = b.id and a.libro_id = 2 order by a.tema_id, a.ultima_fecha asc"; 
                            $result=@mysql_query($sql, $conexion);
                            $num_rows = mysql_num_rows($result);
                            $contador=0;
                            $identificador_tema="";
                          if(!$result){
                              echo " fallo al momento de hacer la consulta";
                              }
                          else{
                              #echo "<select name='select-choice-a' id='select-choice-a' data-native-menu='false' >";
                              while ($fila=mysql_fetch_array($result))
                {
                   if($contador == $num_rows){
                   echo "<li data-role='list-divider'></li>";
                   }
                  else{ 
                    if(empty($identificador_tema)){
                       echo "<li data-role='list-divider'>".$fila['nombre_tema']."<span class='ui-li-count'>".$fila['id']."</span></li>";
                      echo "<li>";
                            echo "<a href='index.html'>";
                              echo "<h3>".$fila['frase']."</h3>";
                              echo "<p><strong>".$fila['frase_traducida']."</strong></p>";                              
                              echo "<p class='ui-li-aside'><strong>".$fila['ultima_fecha']."</strong></p>";
                             echo "</a>";
                            echo "<a href='#' data-rel='popup' data-position-to='window' data-transition='pop'>Editar Frase</a>";
                            echo "</li>";
                            echo "<li data-role='list-divider'></li>";
                       $identificador_tema=$fila['nombre_tema'];
                      }
                    else{
                        if ($identificador_tema == $fila['nombre_tema']){
                           echo "<li>";
                            echo "<a href='index.html'>";
                              echo "<h3>".$fila['frase']."</h3>";
                              echo "<p><strong>".$fila['frase_traducida']."</strong></p>";                              
                              echo "<p class='ui-li-aside'><strong>".$fila['ultima_fecha']."</strong></p>";
                             echo "</a>";
                            echo "<a href='#' data-rel='popup' data-position-to='window' data-transition='pop'>Editar Frase</a>";
                            echo "</li>";
                            echo "<li data-role='list-divider'></li>";
                        $identificador_tema=$fila['nombre_tema'];
                        }
                        else{
                           echo "<li data-role='list-divider'>".$fila['nombre_tema']."<span class='ui-li-count'>".$fila['id']."</span></li>";
                           echo "<li>";
                            echo "<a href='index.html'>";
                              echo "<h3>".$fila['frase']."</h3>";
                              echo "<p><strong>".$fila['frase_traducida']."</strong></p>";                              
                              echo "<p class='ui-li-aside'><strong>".$fila['ultima_fecha']."</strong></p>";
                             echo "</a>";
                            echo "<a href='#' data-rel='popup' data-position-to='window' data-transition='pop'>Editar Frase</a>";
                            echo "</li>";
                            echo "<li data-role='list-divider'></li>";
                           $identificador_tema=$fila['nombre_tema'];
                        }
                      }                                         
                   }                                                                      
                  }                            
                  }
                 include "cerrar.php"; 
               ?>                     
                    </ul>                  
              </div>  
              <div data-role="collapsible" data-collapsed="true">
                <h3>Libor de Portuguese - English</h3>
                    <ul data-role="listview" data-theme="d" data-divider-theme="d">                      
                      <?php 
                          include "conexion.php"; 
                          if (!$conexion) {
                              die('No se puede conectar: ' . mysql_error());
                              }
                            $sql="select  b.id, b.nombre_tema, a.frase, a.ultima_fecha, a.frase_traducida from frases a, temas b where a.tema_id = b.id and a.libro_id = 3 order by a.tema_id, a.ultima_fecha asc"; 
                            $result=@mysql_query($sql, $conexion);
                            $num_rows = mysql_num_rows($result);
                            $contador=0;
                            $identificador_tema="";
                          if(!$result){
                              echo " fallo al momento de hacer la consulta";
                              }
                          else{
                              #echo "<select name='select-choice-a' id='select-choice-a' data-native-menu='false' >";
                              while ($fila=mysql_fetch_array($result))
                {
                   if($contador == $num_rows){
                   echo "<li data-role='list-divider'></li>";
                   }
                  else{ 
                    if(empty($identificador_tema)){
                       echo "<li data-role='list-divider'>".$fila['nombre_tema']."<span class='ui-li-count'>".$fila['id']."</span></li>";
                      echo "<li>";
                            echo "<a href='index.html'>";
                              echo "<h3>".$fila['frase']."</h3>";
                              echo "<p><strong>".$fila['frase_traducida']."</strong></p>";                              
                              echo "<p class='ui-li-aside'><strong>".$fila['ultima_fecha']."</strong></p>";
                             echo "</a>";
                            echo "<a href='#' data-rel='popup' data-position-to='window' data-transition='pop'>Editar Frase</a>";
                            echo "</li>";
                            echo "<li data-role='list-divider'></li>";
                       $identificador_tema=$fila['nombre_tema'];
                      }
                    else{
                        if ($identificador_tema == $fila['nombre_tema']){
                           echo "<li>";
                            echo "<a href='index.html'>";
                              echo "<h3>".$fila['frase']."</h3>";
                              echo "<p><strong>".$fila['frase_traducida']."</strong></p>";                              
                              echo "<p class='ui-li-aside'><strong>".$fila['ultima_fecha']."</strong></p>";
                             echo "</a>";
                            echo "<a href='#' data-rel='popup' data-position-to='window' data-transition='pop'>Editar Frase</a>";
                            echo "</li>";
                            echo "<li data-role='list-divider'></li>";
                        $identificador_tema=$fila['nombre_tema'];
                        }
                        else{
                           echo "<li data-role='list-divider'>".$fila['nombre_tema']."<span class='ui-li-count'>".$fila['id']."</span></li>";
                           echo "<li>";
                            echo "<a href='index.html'>";
                              echo "<h3>".$fila['frase']."</h3>";
                              echo "<p><strong>".$fila['frase_traducida']."</strong></p>";                              
                              echo "<p class='ui-li-aside'><strong>".$fila['ultima_fecha']."</strong></p>";
                             echo "</a>";
                            echo "<a href='#' data-rel='popup' data-position-to='window' data-transition='pop'>Editar Frase</a>";
                            echo "</li>";
                            echo "<li data-role='list-divider'></li>";
                           $identificador_tema=$fila['nombre_tema'];
                        }
                      }                                         
                   }                                                                      
                  }                            
                  }
                 include "cerrar.php"; 
               ?>                     
                    </ul>
              </div>                           
            </div>
       </article><!-- /content -->
       <footer data-role="footer" data-theme="c" data-position="fixed"
      data-fullscreen="true">
        <p>&copy; 2013 My English time by <a href="wwww.google.com">FDSystems.com</a></p>
      </footer>
     
<!-- Esta es la pagina para crear temas nuevos -->
     </section><!-- /page -->
     <section id="temas" data-role="page">
        <header>
      <h1 id="titulo">My Little Magic Book maintainer</h1>        
        <div class="logo">
          <a href="http://myenglishtime.net/">
            <img src="img/LogoMET.png" id="logo" >        
          </a>      
        </div>    
      </header>
       <article data-role="content">
          <div>          
              <label for="select" class="select">Escoja el Libro:</label>
               <select id="select" name="select" data-native-menu="false">
                 <option value="value1">Idiomas1</option>
                 <option value="value2">Idiomas2</option>
                 <option value="value3">Idiomas3</option>
               </select>  

          <label for="nombre">Nombre del Tema</label>
                  <input type="text" name="nombre" id="nombre" value="" />  
          <br>
          <label for="comentario">Intruduccion al limbro en el idioma nativo</label>
            <textarea cols="40" rows="8" name="comentario" id="comentario"></textarea>
             <a href="#formulario" data-role="button" id="guardar" data-theme="b">Guardar</a>
         </div>         
       </article><!-- /content -->
       <footer data-role="footer" data-theme="c" data-position="fixed"
      data-fullscreen="true">
        <p>&copy; 2013 My English time by <a href="wwww.google.com">FDSystems.com</a></p>
      </footer>
     </section><!-- /page -->

</body>

</html>
