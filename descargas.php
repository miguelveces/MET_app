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
        <script LANGUAGE="JavaScript">
            function validar_frase() {
                //obteniendo el valor que se puso en campo text del formulario
                libro = document.getElementById("id_padre").value;
                tema = document.getElementById("id_hija").value;
                frase = document.getElementById("frase").value;
                traducida = document.getElementById("frase_t").value;
                activo = document.getElementById("radio-choice-2").value;
                alert("mensajesss");

                //la condición
                if (libro.length == 0 || tema.length == 0 || frase.length == 0 || tradusida.length == 0 || activo.length == 0) {
                    alert("Se deben llenar todos los campos");
                    return true;
                }
                return false;
            }

        </script>

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
                        <li><a href="principal.php" >Inicio</a></li>
                        <li><a href="vocabulario.php">Tema / Vocabulario</a></li>
                        <li><a href="examen.php">Crear temas de quiz</a></li>
                        <li><a href="descargas.php" class="ui-btn-active">Demo</a></li> 
                        <li><a href="scripts/cerrar_sesion.php">cerrar sesion</a></li>
                    </ul>
                </nav>
                <br/>

            </article>

            <footer data-role="footer" data-theme="c" data-position="fixed"
                    data-fullscreen="true">
                <p id="pie2">&copy; 2013 My English time by <a id="pie" href="#">FDSystems.com</a></p>
            </footer><!-- /footer -->
        </section>  
    </body>
</html>