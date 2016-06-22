<?php

/**
 * La clase: PeopleAPI 
 * Desarrollada por admin el 18-jun-2016
 * Cualquier consulta, bug, o sugrencias enviar un correo a mvece8@gmail.com
 * @author admin
 */
class RestFullAPI {

    public function API() {
        header('Content-Type: application/JSON');
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET'://consulta
                $this->getLibros();
                break;
            case 'POST'://inserta
                $this->savePeople();
                break;
            case 'PUT'://actualiza
                $this->updatePeople();
                break;
            case 'DELETE'://elimina
                $this->deletePeople();
                break;
            default://metodo NO soportado
                $this->response(405);
                break;
        }
    }

    /**
     * Respuesta al cliente
     * @param int $code Codigo de respuesta HTTP
     * @param String $status indica el estado de la respuesta puede ser "success" o "error"
     * @param String $message Descripcion de lo ocurrido
     */
    function response($code = 200, $status = "", $message = "") {
        http_response_code($code);
        if (!empty($status) && !empty($message)) {
            $response = array("status" => $status, "message" => $message);
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }

    function getLibros() {
        require_once "../scripts/QueryServices/GetLibros.php";
        if ($_GET['action'] == 'libros') {
            $db = new GetLibros();
            if (isset($_GET['id'])) {//muestra 1 solo registro si es que existiera ID                 
                $response = $db->getLibros($_GET['id']);
                echo json_encode($response, JSON_PRETTY_PRINT);
            } else { //muestra todos los registros                   
                $response = $db->getLibros();
                echo json_encode($response, JSON_PRETTY_PRINT);
            }
        } else {
            $this->response(400);
        }
    }
            
}

//end class
