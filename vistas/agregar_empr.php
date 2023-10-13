<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Emprendimiento</title>
    <link rel="stylesheet" type="text/css" href="../css/agregar_empr.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="fondo">
    <div class="modal position-static mx-auto d-block" tabindex="0">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Formulario de Emprendimiento 
                    <?php
                    include('../controlador/conexion_db.php');
                    session_start();

                    if(isset($_SESSION['nombredelusuario']))
                    {
                        $usuarioingresado = $_SESSION['nombredelusuario'];
                    }
                    else
                    {
                        header('location: ../vistas/mi_emprendedor.html');
                    }
                    ?>
                    </h5>
                </div>
                <div class="modal-body">
                    <form action="../controlador/cargar_empr.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group emprendimiento-info">
                            <label for="nombre">Nombre del Emprendimiento:</label>
                            <input class="form-control"  type="text" name="nombre" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control"  name="descripcion" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="whatsapp">Número de WhatsApp:</label>
                            <input class="form-control"  type="text" name="whatsapp" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="logo">Logo del Emprendimiento:</label>
                            <input class="form-control" type="file" name="logo" accept="image/*" required>
                        </div>
                        <div id="productFields">
                            <div class="form-group product">
                                <label for="image">Enlace del Video:</label>
                                <input class="form-control" type="text" name="image[]" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="whatsapp">Describa minimo en tres palabras claves el empredimento:</label>
                            <input class="form-control"  type="text" name="categoria" value="" required autocomplete="off">
                        </div>
                        <br>
                        <button type="button" id="cancelButton" class="btn btn-secondary">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>


