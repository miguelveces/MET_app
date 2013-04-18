<?php

class selects extends MySQL {

    var $code = "";
    var $java = "hola ";

    function cargarlibros() {
        $consulta = parent::consulta("select id, nombre_libro from libros");
        $num_total_registros = parent::num_rows($consulta);
        if ($num_total_registros > 0) {
            $libros = array();
            while ($libro = parent::fetch_assoc($consulta)) {
                $code = $libro["id"];
                $name = $libro["nombre_libro"];
                $libros[$code] = $name;
            }
            return $libros;
        } else {
            return false;
        }
    }
    function cargarEstados() {
        $consulta = parent::consulta("select id, nombre_tema from temas WHERE libro_id = " . $this->code . "");
        $num_total_registros = parent::num_rows($consulta);
        if ($num_total_registros > 0) {
            $temas = array();
            while ($tema = parent::fetch_assoc($consulta)) {
                $id = $tema["id"];
                $name = $tema["nombre_tema"];
                $temas[$id] = $name;
            }
            return $temas;
        } else {
            return false;
        }
    }
    function login($usuario, $pas) {
         
         $result = parent::consulta("select password from usuarios where usuario = '$usuario';");
        //$consulta = "select password from usuarios where usuario = '$usuario';";
       // $conet = new MySQL();       
        if ($result->num_rows > 0) {
            $fila = $result->fetch_assoc();
            if (strcmp($pas, $fila['password']) == 0)
            {
            return true;
            header("location: index_22.php");
            }
            else{
                header("location: error.php");
                return false;
            }
                
        }
        else{
            header("location: error.php");
            return false;
        }
            
    }
}

?>