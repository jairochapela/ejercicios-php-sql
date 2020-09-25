<?php

echo "<ul>";
echo "<li>" . $_POST['nif'] . "</li>";
echo "<li>" . $_POST['nombre'] . "</li>";
echo "<li>" . $_POST['apellidos'] . "</li>";
echo "<li>" . $_POST['cod_materia'] . "</li>";
echo "<li>" . $_POST['ano'] . "</li>";
echo "</ul>";


// Conexión con la base de datos
$mysqli = new mysqli("127.0.0.1", "root", "maria123", "academic", 3306);
if ($mysqli->connect_errno) {
    die("Error conectando con la base de datos.");
}

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