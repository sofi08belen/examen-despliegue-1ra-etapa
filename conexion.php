<?php
// Configuración de la base de datos
$servername = "localhost"; // O la IP de tu servidor de base de datos
$username = "root"; // Tu usuario de MySQL
$password = ""; // ¡TU CONTRASEÑA DE MYSQL!
$dbname = "u178928053_examen";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$message = ""; // Para mensajes de éxito/error

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Expo Educación 2025</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ffdee9, #b5fffc);
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
        }

        .hero {
            text-align: center;
            padding: 60px 20px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: bold;
            color: #2c3e50;
        }

        .hero p {
            font-size: 20px;
            color: #34495e;
            margin-bottom: 40px;
        }

        .btn-custom {
            font-size: 20px;
            padding: 12px 30px;
            background-color: #00b894;
            color: white;
            border: none;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #019875;
        }

        .stars-section {
            background: white;
            padding: 40px 20px;
        }

        .stars-section h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        .card img {
            height: 390px;
            object-fit: cover;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #2c3e50;
            color: white;
        }

        /* Estilos para CRUD */
        .crud-section {
            background: #f8f9fa;
            padding: 40px 20px;
            margin-top: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .crud-section h2 {
            color: #00b894;
        }
        .publicacion-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .publicacion-item h4 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .publicacion-item p {
            color: #555;
        }
    </style>
</head>
<body>

    <section class="hero">
        <div class="container">
            <h1>Expo Educación 2025</h1>
            <p>Una feria virtual con los mejores profes de YouTube</p>
            <a href="#crud-area" class="btn btn-custom">Gestión de Publicaciones</a>
        </div>
    </section>

    <section class="stars-section">
        <div class="container">
            <h2>Invitados Estrella</h2>
            <div class="row justify-content-center">

                <div class="col-md-5 mb-4">
                    <div class="card shadow">
                        <img src="data:image/jpeg;base64,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" class="card-img-top" alt="JulioProfe">
                        <div class="card-body">
                            <h5 class="card-title">JulioProfe</h5>
                            <p class="card-text">Reconocido por sus clases claras de matemáticas, física y trigonometría.</p>
                            <a href="https://www.youtube.com/@julioprofenet" target="_blank" class="btn btn-outline-primary">Ver canal</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 mb-4">
                    <div class="card shadow">
                        <img src="data:image/jpeg;base64,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" class="card-img-top" alt="Profe Alex">
                        <div class="card-body">
                            <h5 class="card-title">Profe Alex</h5>
                            <p class="card-text">Explica matemáticas de forma divertida y didáctica, ideal para estudiantes.</p>
                            <a href="https://www.youtube.com/@MatematicasprofeAlex" target="_blank" class="btn btn-outline-success">Ver canal</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="crud-area" class="crud-section container mt-5">
        <h2>Gestión de Publicaciones</h2>

        <?php if (!empty($message)): ?>
            <div class="alert alert-info" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <h3>Crear Nueva Publicación</h3>
        <form action="index.php" method="POST" class="mb-4">
            <input type="hidden" name="action" value="create">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido:</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Publicación</button>
        </form>

        <hr>

        <h3>Listado de Publicaciones</h3>
        <div id="listaPublicaciones">
            <?php if (empty($publicaciones)): ?>
                <p>No hay publicaciones aún. ¡Crea una!</p>
            <?php else: ?>
                <?php foreach ($publicaciones as $post): ?>
                    <div class="publicacion-item">
                        <h4><?php echo htmlspecialchars($post['titulo']); ?></h4>
                        <p><?php echo nl2br(htmlspecialchars($post['contenido'])); ?></p>
                        <small>ID: <?php echo $post['id']; ?></small>
                        <br>
                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal"
                                data-id="<?php echo $post['id']; ?>"
                                data-titulo="<?php echo htmlspecialchars($post['titulo']); ?>"
                                data-contenido="<?php echo htmlspecialchars($post['contenido']); ?>">
                            Editar
                        </button>
                        <a href="index.php?action=delete&id=<?php echo $post['id']; ?>" class="btn btn-sm btn-danger"
                           onclick="return confirm('¿Estás seguro de que quieres eliminar esta publicación?');">
                            Eliminar
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar Publicación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="index.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" id="editId" name="id">
                        <div class="mb-3">
                            <label for="editTitulo" class="form-label">Título:</label>
                            <input type="text" class="form-control" id="editTitulo" name="titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="editContenido" class="form-label">Contenido:</label>
                            <textarea class="form-control" id="editContenido" name="contenido" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <footer>
        © 2025 Expo Educación - Todos los derechos reservados
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript para manejar el modal de edición
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Botón que activó el modal
            var id = button.getAttribute('data-id');
            var titulo = button.getAttribute('data-titulo');
            var contenido = button.getAttribute('data-contenido');

            var modalIdInput = editModal.querySelector('#editId');
            var modalTituloInput = editModal.querySelector('#editTitulo');
            var modalContenidoInput = editModal.querySelector('#editContenido');

            modalIdInput.value = id;
            modalTituloInput.value = titulo;
            modalContenidoInput.value = contenido;
        });
    </script>
</body>
</html>