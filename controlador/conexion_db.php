<?php
$host = "localhost";
$usuario = "root";
$contraseña = "";
$base_de_datos = "bbdd_timely";

$conn = new mysqli($host, $usuario, $contraseña, $base_de_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
