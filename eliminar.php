<?php

// 3. Eliminar Publicación (DELETE)
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'] ?? 0;

    if (!empty($id)) {
        $stmt = $conn->prepare("DELETE FROM publicaciones WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $message = "Publicación eliminada con éxito.";
            } else {
                $message = "No se encontró la publicación con ID " . $id . " para eliminar.";
            }
        } else {
            $message = "Error al eliminar publicación: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $message = "ID de publicación inválido para eliminar.";
    }
    // Redirige para limpiar la URL del GET, o recarga la página
    header("Location: index.php?message=" . urlencode($message));
    exit();
}