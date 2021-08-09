<?php
require_once 'databaseconnect.php';

#VARIABLES
$data = array();
//VARIABLES LOCALES
$recibirjson = json_decode(file_get_contents('php://input'), true);

//CONSULTAS
//CONSULTAR ID PERSONA
try {
    $stmt = $pdo->query('SELECT registro.id_reg, concat(personas.nombre, " ", personas.apellido_paterno, " ", personas.apellido_materno) AS "nombre", registro.estado, registro.fecha_hora 
    FROM personas inner join registro on personas.id_per=registro.persona_r 
    ORDER BY registro.fecha_hora DESC');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        $data[] = $row;
    }
# Para liberar los recursos utilizados en la consulta SELECT
    $stmt = null;
} catch (PDOException $err) {

}

echo json_encode($data);