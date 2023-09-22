<?php
require_once('conexion_db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];

    // Verificar si el correo existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Generar un token aleatorio para el restablecimiento de contraseña
        $token = bin2hex(random_bytes(16));

        // Actualizar el token en la base de datos
        $update_sql = "UPDATE usuarios SET token = '$token' WHERE correo = '$correo'";
        if ($conn->query($update_sql) === TRUE) {
            // Enviar correo electrónico con el enlace para restablecer la contraseña
            $subject = "Restablecimiento de contraseña";
            $message = "Para restablecer tu contraseña, haz clic en el siguiente enlace: ";
            $message .= "<a href='tu_sitio.com/reset_password.php?token=$token'>Restablecer contraseña</a>";

            // Asegúrate de configurar el encabezado adecuadamente para HTML
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // Envía el correo electrónico
            if (mail($correo, $subject, $message, $headers)) {
                echo "Se ha enviado un correo con instrucciones para restablecer la contraseña.";
            } else {
                echo "Error al enviar el correo electrónico.";
            }
        } else {
            echo "Error al actualizar el token en la base de datos.";
        }
    } else {
        echo "El correo electrónico no está registrado.";
    }
}
?>
