<?php
// 2. Actualizar Publicación (UPDATE)
if (isset($_POST['action']) && $_POST['action'] == 'update') {
    $id = $_POST['id'] ?? 0;
    $titulo = $_POST['titulo'] ?? '';
    $contenido = $_POST['contenido'] ?? '';

    if (!empty($id) && (!empty($titulo) || !empty($contenido))) {
        $stmt = $conn->prepare("UPDATE publicaciones SET titulo = ?, contenido = ? WHERE id = ?");
        $stmt->bind_param("ssi", $titulo, $contenido, $id);
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $message = "Publicación actualizada con éxito.";
            } else {
                $message = "No se encontró la publicación con ID " . $id . " para actualizar, o no hubo cambios.";
            }
        } else {
            $message = "Error al actualizar publicación: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $message = "ID de publicación, título o contenido inválido para actualizar.";
    }
}