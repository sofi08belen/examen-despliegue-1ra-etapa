<script>
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