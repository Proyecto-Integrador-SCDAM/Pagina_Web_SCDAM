<?php
require_once 'databaseconnect.php';

#VARIABLES
$data = array();
//VARIABLES LOCALES
$recibirjson = json_decode(file_get_contents('php://input'), true);
//CONSULTAS
//CONSULTAR ALUMNOS Y GRUPO
try {
    $stmt = $pdo->query('SELECT alumnos.matricula, concat(personas.nombre, " ", personas.apellido_paterno, " ", personas.apellido_materno) AS "nombrec", alumnos.grupo_alu from alumnos inner join personas on personas.id_per=alumnos.persona_alu');
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