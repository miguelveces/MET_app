<?php

/**
 * La clase: GetLibros 
 * Desarrollada por admin el 21-jun-2016
 * Cualquier consulta, bug, o sugrencias enviar un correo a mvece8@gmail.com
 * @author Maveces
 */
class GetLibros {

    protected $db;

    public function __construct() {
        try {
            /* Incluimos el fichero de la de cnexion a base de dats */
            require '../scripts/NuevaConexion/ConexionDB.php';
            /* Incluimos el fichero de la clase Conf */
            require '../scripts/NuevaConexion/Conf.php';
            /* Creamos la instancia del objeto. Ya estamos conectados */
             $this->db = ConexionDB::getInstance();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        
    }

    public function getLibros() {
        $result = $this->db->ejecutar("select * from libros;");
        $libros = $result->fetch_all(MYSQLI_ASSOC);
        //$stmt->close();
        $this->db->cerrarConexion();
        return $libros;
       
    }

}
