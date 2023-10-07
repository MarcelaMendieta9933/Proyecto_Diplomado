<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Emprendimiento</title>
    <link rel="stylesheet" type="text/css" href="../css/agregar_empr.css">
</head>
<body>
<?php
    include('../controlador/conexion_db.php');
    session_start();

    if(isset($_SESSION['nombredelusuario']))
    {
        $usuarioingresado = $_SESSION['nombredelusuario'];
        echo "$usuarioingresado";
    }
    else
    {
        header('location: ../vistas/mi_emprendedor.html');
    }
    ?>
    <h1>Formulario de Emprendimiento</h1>
    <form action="../controlador/cargar_empr.php" method="POST" enctype="multipart/form-data">
        <div class="emprendimiento-info">
            <label for="nombre">Nombre del Emprendimiento:</label>
            <input type="text" name="nombre" required>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" required></textarea>
            <label for="whatsapp">Número de WhatsApp:</label>
            <input type="text" name="whatsapp" required>
            <label for="logo">Logo del Emprendimiento:</label>
            <input type="file" name="logo" accept="image/*" required>
        </div>
        <div id="productFields">
            <div class="product">
                <label for="image">Enlace del Video:</label>
                <input type="text" name="image[]" required>
            </div>
        </div>
        
        <button type="button" id="cancelButton" class="cancel-button">Cancelar</button>
        <button type="submit">Enviar</button>

    </form>
</body>
<script>
    // Obtener una referencia al botón de "Cancelar"
    const cancelButton = document.getElementById('cancelButton');

    // Agregar un evento click al botón de "Cancelar"
    cancelButton.addEventListener('click', function() {
        // Redirigir a la página anterior
        window.history.back();
    });
</script>

</html>


