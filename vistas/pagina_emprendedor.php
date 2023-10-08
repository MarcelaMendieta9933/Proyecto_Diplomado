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

                if(isset($_SESSION['nombredelusuario'],$_SESSION['idusuario']))
                {
                  $usuarioingresado = $_SESSION['nombredelusuario'];
                  
                  echo "$usuarioingresado";
                  $id = $_SESSION['idusuario'];
                  
                }
                else
                {
                  header('location: ../vistas/mi_emprendedor.html');
                }
                ?>  
                 a Timely</div>
                 <!-- Button trigger modal -->
                        <div>
                        <button type="button" class="btn btn-outline-light" id="boton" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        </button>
                        </div>
                        
                        <!-- Modal -->
                        <?php 
                            $query=mysqli_query($conn,"SELECT * FROM emprendedores WHERE fk_id_usu = $id;");
                            $resultado = mysqli_fetch_array($query);


                        ?>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edita tu Información </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form method="post" action="../controlador/update_emprendedor.php" onsubmit="" class="row g-3 needs-validation" novalidate>
                                    
                                    <div class="form-group">
                                        <label for="nombre">Nombre Completo:</label>
                                        <input class="form-control" id="nombre_completo" type="text" value="<?php echo $resultado['nombre_completo'];?>" name="nombre_completo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Cuidad :</label>
                                        <input class="form-control" id="cuidad" type="text" value="<?php echo $resultado['ciudad'];?>" name="ciudad" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Cedula :</label>
                                        <input class="form-control" id="cedula" type="text" value="<?php echo $resultado['cedula'];?>" name="cedula" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Teléfono :</label>
                                        <input class="form-control" id="telefono" type="text" value="<?php echo $resultado['telefono'];?>" name="telefono" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Dirección :</label>
                                        <input class="form-control" id="direccion" type="text" value="<?php echo $resultado['direccion'];?>" name="direccion" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="insertar">Actualizar</button>
                                    </div>
                            </form>
                            </div>
                            
                            </div>
                        </div>
                        </div>
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
            <div class="cuadros" id="cuadro_empredimiento" onclick="redireccionar()">
                Crear emprendimiento
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="../js/ventana_sesion.js"></script>
<script>
    function redireccionar() {
    window.location.href = 'agregar_empr.php';
  }
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

