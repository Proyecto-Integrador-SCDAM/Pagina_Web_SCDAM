<?php
require_once 'databaseconnect.php';

#VARIABLES
$data = array();
//VARIABLES LOCALES
$recibirjson = json_decode(file_get_contents('php://input'), true);
$searchval = $recibirjson['searchval'];
$filtro = $recibirjson['filtro'];
$orden = $recibirjson['orden'];
//CONSULTAS
//CONSULTAR ID PERSONA
try {
    $stmt = $pdo->query('SELECT MATRICULA, NOMBRE, GRUPO, ESPECIALIDAD, CORREO, PERMISO 
    FROM info_alu 
    WHERE ' . $filtro . ' LIKE' . '"%' . $searchval . '%"
    ORDER BY ' . $filtro . ' ' . $orden);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        $data[] = $row;
    }
# Para liberar los recursos utilizados en la consulta SELECT
    $stmt = null;
} catch (PDOException $err) {

}

echo json_encode($data);