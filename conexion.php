<?php
$host = "localhost";
$usuario = "u178928053_sofi_agos";
$clave = "*1ZgLJfjQ";
$bd = "u178928053_examen"; // Elimina el espacio al final

$conn = new mysqli($host, $usuario, $clave, $bd);

// Verifica conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
?>

