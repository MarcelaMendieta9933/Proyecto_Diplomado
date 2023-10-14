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

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$descripcion = $_POST['descripcion'];

// Inserta los datos en la base de datos
$sql = "INSERT INTO contactanos (nombre , correo, descripcion) VALUES ('$nombre', '$correo','$descripcion')";

if ($conn->query($sql) === TRUE) {
  echo "<script> Swal.fire(
    {icon: 'success',
    text: 'Gracias por Contactarnos, Mensaje Enviado',
    showConfirmButton: false}
  );    
  setTimeout(function() {
    window.location='../vistas/pagina_emprendedor.php';
  }, 1500);
     </script>";
} else {
  echo "<script> Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'No se logró enviar el comentario'
  });    
  setTimeout(function() {
    window.location='../vistas/pagina_emprendedor.php';
  }, 2800);
     </script>";
}
// Cierra la conexión
$conn->close();
?>


