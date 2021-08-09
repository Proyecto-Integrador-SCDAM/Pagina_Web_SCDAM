<?php

require_once 'databaseconnect.php';

#VARIABLES
$data = array();
//VARIABLES LOCALES
$recibirjson = json_decode(file_get_contents('php://input'), true);
$vista = $recibirjson['vista'];
//CONSULTAS
//CONSULTAR ID PERSONA
try {
    $stmt = $pdo->query('SELECT ID_PERSONA, NOMBRE, TELEFONO, CORREO, PERMISO FROM ' . $vista . ' ORDER BY NOMBRE ASC');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        $data[] = $row;
    }
# Para liberar los recursos utilizados en la consulta SELECT
    $stmt = null;
} catch (PDOException $err) {

}

echo json_encode($data);