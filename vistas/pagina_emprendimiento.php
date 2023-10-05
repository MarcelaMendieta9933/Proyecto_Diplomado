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

<?php include "nav.html"; ?>

    <div class="container">
        <div class="row justify-content-around">
            <div class="col-6 informacion_general">
                <img src="../imagenes/empredimientos/logoTimely.png" class="card-img-top" alt="logo empredimiento">
            </div>
            <div class="col-6 informacion_general">
                <h1 class="titulo_empredimiento">titulo empredimiento</h1>
                <p class="descripcion_empredimiento">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga non excepturi laudantium ipsum ab. Earum ipsam nobis esse odio ut aspernatur. Fuga assumenda odio in aliquam dignissimos illo enim officiis!</p>
                <div class="contacto_empredimiento">
                    <img src="../imagenes/wso-removebg-preview.png" alt="logo_whats">
                    <h5>numero celular</h5>
                </div>
            </div>
        </div>
    </div>

    <div>
        cuadro de titulo productos y servicios
    </div>


    <!-- Cuadros de galería -->
    <div class="gallery">
        <!-- Cuadro 1 -->
        <div class="card gallery-item col-xs-12 col-sm-6 col-md-4 col-lg-3" data-tags="Autos deportivos, autos de lujo, automóviles rápidos">
            <img src="../imagenes/autos1.jpg" class="card-img-top" alt="Autos">
            <div class="card-body">
                <h6 class="card-title">Producto/servicio</h6> <!-- centrar -->
            </div>
        </div>
        <!-- Cuadro 2 -->
        <div class="card gallery-item col-xs-12 col-sm-6 col-md-4 col-lg-3" data-tags="Comida">
            <img src="../imagenes/comida1.jpg" class="card-img-top" alt="Comida">
            <div class="card-body">
                <h6 class="card-title">Producto/servicio</h5>
            </div>
        </div>
        <!-- Cuadro 3 -->
        <div class="card gallery-item col-xs-12 col-sm-6 col-md-4 col-lg-3" data-tags="Barberia">
            <img src="../imagenes/barberia1.jpg" class="card-img-top" alt="Barberia">
            <div class="card-body">
                <h5 class="card-title">Producto/servicio</h5>
            </div>
        </div>
        <!-- Cuadro 4 -->
        <div class="card gallery-item col-xs-12 col-sm-6 col-md-4 col-lg-3" data-tags="Autos">
            <img src="../imagenes/autos2.jpg" class="card-img-top" alt="Autos">
            <div class="card-body">
                <h5 class="card-title">Producto/servicio</h5>
            </div>
        </div>
        <!-- Cuadro 5 -->
        <div class="card gallery-item col-xs-12 col-sm-6 col-md-4 col-lg-3" data-tags="Comida">
            <img src="../imagenes/comida2.jpg" class="card-img-top" alt="Comida">
            <div class="card-body">
                <h5 class="card-title">Producto/servicio</h5>
            </div>
        </div>
        <!-- Cuadro 6 -->
        <div class="card gallery-item col-xs-12 col-sm-6 col-md-4 col-lg-3" data-tags="Barberia">
            <img src="../imagenes/barberia2.jpg" class="card-img-top" alt="Barberia">
            <div class="card-body">
                <h5 class="card-title">Producto/servicio</h5>
            </div>
        </div>
    </div>

    <?php include "footer.html"; ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</html>