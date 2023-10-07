<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../imagenes/logo.png" />
    <link rel="stylesheet" href="../css/pagina_emprendedor.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Timely | Emprendedor</title>
</head>
<body>
    <div class="fondo">
        <div class="caja">
            <nav class="nav_emprendedor">
                <img class="imagen_nav" src="../imagenes/logoTimely.png" name="" alt="Timely">
                <div class="bienvenida_emprendedor">Bienvenido Emprendedor 
                <?php
                include('../controlador/conexion_db.php');
                session_start();

                if(isset($_SESSION['nombredelusuario']))
                {
                  $usuarioingresado = $_SESSION['nombredelusuario'];
                  
                  echo "$usuarioingresado";
                  
                }
                else
                {
                  header('location: ../vistas/mi_emprendedor.html');
                }
                ?>  
                 a Timely</div>
                <img class="usuario" src="../imagenes/usuario.png" alt="usuario" onclick="PopupUser()">
                <?php 
                if(isset($_SESSION['idusuario'])){
                    $id = $_SESSION['idusuario'];
                    
                    $queryVerify = mysqli_query($conn,"SELECT * FROM `emprendedores` WHERE fk_id_usu = $id;");
                    $nr= mysqli_num_rows($queryVerify);
                    if ($nr == 0) {
                        // El resultado de la consulta es vacío, redirigir al usuario a registroemprendedor.php
                        header('location: ../vistas/registroemprendedor.php');
                        exit(); // Es importante salir del script después de enviar el encabezado de redirección
                    }
                }
                ?>
            </nav>
            <form method="POST">
                <input type="submit" class="close-button" value="Cerrar sesión" name="btncerrar" />
                </form>
                <?php 
                if(isset($_POST['btncerrar']))
                {
                    session_destroy();
                    header('location: ../vistas/mi_emprendedor.html');
                }
                ?> 
                
            <div id="carouselControls" class="carousel slide slider-frame d-block w-100" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../imagenes/slider2_1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../imagenes/slider2_2.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../imagenes/slider2_3.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../imagenes/slider2_4.png" class="d-block w-100" alt="...">
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
            <a href="agregar_empr.php">
                <div class="cuadros" id="cuadro_empredimiento" onclick="agregarCuadro(this)">
                    crear emprendimiento
                    <!-- <div class="cuadro" id="cuadro1" onclick="agregarCuadro(this)">
                        <input type="text" placeholder="Ingrese contenido" class="contenido">
                    </div> -->
                </div>
            </a>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="../js/ventana_sesion.js"></script>
<script>
//     let contador = 1;

// function agregarCuadro(cuadroPadre) {
//     const nuevoCuadro = document.createElement("div");
//     nuevoCuadro.classList.add("cuadro");
//     nuevoCuadro.id = "cuadro" + (contador + 1);
    
//     const input = document.createElement("input");
//     input.type = "text";
//     input.placeholder = "Ingrese contenido";
//     input.classList.add("contenido");

//     nuevoCuadro.appendChild(input);
//     cuadroPadre.appendChild(nuevoCuadro);
    
//     contador++;
// }
</script>
</html>