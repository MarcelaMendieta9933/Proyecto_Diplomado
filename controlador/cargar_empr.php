<?php
include("conexion_db.php");
session_start();

    if(isset($_SESSION['idusuario']))
    {
        $idusuario = $_SESSION['idusuario'];
        echo "$idusuario";
    }
    

// Procesa los datos del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $conn->real_escape_string($_POST["nombre"]);
    $descripcion = $conn->real_escape_string($_POST["descripcion"]);
    $whatsapp = $conn->real_escape_string($_POST["whatsapp"]);

    // Genera un nombre único para la imagen
$imagenNombre = uniqid() . "_" . basename($_FILES["logo"]["tmp_name"]);
$imagenRuta = "../imagenes/" . $imagenNombre;

// Mueve la imagen a la carpeta de imágenes con el nombre único
if (move_uploaded_file($_FILES["logo"]["tmp_name"], $imagenRuta)) {
    // La imagen se ha cargado correctamente

    // Obtén el nombre de archivo para insertar en la base de datos
    $logoNombre = $imagenNombre;
    $imageURLs = $_POST["image"];
    // Concatena las URLs de las imágenes con comas
    $imageURLsConcatenated = implode(", ", $imageURLs);
    // Extraer el id de la url de youtube
    $parts = explode('/', parse_url($imageURLsConcatenated, PHP_URL_PATH));
    $lastPart = end($parts);
    
    // Inserta los datos en la base de datos, incluyendo el nombre del archivo del logo
    $sql = "INSERT INTO modelo (fk_id_empre,title_emprendimiento, descripcion, video, whatsapp, logo ) VALUES ('$idusuario','$nombre', '$descripcion', '$lastPart', '$whatsapp', '$logoNombre')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Emprendimiento Creado Exitosamente."); window.location.href="../vistas/pagina_emprendedor.php";</script>';
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }
} else {
    echo "Error al cargar la imagen.";
}

}
