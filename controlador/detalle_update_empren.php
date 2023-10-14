<!DOCTYPE html>

<head>
<script src="dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="icon" type="image/x-icon" href="../imagenes/logo.png"/>
</head>

</html>

<?php
include('conexion_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado un ID para actualizar
    if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['whatsapp']) && isset($_POST['image'] ) && isset($_POST['id'] ) ){
        
        $nombre_emprendimiento = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $whatsapp = $_POST['whatsapp'];
        $imageURLs = $_POST['image'];
        $id = $_POST['id'];
        $imageURLsConcatenated = implode(", ", $imageURLs);
        // Extraer el id de la url de youtube
        $parts = explode('/', parse_url($imageURLsConcatenated, PHP_URL_PATH));
        $lastPart = end($parts);

        $sql = "UPDATE modelo SET title_emprendimiento='$nombre_emprendimiento', descripcion='$descripcion', video='$lastPart', whatsapp='$whatsapp' WHERE id = $id;";

        if ($conn->query($sql) === TRUE) {
            echo "<script> Swal.fire(
                {icon: 'success',
                text: 'Emprendimiento Actualisado Exitosamente!!!',
                showConfirmButton: false}
              );    
              setTimeout(function() {
                window.location='../vistas/pagina_emprendedor.php';
              }, 1500);
              </script>";
        } else {
            echo "Error al actualizar datos: " . $conn->error;
        }
    }
}            

?>