<?php
require_once 'databaseconnect.php';

#VARIABLES
$data = array();
//VARIABLES LOCALES

//RECIBIR VARIABLES
$recibirjson = json_decode(file_get_contents('php://input'), true);
$searchval = $recibirjson['searchval'];

//CONSULTAS
//CONSULTAR ID PERSONA
try {
    $stmt = $pdo->query('SELECT registro.id_reg, concat(personas.nombre, " ", personas.apellido_paterno, " ", personas.apellido_materno) AS "nombre", registro.estado, registro.fecha_hora 
    FROM personas inner join registro on personas.id_per=registro.persona_r 
    WHERE concat(personas.nombre, " ", personas.apellido_paterno, " ", personas.apellido_materno) LIKE ' . '"%' . $searchval . '%" 
    ORDER BY registro.fecha_hora DESC');
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