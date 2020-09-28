<?php

include("conexion.inc");

$nif = $_POST['nif'];
$apellidos = $_POST['apellidos'];
$nombre = $_POST['nombre'];
$materia = $_POST['cod_materia'];
$ano = $_POST['ano'];

$sentencia = $mysqli->prepare("CALL matricular(?,?,?,?,?)");
$sentencia->bind_param("ssssd", $nif, $apellidos, $nombre, $materia, $ano);
$ok = $sentencia->execute();


if (!$ok) {
    echo "Error al matricular: (" . $sentencia->errno . ") " . $sentencia->error;
} else {
    echo "Alumno matriculado satisfactoriamente.";
}