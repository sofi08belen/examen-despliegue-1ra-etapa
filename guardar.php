<?php
include 'conexion.php';

$correo = $_POST['email'];
$contra= $_POST['contra'];

$sql = "INSERT INTO usuarios (email, contrasenha) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nombre, $email);

if ($stmt->execute()) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
