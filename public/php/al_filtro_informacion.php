<?php
require_once 'databaseconnect.php';

$recibirjson = json_decode(file_get_contents('php://input'), true);
$correocon=$recibirjson['correocon'];

try{

    $stmt = $pdo->query("SELECT concat(personas.nombre, ' ', personas.apellido_paterno, ' ' , personas.apellido_materno) AS 'NOMBRE', alumnos.especialidad AS 'ESPECIALIDAD', 
    alumnos.matricula AS 'MATRICULA', 
    concat(grupos.grado, grupos.seccion, ' ', grupos.turno, ' ', grupos.periodo) AS 'GRUPO', 
    personas.telefono AS 'TELEFONO', personas.genero AS 'GENERO', personas.permiso AS 'PERMISO', 
    personas.causa_denegada AS 'CAUSA' 
    FROM alumnos 
    INNER JOIN personas on personas.id_per=alumnos.persona_alu 
    INNER JOIN grupos on grupos.id_grup=alumnos.grupo_alu 
    WHERE personas.correo='" . $correocon . "'");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        $datos = $row;
    }

    $stmt = null;
    echo json_encode($datos);

}
catch(PDOException $err) {

}
