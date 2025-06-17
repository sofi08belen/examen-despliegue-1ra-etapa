<?php
include 'db.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];

$sql = "INSERT INTO usuarios (nombre, email) VALUES (?, ?)";
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
