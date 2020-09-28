<?php

// Conexión con la base de datos
$mysqli = new mysqli("127.0.0.1", "root", "maria123", "academic", 3306);
if ($mysqli->connect_errno) {
    die("Error conectando con la base de datos.");
}
