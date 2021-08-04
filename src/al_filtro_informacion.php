<?php
require_once 'databaseconnect.php';

$recibirjson = json_decode(file_get_contents('php://input'), true);
//$correoprueba=$recibirjson['correoprueba'];

try{

    $stmt = $pdo->query("SELECT * FROM info_alu WHERE info_alu.CORREO='jorge@edu.com'");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        $datos = $row;
    }

    $stmt = null;
    echo json_encode($datos);

}
catch(PDOException $err) {

}
