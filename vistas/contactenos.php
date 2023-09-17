<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../imagenes/logo.png"/>
    <link rel="stylesheet" href="../css/contactenos.css">
    <title>Timely | Contactenos</title>
</head>
<body>
<?php include "nav.html"; ?>
    <div class="modal position-static d-block" tabindex="0">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contactanos</h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="#" onsubmit="">
                        <div class="form-group">
                            <label for="nombreCompleto">Nombre Completo:</label>
                            <input class="form-control" id="nombreCompleto" type="text" value="" name="nombres" required>
                        </div>
                        <div class="form-group">
                            <label for="correoElectronico">Correo electronico:</label>
                            <input class="form-control" id="correoElectronico" type="email"  maxlength="64" name="email" placeholder="ejemplo@gmail.com" required>
                        </div>
            
                        <label for="inquietudes">Describenos tu inquietud:</label>
                        <textarea class="form-control" id="inquietudes" rows="3"></textarea>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <?php include "footer.html"; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</html>