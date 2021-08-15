<?php
require_once 'databaseconnect.php';

$recibirjson = json_decode(file_get_contents('php://input'), true);

$stmt = $pdo->query("SELECT avisos.id_av, avisos.titulo, avisos.cuerpo, avisos.fecha_hora, personas.nombre  FROM avisos 
    INNER JOIN personas_avisos ON personas_avisos.aviso=avisos.id_av 
    INNER JOIN personas ON personas_avisos.persona_av=personas.id_per");

$stmt->setFetchMode(PDO::FETCH_ASSOC);

while ($row = $stmt->fetch()) {
    $datos[] = $row;
}

$stmt = null;
echo json_encode($datos);
