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
    <div class="slider-frame d-block w-100">
        <ul>
            <li><img src="../imagenes/slider1.jpg" alt=""></li>
            <li><img src="../imagenes/slider2.jpg" alt=""></li>
            <li><img src="../imagenes/slider3.jpg" alt=""></li>
            <li><img src="../imagenes/slider4.jpg" alt=""></li>
        </ul>
    </div>
    <!-- Barra de búsqueda -->
    <div class="search-bar">
        <input type="text" id="search-input" placeholder="Buscar...">
        <button id="search-button">Buscar</button>
    </div>
    <!-- Cuadros de galería -->
    <div class="gallery">
        <!-- Cuadro 1 -->
        <div class="gallery-item" data-tags="Autos">
            <img src="../imagenes/autos1.jpg" alt="Autos">
        </div>
        <!-- Cuadro 2 -->
        <div class="gallery-item" data-tags="Comida">
            <img src="../imagenes/comida1.jpg" alt="Comida">
        </div>
        <!-- Cuadro 3 -->
        <div class="gallery-item" data-tags="Barberia">
            <img src="../imagenes/barberia1.jpg" alt="Barberia">
        </div>
        <!-- Cuadro 4 -->
        <div class="gallery-item" data-tags="Autos">
            <img src="../imagenes/autos2.jpg" alt="Autos">
        </div>
        <!-- Cuadro 5 -->
        <div class="gallery-item" data-tags="Comida">
            <img src="../imagenes/comida2.jpg" alt="Comida">
        </div>
        <!-- Cuadro 6 -->
        <div class="gallery-item" data-tags="Barberia">
            <img src="../imagenes/barberia2.jpg" alt="Barberia">
        </div>
        <!-- Cuadro 7 -->
        <div class="gallery-item" data-tags="Autos">
            <img src="../imagenes/autos3.jpg" alt="Autos">
        </div>
        <!-- Cuadro 8 -->
        <div class="gallery-item" data-tags="Comida">
            <img src="../imagenes/comida3.jpg" alt="Comida">
        </div>
        <!-- Cuadro 9 -->
        <div class="gallery-item" data-tags="Barberia">
            <img src="../imagenes/barberia3.jpg" alt="Barberia">
        </div>  
    </div>

    <?php include "footer.html"; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    // Función para realizar la búsqueda
    document.getElementById('search-button').addEventListener('click', function () {
        var searchTerm = document.getElementById('search-input').value.toLowerCase();
        var galleryItems = document.querySelectorAll('.gallery-item');

        galleryItems.forEach(function (item) {
            var tags = item.getAttribute('data-tags').toLowerCase();
            var image = item.querySelector('img');

            if (tags.includes(searchTerm) || searchTerm === '') {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>    
</html>