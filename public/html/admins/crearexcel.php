<?php
require "excel.php";
$usuario = new Consulta();
$salida = "";
$salida .= "<table>";
$salida .= "<thead> <th>ID</th> <th>Nombre</th><th>Apellido_P</th><th>Apellido_M</th><th>Genero</th><th>Telefono</th></thead>";
foreach($usuario->buscar() as $r){
    $salida .= "<tr> <td>".$r->id_per."</td> <td>".$r->nombre."</td><td>".$r->apellido_paterno."</td><td>".$r->apellido_materno."</td><td>".$r->genero."</td><td>".$r->telefono."</td></tr>";
}
$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=usuarios_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;