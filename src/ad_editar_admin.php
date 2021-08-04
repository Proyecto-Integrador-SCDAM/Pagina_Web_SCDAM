<?php
require_once 'databaseconnect.php';

$recibirjson = json_decode(file_get_contents('php://input'), true);
$idcon=$recibirjson['idcon'];
//$idcon=1;
try{

    $stmt = $pdo->query("SELECT * FROM personas WHERE personas.id_per =".$idcon);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        $datos = $row;
    }

    $stmt = null;
    echo json_encode($datos);

}
catch(PDOException $err) {

}