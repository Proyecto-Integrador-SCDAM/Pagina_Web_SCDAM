<?php
require_once 'databaseconnect.php';

#VARIABLES
$data = array();
//VARIABLES LOCALES
$recibirjson = json_decode(file_get_contents('php://input'), true);
$filtro = $recibirjson['filtro'];
$orden = $recibirjson['orden'];
$correo = $recibirjson['correo'];

//CONSULTAS
//CONSULTAR ID PERSONA
try {
    $stmt = $pdo->query('SELECT info_alu.MATRICULA AS "MATRICULA", 
    info_alu.NOMBRE AS "NOMBRE", info_alu.GRUPO AS "GRUPO", info_alu.ESPECIALIDAD AS "ESPECIALIDAD", 
    info_alu.CORREO AS "CORREO", info_alu.PERMISO AS "PERMISO"
    FROM personas 
    inner join alumnos as alu on alu.persona_alu=personas.id_per 
    inner join info_alu on info_alu.MATRICULA=alu.matricula 
    inner join grupos on alu.grupo_alu=grupos.id_grup 
    inner join prof_grupos on prof_grupos.GRUPO=grupos.id_grup 
    where prof_grupos.CLAVE_PROFESOR=
    (select personas.id_per 
    from profesores as prof 
    inner join personas on prof.persona_prof=personas.id_per 
    where personas.correo="' . $correo . '") 
    order by info_alu.' . $filtro . ' ' . $orden);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        $data[] = $row;
    }
# Para liberar los recursos utilizados en la consulta SELECT
    $stmt = null;
} catch (PDOException $err) {

}

echo json_encode($data);