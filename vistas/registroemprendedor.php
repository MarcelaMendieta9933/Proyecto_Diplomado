<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../imagenes/logo.png" />
    <link rel="stylesheet" href="../css/registroemprendedor.css">
    <title>Registro emprendedor </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <?php
    include('../controlador/conexion_db.php');
    session_start();

    if (isset($_SESSION['nombredelusuario'], $_SESSION['idusuario'])) {
        $usuarioingresado = $_SESSION['nombredelusuario'];
        $idusuario = $_SESSION['idusuario'];
    } else {
        header('location: ../vistas/mi_emprendedor.html');
    }
    ?>



    <?php
    if (isset($_POST['btncerrar'])) {
        session_destroy();
        header('location: ../vistas/mi_emprendedor.html');
    }
    ?>
    <div class="modal position-static d-block" tabindex="0">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ingrese Tus Datos Personales </h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="../controlador/registroemprendedor.php" onsubmit="" class="row g-3 needs-validation" novalidate>
                        <div class="form-group">
                        <input type="hidden" name="accion" value="insertar">
                            <label for="nombre">Nombre Completo:</label>
                            <input class="form-control" id="nombre_completo" type="text" value="" name="nombre_completo" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Cuidad :</label>
                            <input class="form-control" id="cuidad" type="text" value="" name="ciudad" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Cedula :</label>
                            <input class="form-control" id="cedula" type="text" value="" name="cedula" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Teléfono :</label>
                            <input class="form-control" id="telefono" type="text" value="" name="telefono" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Dirección :</label>
                            <input class="form-control" id="direccion" type="text" value="" name="direccion" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="insertar">Enviar</button>
                        </div>
                    </form>

                </div>


            </div>
            <script>
                (() => {
                    'use strict'

                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    const forms = document.querySelectorAll('.needs-validation')

                    // Loop over them and prevent submission
                    Array.from(forms).forEach(form => {
                        form.addEventListener('submit', event => {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
                })()
            </script>
        </div>
    </div>

    <?php include "footer.html"; ?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>