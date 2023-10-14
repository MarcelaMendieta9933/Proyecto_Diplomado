<?php 
include('conexion_db.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $consulta = "DELETE FROM modelo WHERE id = $id";
    $resultado = mysqli_query($conn, $consulta);
    
    if ($resultado) {
        echo "Exito";
    } else {
        echo "Eliminado con:" . mysqli_error($conn);
    }    
}
#Eliminado con: Exito
// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>


