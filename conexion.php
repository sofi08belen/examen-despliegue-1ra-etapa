<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "u178928053_examen"; // Elimina el espacio al final

$conn = new mysqli($host, $usuario, $clave, $bd);

// Verifica conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
?>

