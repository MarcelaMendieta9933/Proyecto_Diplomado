<?php
// detalle_emprendimiento.php
require_once '../controlador/conexion_db.php'; // Aquí debes tener tus credenciales de conexión a la base de datos

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM modelo WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $emprendimiento = $result->fetch_assoc();
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../imagenes/logo.png"/>
    <link rel="stylesheet" href="../css/inicio.css"> <!-- cambiar -->
    <link rel="stylesheet" href="../css/pagina_empredimiento.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Timely | Emprendimiento</title> <!-- cambiar si se puede para traer el nombre del emprendiento -->
</head>
<body>
<div class="fondo">
<?php include "nav.html"; ?>

    <div class="container">
        <div class="row justify-content-around">
            <div class="col-4 col-md-4 informacion_general">
                <img src="../imagenes/empredimientos/<?php echo $emprendimiento['logo']?>" class="card-img-top" id="img_size" alt="logo empredimiento">
            </div>
            <div class="col-8 col-md-8 informacion_general" id="info_general">
                <h1 class="titulo_empredimiento"><?php echo $emprendimiento['title_emprendimiento'] ?></h1>
                <p class="descripcion_empredimiento"><?php echo $emprendimiento['descripcion'] ?></p>
                <div class="contacto_empredimiento" onclick="redireccionar()">
                    
                    <a class="numero_empre" href="https://api.whatsapp.com/send?phone=<?php echo $emprendimiento['whatsapp']?>">
                        <img src="../imagenes/wso-removebg-preview.png" alt="logo_whats"><?php echo $emprendimiento['whatsapp']?>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="mensaje_video">
        Conozca mas del empredimiento en el siguiente video: 
    </div>

    <div class="video-section">
        <!-- Aquí puedes insertar tu video -->    
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $emprendimiento['video'];?>?si=NPusF_BoiBJPF2MN" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <p>Creditos de youtube.</p>
    </div>
    

<?php include "footer.html"; ?>
</div>
</body>
<script>function redireccionar() {
    window.location.href ='https://api.whatsapp.com/send?phone=<?php echo $emprendimiento['whatsapp']?>';
  }</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</html>