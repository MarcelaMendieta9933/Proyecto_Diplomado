<?php
include 'conexion_db.php';

if (isset($_POST['usuarioID'])) {
    $usuarioID = $_POST['usuarioID'];
    $consulta = "DELETE FROM usuarios WHERE id = $usuarioID";
    $resultado = mysqli_query($conn, $consulta);

    if ($resultado) {
        echo "Usuario eliminado exitosamente.";
    } else {
        echo "Error al eliminar el usuario: " . mysqli_error($conn);
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
