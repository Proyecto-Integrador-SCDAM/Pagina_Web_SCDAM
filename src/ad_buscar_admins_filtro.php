<?php
require_once 'databaseconnect.php';

#VARIABLES
$data = array();
//VARIABLES LOCALES

//RECIBIR VARIABLES
$recibirjson = json_decode(file_get_contents('php://input'), true);
$searchval = $recibirjson['searchval'];
$vista = $recibirjson['vista'];

//CONSULTAS
//CONSULTAR ID PERSONA
try {
    $stmt = $pdo->query('SELECT ID_PERSONA, NOMBRE, TELEFONO, CORREO, PERMISO FROM ' . $vista . ' WHERE NOMBRE LIKE' . '"%' . $searchval . '%"');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    $cuenta = $stmt->rowCount(); //CONTAR FILAS
    unset($data); //FORMATEAR ARREGLO

    if ($cuenta > 0){
        while ($row = $stmt->fetch()) {
            $data[] = $row;
        }
    } else {
        $data[] = NULL;
    }
# Para liberar los recursos utilizados en la consulta SELECT
    $stmt = null;
} catch (PDOException $err) {

}

echo json_encode($data);