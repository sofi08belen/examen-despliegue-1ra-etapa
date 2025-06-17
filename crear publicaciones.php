<?php
if (isset($_POST['action']) && $_POST['action'] == 'create') {
    $titulo = $_POST['titulo'] ?? '';
    $contenido = $_POST['contenido'] ?? '';

    if (!empty($titulo)) {
        $stmt = $conn->prepare("INSERT INTO publicaciones (titulo, contenido) VALUES (?, ?)");
        $stmt->bind_param("ss", $titulo, $contenido);
        if ($stmt->execute()) {
            $message = "Publicación creada con éxito.";
        } else {
            $message = "Error al crear publicación: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $message = "El título no puede estar vacío.";
    }
}