<?php

/**
 * La clase: GetLibros 
 * Desarrollada por admin el 21-jun-2016
 * Cualquier consulta, bug, o sugrencias enviar un correo a mvece8@gmail.com
 * @author admin
 */
class GetLibros {

    public function getLibros() {
        /* Incluimos el fichero de la de cnexion a base de dats */
        require '../scripts/NuevaConexion/ConexionDB.php';
        /* Incluimos el fichero de la clase Conf */
        require '../scripts/NuevaConexion/Conf.php';

        /* Creamos la instancia del objeto. Ya estamos conectados */
        $bd = ConexionDB::getInstance();

        //$stmt =  $bd->prepare("select * from libros;");
        //$stmt->bind_param('s', $id);
        //$stmt->execute();
        $result = $bd->ejecutar("select * from libros;");
        $peoples = $result->fetch_all(MYSQLI_ASSOC);
        //$stmt->close();
        $bd->cerrarConexion();
        return $peoples;
        //$response = $db->getPeople($_GET['id']);
        //echo json_encode($peoples, JSON_PRETTY_PRINT);
        // $bd->cerrarConexion();
    }

}
