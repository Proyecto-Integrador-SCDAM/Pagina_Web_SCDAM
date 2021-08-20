<?php
//CONECTAR A BD
require_once '../conectarbd/databaseconnect.php';

$tabla = "registro";
$pdo->exec("DELETE FROM $tabla");
$pdo->exec("ALTER TABLE $tabla AUTO_INCREMENT = 1;");

