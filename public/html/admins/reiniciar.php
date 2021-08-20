<?php
//CONECTAR A BD
require_once '../../php/databaseconnect.php';

$tabla = "avisos";
$pdo->exec("DELETE FROM $tabla");
$pdo->exec("ALTER TABLE $tabla AUTO_INCREMENT = 1;");

