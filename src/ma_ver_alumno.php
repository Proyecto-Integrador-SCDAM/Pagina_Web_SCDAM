<?php
require_once 'databaseconnect.php';

$recibirjson = json_decode(file_get_contents('php://input'), true);
$matcon=$recibirjson['matcon'];
try{

    $stmt = $pdo->query("SELECT personas.nombre AS 'NOMBRE', alumnos.especialidad AS 'ESPECIALIDAD', 
    alumnos.matricula AS 'MATRICULA', 
    concat(grupos.grado, grupos.seccion) AS 'GRUPO', 
    personas.telefono AS 'TELEFONO', personas.genero AS 'GENERO', personas.permiso AS 'PERMISO', 
    personas.causa_denegada AS 'CAUSA' 
    FROM alumnos 
    INNER JOIN personas on personas.id_per=alumnos.persona_alu 
    INNER JOIN grupos on grupos.id_grup=alumnos.grupo_alu 
    WHERE alumnos.matricula=" . $matcon);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        $datos = $row;
    }

    $stmt = null;
    echo json_encode($datos);

}
catch(PDOException $err) {

}