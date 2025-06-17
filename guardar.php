<?php
include 'conexion.php';

$titulo = $_POST['titulo'];
$contenido= $_POST['cuerpo'];

$sql = "INSERT INTO publicaciones (titulo, contenido) VALUES ('$titulo', '$contenido')";
$stmt = $conn->query($sql);

if ($conn->insert_id) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
