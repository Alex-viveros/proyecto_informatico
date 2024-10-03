<?php

$servername = "localhost";
$username = "upso_crud_2";
$password = "upso";
$dbname = "proyecto_informatico";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>