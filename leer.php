<?php

// 4. Leer Publicaciones (READ)
$publicaciones = [];
$sql = "SELECT id, titulo, contenido FROM publicaciones ORDER BY id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $publicaciones[] = $row;
    }
}

$conn->close();

// Obtener mensaje de la URL si existe (después de una redirección)
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
}
?>
