<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
</head>
<body>
    <h1>Listado de calificaciones</h1>
<?php
// Conexión con la base de datos
$mysqli = new mysqli("127.0.0.1", "root", "maria123", "academic", 3306);
if ($mysqli->connect_errno) {
    die("Error conectando con la base de datos.");
}

// Consulta a la vista de calificaciones
$resultados = $mysqli->query("SELECT * FROM calificaciones");

// Mostrar resultados
if ($resultados) {
    echo "<table>";

    while($obj = $resultados->fetch_array()){
        echo "<tr>";
        echo "<td>" . $obj['nif'] . "</td>";
        echo "<td>" . $obj['apellidos'] . "</td>";
        echo "<td>" . $obj['nombre'] . "</td>";
        echo "<td>" . $obj['nota_teoria'] . "</td>";
        echo "<td>" . $obj['nota_practicas'] . "</td>";
        echo "<td>" . $obj['nota_final'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No hay datos que mostrar.";
}
?>
</body>
</html>