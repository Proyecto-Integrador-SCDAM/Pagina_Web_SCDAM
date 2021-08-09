<?php
require_once 'databaseconnect.php';

$recibirjson = json_decode(file_get_contents('php://input'), true);
$matcon=$recibirjson['matcon'];
//$matcon=1;
try{

    $stmt = $pdo->query("SELECT personas.nombre, personas.apellido_paterno, personas.apellido_materno, 
    personas.genero, personas.telefono, personas.correo, personas.u_password, personas.fecha_nacimiento, 
    personas.NFC, personas.permiso, personas.causa_denegada, alumnos.matricula, alumnos.especialidad, 
    grupos.id_grup, grupos.grado, grupos.seccion, grupos.turno, grupos.periodo 
    FROM personas 
    INNER JOIN alumnos on alumnos.persona_alu=personas.id_per 
    INNER JOIN grupos on alumnos.grupo_alu=grupos.id_grup 
    WHERE alumnos.matricula=".$matcon);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        $datos = $row;
    }

    $stmt = null;
    echo json_encode($datos);

}
catch(PDOException $err) {

}