<?php

/**
 * Description of testConexion
 *
 * @author admin
 */
/* Incluimos el fichero de la de cnexion a base de dats */
require 'ConexionDB.php';
/* Incluimos el fichero de la clase Conf */
require 'Conf.php';

/* Creamos la instancia del objeto. Ya estamos conectados */
$bd = ConexionDB::getInstance();

/* Creamos una query sencilla */
$sql = 'SELECT * FROM USUARIOS';

/* Ejecutamos la query */
$stmt = $bd->ejecutar($sql);
if ($stmt === FALSE) {
    mysqli_error($mysqli);
     
} else {
    // as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
     $num_rows = mysqli_num_rows($stmt);
     echo '<br /> veces '.$num_rows;
     echo '<br /> veces2 ';
    foreach ($stmt as $row) {
        echo $row["nombre_usuario"] . '<br />';
        
       
    }
}
/* Realizamos un bucle para ir obteniendo los resultados */
//while ($x = $bd->obtener_fila($stmt, 0)) {
//    echo $x[1] . '<br />';
//}