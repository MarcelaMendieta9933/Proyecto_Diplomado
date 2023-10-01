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
<html lang="en">
<head>
    <!-- Encabezado y enlaces CSS -->
    <link rel="stylesheet" href="../css/editar_usuario.css">
</head>
<body>
    <div class="fondo">
        <div class="caja">
            <h2>Editar Usuario</h2>
            <form id="formularioEdicion" action="../controlador/actualizar_usu.php" method="POST">
                <input type="hidden" name="usuarioID" value="<?php echo $usuarioID; ?>">
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario; ?>">
                </div>
                <div class="form-group">
                    <label for="nivel">Nivel:</label>
                    <input type="text" class="form-control" id="nivel" name="nivel" value="<?php echo $nivel; ?>">
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
    <script>
        function marcarCambio() {
            document.getElementById("cambioContrasena").value = "1";
        }
    </script>
</body>
</html>
