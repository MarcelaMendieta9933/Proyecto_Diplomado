<?php
include '../controlador/conexion_db.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $usuarioID = $_GET['id'];

    $consulta = "SELECT id, usuario, nivel, correo FROM usuarios WHERE id = $usuarioID";
    $resultado = mysqli_query($conn, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $usuario = $fila['usuario'];
        $nivel = $fila['nivel'];
        $correo = $fila['correo'];
    } else {
        echo "El usuario no existe o no se pudo encontrar.";
        exit;
    }
} else {
    echo "ID de usuario no válido.";
    exit;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Encabezado y enlaces CSS -->
    <link rel="stylesheet" href="../css/editar_usuario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="fondo">
        <div class="modal position-static mx-auto d-block" tabindex="0">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Usuario</h5>
                    </div>
                    <div class="modal-body">
                        <form id="formularioEdicion" action="../controlador/actualizar_usu.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="usuarioID" value="<?php echo $usuarioID; ?>">
                                <label for="usuario">Usuario:</label>
                                <input class="form-control" id="usuario"  type="text" name="usuario" value="<?php echo $usuario; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nivel">Nivel:</label>
                                <input class="form-control" id="nivel"  type="text" name="nivel" value="<?php echo $nivel; ?>">
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $correo; ?>">
                            </div>
                            <input type="hidden" name="cambioContrasena" id="cambioContrasena" value="0">
                            <div class="form-group">
                                <label for="nuevaContrasena">Nueva Contraseña (opcional):</label>
                                <input type="password" class="form-control" id="nuevaContrasena" name="nuevaContrasena" placeholder="Deja en blanco si no deseas cambiarla" onkeyup="marcarCambio()">
                            </div>
                            <button type="button" class="btn btn-secondary" onclick="window.location.href='pagina_administrador.php'">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
        function marcarCambio() {
            document.getElementById("cambioContrasena").value = "1";
        }
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
