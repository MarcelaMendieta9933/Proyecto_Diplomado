<?php
// cargar_emprendimientos.php
require_once 'conexion_db.php'; // Aquí debes tener tus credenciales de conexión a la base de datos

               
session_start();

if(isset($_SESSION['idusuario']))
{
    $id = $_SESSION['idusuario'];   
}

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$query = "SELECT id, title_emprendimiento, descripcion, logo, categorias FROM modelo WHERE fk_id_empre = $id;";
$result = $conn->query($query);

$emprendimientos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $emprendimientos[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($emprendimientos);
?>