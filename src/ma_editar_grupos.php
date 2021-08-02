<?php
require_once 'databaseconnect.php';

#VARIABLES
$data = array();
//VARIABLES LOCALES
$recibirjson = json_decode(file_get_contents('php://input'), true);
$idcon = $recibirjson['idcon'];

//CONSULTAS
//CONSULTAR GRUPOS
try {
    $stmt = $pdo->query('SELECT * FROM grupos WHERE grupos.id_grup IN (SELECT CLAVE_GRUPO from prof_grupos WHERE prof_grupos.CLAVE_PROFESOR=' . $idcon . ')');
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