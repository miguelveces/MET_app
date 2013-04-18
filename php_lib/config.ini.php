<?php
/* 
 * Configuración general: conexión a la base de datos y otro parámetros
 */

define('SERVIDOR_MYSQL','68.178.140.218'); //servidor de la base de datos
define('USUARIO_MYSQL','pruebas'); //usuario de la base de datos
define('PASSWORD_MYSQL','pruebas'); //la clave para conectar
define('BASE_DATOS','pruebas'); // indica el nombre de la base de datos que contiene la tabla de los usuarios

define('TABLA_DATOS_LOGIN','usuarios'); //nombre de la tabla usarios
define('CAMPO_USUARIO_LOGIN','usuario'); //campo que contiene los datos de los usuarios (se puede usar el email)
define('CAMPO_CLAVE_LOGIN','password'); //campo que contiene la contraseña

define('METODO_ENCRIPTACION_CLAVE','sha1'); //método utilizado para almacenar la contrasela. Opciones: sha1, md5, o texto

?>
