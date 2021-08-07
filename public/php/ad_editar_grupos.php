<?php
require_once 'databaseconnect.php';

#VARIABLES
$data = array();
//VARIABLES LOCALES
$recibirjson = json_decode(file_get_contents('php://input'), true);
//CONSULTAS
//CONSULTAR GRUPOS
try {
    $stmt = $pdo->query('SELECT * FROM grupos');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $cuenta = $stmt->rowCount(); //CONTAR FILAS

    while ($row = $stmt->fetch()) {
        $data[] = $row;
    }
# Para liberar los recursos utilizados en la consulta SELECT
    $stmt = null;
} catch (PDOException $err) {

}
echo json_encode($data);