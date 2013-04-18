/**
 * valida un usuario y contrase�a
 * @param string $usuario
 * @param string $password
 * @return bool
 */
function login($usuario,$password) {

    //usuario y password tienen datos?
    if (empty($usuario)) return false;
    if (empty ($password)) return false;

    //1 - conectamos a la base de datos utilizando los par�metros globales
    $link =  mysql_connect(SERVIDOR_MYSQL, USUARIO_MYSQL, PASSWORD_MYSQL);

    if (!$link) {
        trigger_error('Error al conectar al servidor mysql: ' . mysql_error(),E_USER_ERROR);
    }
    // Seleccionar la base de datos activa
    $db_selected = mysql_select_db(BASE_DATOS, $link);
    if (!$db_selected) {
        trigger_error ('Error al conectar a la base de datos: ' . mysql_error(),E_USER_ERROR);
    }

    //2 - preparamos la consulta SQL a ejecutar utilizando s�lo el usuario y evitando ataques de inyecci�n SQL.
    $query='SELECT '.CAMPO_USUARIO_LOGIN.', '.CAMPO_CLAVE_LOGIN.' FROM '.TABLA_DATOS_LOGIN.' WHERE '.CAMPO_USUARIO_LOGIN.'="'.  mysql_real_escape_string($usuario).'" LIMIT 1 '; //la tabla y el campo se definen en los parametros globales
    $result = mysql_query($query);
    if (!$result) {
        trigger_error('Error al ejecutar la consulta SQL: ' . mysql_error(),E_USER_ERROR);
    }


    //3 - extraemos el registro de este usuario
    $row = mysql_fetch_assoc($result);

    if ($row) {
        //4 - Generamos el hash de la contrase�a encriptada para comparar o lo dejamos como texto plano
        switch (METODO_ENCRIPTACION_CLAVE) {
            case 'sha1'|'SHA1':
                $hash=sha1($password);
                break;
            case 'md5'|'MD5':
                $hash=md5($password);
                break;
            case 'texto'|'TEXTO':
                $hash=$password;
                break;
            default:
                trigger_error('El valor de la constante METODO_ENCRIPTACION_CLAVE no es v�lido. Utiliza MD5 o SHA1 o TEXTO',E_USER_ERROR);
        }

        //5 - comprobamos la contrase�a
        if ($hash==$row[CAMPO_CLAVE_LOGIN]) {
            @session_start();
            $_SESSION['USUARIO']=array('user'=>$row[CAMPO_USUARIO_LOGIN]); //almacenamos en memoria el usuario
            // en este punto puede ser interesante guardar m�s datos en memoria para su posterior uso, como por ejemplo un array asociativo con el id, nombre, email, preferencias, ....
            return true; //usuario y contrase�a validadas
        } else {
            @session_start();
            unset($_SESSION['USUARIO']); //destruimos la session activa al fallar el login por si existia
            return false; //no coincide la contrase�a
        }
    } else {
        //El usuario no existe
        return false;
    }

}