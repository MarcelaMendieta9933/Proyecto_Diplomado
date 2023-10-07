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

$nombre_completo = $_POST['nombre_completo'];
$ciudad = $_POST['ciudad'];
$cedula = $_POST['cedula'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];


session_start();
if(isset($_SESSION['idusuario']))
 {
    
    $idusuario = $_SESSION['idusuario'];
    
    // Inserta los datos en la base de datos
    $sq = "INSERT INTO emprendedores (fk_id_usu, nombre_completo , ciudad, cedula,telefono,direccion) VALUES ('$idusuario','$nombre_completo', '$ciudad','$cedula','$telefono','$direccion')";
    
    if ($conn->query($sq) === TRUE) {
        echo "<script> Swal.fire(
          'Usuario creado',
          'Exitosamenete!!!',
          'success'
        );    
        setTimeout(function() {
          window.location='../vistas/pagina_emprendedor.php';
        }, 1500);
        </script>";
    } else {
        echo "Error: " . $sq . "<br>" . $conn->error;
    }
    // Cierra la conexión
    $conn->close();
                                
 }
   
    

?>