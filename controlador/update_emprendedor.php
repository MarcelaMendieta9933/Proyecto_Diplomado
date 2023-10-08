<?php
include 'conexion_db.php'; 

session_start();

if(isset($_SESSION['nombredelusuario'],$_SESSION['idusuario']))
{
  $usuarioingresado = $_SESSION['nombredelusuario'];
  
  
  $id = $_SESSION['idusuario'];
  
}
else
{
  header('location: ../vistas/mi_emprendedor.html');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado un ID para actualizar
    if(isset($_POST['nombre_completo']) && isset($_POST['ciudad']) && isset($_POST['cedula']) && isset($_POST['telefono']) && isset($_POST['direccion']) ){
        
        $nombre_completo = $_POST['nombre_completo'];
        $ciudad = $_POST['ciudad'];
        $cedula = $_POST['cedula'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        
        // Consulta SQL para actualizar los datos en la base de datos
        $sql = "UPDATE emprendedores SET nombre_completo='$nombre_completo', ciudad='$ciudad', cedula='$cedula', telefono='$telefono', direccion='$direccion' WHERE fk_id_usu = $id;";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Usuario actualizado exitosamente."); window.location.href="../vistas/pagina_emprendedor.php";</script>';
        } else {
            echo "Error al actualizar datos: " . $conn->error;
        }
    }
}


?>
