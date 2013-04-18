<!DOCTYPE html>
<html>
<head>
	<title>..::Mantenedor My English Time  APP::..</title>   
        <link rel="stylesheet" href="css/estilos.css" />	
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="stylesheet"  href="jquery/css/themes/default/jquery.mobile-1.3.0.css">      
        <link rel="shortcut icon" href="jquery/favicon.ico">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <script src="jquery/js/jquery.js"></script>
        <script src="jquery/_assets/js/jquery.mobile.demos.js"></script>
        <script src="jquery/js/jquery.mobile-1.3.0.js"></script> 
</head>
<body> 
    <section id="index" data-role="page" >
     	<header>
      		<h1 id="titulo">My Little Magic Book </h1>     		
	        <div class="logo">
	          <a href="http://myenglishtime.net/">
	            <img src="img/LogoMET.png" id="logo" >        
	          </a>      
	        </div>    
     	</header>
     	
     	<article data-role="content">
     	  <form name="frmLogin" action="scripts/conexion/login.php" method="POST">            
             <h2 id="error"> </h2>
                    <p id="cinta"> <strong>Ingresar</strong></p>   		          
                      <div data-role="fieldcontain" id="login">

                              <label for="user">Usuario:</label>
                              <input type="text" name="user" id="user" value="" />
                              <label for="pwd" >Contraseña:</label>
                              <input type="password" name="pwd" id="pwd" value="" placeholder="contraseña" />                                                
                              <p id="enviar">
                                <input type="submit" name ="iniciar" value="Enviar" data-theme="b"/>                                
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