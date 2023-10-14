<?php
include 'conexion_db.php';

if (isset($_POST['usuarioID'])) {
    $usuarioID = $_POST['usuarioID'];
    $consulta = "DELETE usuarios, modelo     FROM usuarios     LEFT JOIN modelo ON usuarios.id = modelo.fk_id_empre     WHERE usuarios.id = $usuarioID";
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
