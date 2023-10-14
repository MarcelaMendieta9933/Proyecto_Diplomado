<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../imagenes/logo.png"/>
    <link rel="stylesheet" href="../css/inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Timely | Inicio</title>
</head>
<body>

<?php include "nav.html"; ?>

    <div id="carouselControls" class="carousel slide slider-frame d-block w-100" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../imagenes/slider1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../imagenes/slider2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../imagenes/slider3.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../imagenes/slider4.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <!-- Barra de búsqueda -->
    <div class="search-bar">
        <form class="d-flex justify-content-center align-items-center" role="search">
            <input id="search-input" class="form-control" type="search" placeholder="&#128269; Cuentanos ¿en qué estas interesado?" aria-label="Buscar" autocomplete="off">
        </form>
    </div>

    <!-- Cuadros de galería -->
   
    <div class="gallery" id="emprendimientos">
        <script src="../js/galeria_inicio.js"></script>
    </div>

    <?php include "footer.html"; ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="../js/inicio.js">
</script>    
</html>