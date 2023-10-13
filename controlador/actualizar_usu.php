<!DOCTYPE html>

<head>
<script src="dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="icon" type="image/x-icon" href="../imagenes/logo.png"/>
</head>

</html>
<?php
include 'conexion_db.php';

if (isset($_POST['usuarioID']) && isset($_POST['usuario']) && isset($_POST['nivel']) && isset($_POST['correo'])) {
    $usuarioID = $_POST['usuarioID'];
    $usuario = $_POST['usuario'];
    $nivel = $_POST['nivel'];
    $correo = $_POST['correo'];
    $nuevaContrasena = ""; // Inicializa la variable $nuevaContrasena

    if (isset($_POST['cambioContrasena']) && $_POST['cambioContrasena'] == "1" && isset($_POST['nuevaContrasena']) && !empty($_POST['nuevaContrasena'])) {
        // Se cambió la contraseña, encriptarla antes de actualizar
        $nuevaContrasena = password_hash($_POST['nuevaContrasena'], PASSWORD_DEFAULT);
    }

    // Verificar si el nuevo nombre de usuario ya existe
    $consultaVerificar = "SELECT id FROM usuarios WHERE usuario = '$usuario' AND id != $usuarioID";
    $resultadoVerificar = mysqli_query($conn, $consultaVerificar);

    if (mysqli_num_rows($resultadoVerificar) > 0) {
        // Mostrar una alerta en la misma página sin redirigir
        echo '<script>alert("El nombre de usuario ya está en uso. Por favor, elija otro."); window.history.back();</script>';
    } else {
        // Actualizar los datos del usuario
        if (!empty($nuevaContrasena)) {
            $consulta = "UPDATE usuarios SET usuario = '$usuario', nivel = '$nivel', correo = '$correo', contraseña = '$nuevaContrasena' WHERE id = $usuarioID";
        } else {
            $consulta = "UPDATE usuarios SET usuario = '$usuario', nivel = '$nivel', correo = '$correo' WHERE id = $usuarioID";
        }

        $resultado = mysqli_query($conn, $consulta);

        if ($resultado) {
            // Mostrar una alerta de éxito y redirigir al usuario a pagina_administrador.php
            echo "<script> Swal.fire(
                'Usuario Actualizado',
                'Exitosamenete!!!',
                'success'
              );    
              setTimeout(function() {
                window.location='../vistas/pagina_administrador.php';
              }, 1500);
              </script>";
            
        } else {
            echo "<script> Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Este usuario $nombre ya existe '
              });    
              setTimeout(function() {
                window.location='../vistas/pagina_emprendedor.php';
              }, 1800);
              </script>"
            . mysqli_error($conn);
        }
    }
} else {
    echo "Parámetros faltantes";
}

mysqli_close($conn);
?>
