<?php
include 'conexion_db.php';

if (isset($_POST['usuarioID']) && isset($_POST['usuario']) && isset($_POST['nivel']) && isset($_POST['correo']) && isset($_POST['contrasena'])) {
    $usuarioID = $_POST['usuarioID'];
    $usuario = $_POST['usuario'];
    $nivel = $_POST['nivel'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Escapar y validar los datos (ten en cuenta las medidas de seguridad adecuadas)

    $consulta = "UPDATE usuarios SET usuario = '$usuario', nivel = '$nivel', correo = '$correo', contrasena = '$contrasena' WHERE id = $usuarioID";
    
    $resultado = mysqli_query($conn, $consulta);

    if ($resultado) {
        echo "success"; // Envía una respuesta exitosa al JavaScript
    } else {
        echo "Error al actualizar el usuario: " . mysqli_error($conn);
    }
} else {
    echo "Parámetros faltantes"; // Envía un mensaje de error si faltan parámetros
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
