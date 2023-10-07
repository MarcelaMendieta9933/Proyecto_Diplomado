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

    <div class="video-section">
        <!-- Aquí puedes insertar tu video -->
        <iframe width="560" height="315" src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0" allowfullscreen></iframe>
    </div>

    <?php include "footer.html"; ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</html>