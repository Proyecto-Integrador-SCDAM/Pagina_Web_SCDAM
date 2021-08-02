<?php
require_once 'databaseconnect.php';

#VARIABLES
//RECIBIR VARIABLES
$recibirjson = json_decode(file_get_contents('php://input'), true);
//$idcon = $recibirjson['idcon'];


//CONSULTAS
//CONSULTAR ID PERSONA
try {
    $stmt = $pdo->query('SELECT nombre, apellido_paterno, apellido_materno, 
    genero, telefono, correo, fecha_nacimiento, u_password, NFC, permiso, causa_denegada FROM personas');

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        $RespuestaCon[] = $row;
    }

# Para liberar los recursos utilizados en la consulta SELECT
    $stmt = null;
} catch (PDOException $err) {

}

//DEVOLVER VARIABLES  
echo json_encode($RespuestaCon);
