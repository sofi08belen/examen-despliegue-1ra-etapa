<?php
$host = "localhost"; // o IP del servidor
$usuario = "root"; // tu usuario
$clave = ""; // tu contraseña
$bd = "u178928053_examen "; // nombre de tu base de datos

$conn = new mysqli($host, $usuario, $clave, $bd);

// Verifica conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
?>
