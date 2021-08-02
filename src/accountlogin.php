<?php
require_once 'databaseconnect.php';

#VARIABLES
//RECIBIR VARIABLES
$recibirjson = json_decode(file_get_contents('php://input'), true);
$correocon = $recibirjson['correocon'];
$contracon = $recibirjson['contracon'];

//VARIABLES LOCALES
$usuario = "No registrado";
$Aux = "";

//CONSULTAS
//CONSULTAR ID PERSONA
try {
    $stmt = $pdo->query('SELECT id_per FROM personas WHERE correo=' . '"' . $correocon . '"' . ' AND u_password=' . '"' . $contracon . '"');
    #$stmt = $pdo->query('SELECT id_per FROM personas WHERE correo="carlangas@edu.com" AND u_password="oso145005"');

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        $Aux = $row['id_per'];
    }

# Para liberar los recursos utilizados en la consulta SELECT
    $stmt = null;
} catch (PDOException $err) {

}

//CONSULTAR LISTA ADMINS
try {
    $stmt = $pdo->query('SELECT ID_PERSONA FROM info_admin WHERE ID_PERSONA='. '"' . $Aux .'"');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        $usuario = "Admin";
    }
# Para liberar los recursos utilizados en la consulta SELECT
    $stmt = null;
} catch (PDOException $err) {

}
//CONSULTAR LISTA ADMINS
try {
    $stmt = $pdo->query('SELECT ID_PERSONA FROM info_prof WHERE ID_PERSONA='. '"' . $Aux .'"');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        $usuario = "Maestro";
    }
# Para liberar los recursos utilizados en la consulta SELECT
    $stmt = null;
} catch (PDOException $err) {

}

//CONSULTAR LISTA ALUMNOS
try {
    $stmt = $pdo->query('SELECT ID_PERSONA FROM info_alu WHERE ID_PERSONA='. '"' . $Aux .'"');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        $usuario = "Alumno";
    }
# Para liberar los recursos utilizados en la consulta SELECT
    $stmt = null;
} catch (PDOException $err) {

}

//DEVOLVER VARIABLES
$RespuestaCon = [
    "Con_usuario" => $usuario,
    "Con_id" => $Aux
];
echo json_encode($RespuestaCon);
 

