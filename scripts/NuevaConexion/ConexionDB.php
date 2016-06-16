<?php

/**
 * Description of ConexionDB: gestiona las conexiones a base de datos.
 *
 * @author Miguel Veces
 */
class ConexionDB {

    private $servidor;
    private $usuario;
    private $password;
    private $base_datos;
    private $link;
    private $stmt;
    private $array;
    static $_instance;

    /* La función construct es privada para evitar que el objeto pueda ser creado mediante new */

    private function __construct() {
        $this->setConexion();
        $this->conectar();
    }

    /* Método para establecer los parámetros de la conexión */

    private function setConexion() {
        $conf = Conf::getInstance();
        $this->servidor = $conf->getHostDB();
        $this->base_datos = $conf->getDB();
        $this->usuario = $conf->getUserDB();
        $this->password = $conf->getPassDB();
    }

    /* Evitamos el clonaje del objeto. Patrón Singleton */

    private function __clone() {
        
    }

    /* Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos */

    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /* Realiza la conexión a la base de datos. */

    private function conectar() {
        $this->link = mysqli_connect($this->servidor, $this->usuario, $this->password);
       // echo $this->base_datos;
        mysqli_select_db($this->link, $this->base_datos);
        mysqli_query($this->link, "SET NAMES 'utf8'");
    }
    /*Metodo para desconectar la base de datos*/
    public function cerrarConexion(){
        mysqli_close($this->link);
    }
            
    
    /* Método para ejecutar una sentencia sql */

    public function ejecutar($sql) {
        $this->stmt = mysqli_query($this->link, $sql);
        return $this->stmt;
    }

    /* Método para obtener una fila de resultados de la sentencia sql */

    public function obtener_fila($stmt, $fila) {
        if ($stmt === FALSE) {
             mysqli_error($mysqli);
             return null;
        } else {
            // as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
            foreach ($stmt as $row) {
                return $row;
            }  }
            
//      if ($fila==0){
//         $this->array=mysql_fetch_array($stmt);
//      }else{
//         mysql_data_seek($stmt,$fila);
//         $this->array=mysql_fetch_array($stmt);
//      }
            //return $this->array;
        }

        //Devuelve el último id del insert introducido
        public function lastID() {
            return mysql_insert_id($this->link);
        }

    }
    