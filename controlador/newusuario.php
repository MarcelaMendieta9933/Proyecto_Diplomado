<!DOCTYPE html>

<head>
<script src="dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="icon" type="image/x-icon" href="../imagenes/logo.png"/>
</head>

</html>


<?php
include 'conexion_db.php';

// Obtiene los datos del formulario

$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$nivel = $_POST['nivel'];
$contraseña = $_POST['contraseña'];

$queryusuario = mysqli_query($conn,"SELECT * FROM usuarios WHERE usuario = '$usuario'");
$nr = mysqli_num_rows($queryusuario); 

if($nr == 0){
    $pass_fuerte = password_hash($contraseña, PASSWORD_BCRYPT);
    // Inserta los datos en la base de datos
    $sq = "INSERT INTO usuarios (usuario , correo, nivel,contraseña) VALUES ('$usuario', '$correo','$nivel','$pass_fuerte')";
    
    if ($conn->query($sq) === TRUE) {
        echo "<script> Swal.fire(
          {icon: 'success',
          title: 'Usuario creado',
          text: 'Exitosamente!!!',
          showConfirmButton: false}
        );    
        setTimeout(function() {
          window.location='../vistas/pagina_administrador.php';
        }, 1500);
        </script>";
    } else {
      echo "<script> Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Hubo algun error al crear el suuario',
        showConfirmButton: false
      });
      setTimeout(function() {
        window.location='../vistas/pagina_administrador.php';
      }, 2800);
      </script>"; 
    }
    // Cierra la conexión
    $conn->close();
    
}else{
    echo "<script> Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'No puedes registrar a este usuario: $usuario, ya existe',
      showConfirmButton: false
    });
    setTimeout(function() {
      window.location='../vistas/pagina_administrador.php';
    }, 2800);
    </script>"; 
}
?>


