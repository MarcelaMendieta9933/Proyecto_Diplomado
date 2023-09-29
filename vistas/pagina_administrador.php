<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../imagenes/logo.png" />
    <link rel="stylesheet" href="../css/pagina_administrador.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Timely | Administrador</title>
</head>
<body>
    <div class="fondo">
        <div class="caja">
            <nav class="nav_admnistrador">
                <img class="imagen_nav" src="../imagenes/logoTimely.png" alt="Timely">
                <div class="bienvenida_adminstrador">Bienvenido Administrador {cambiar} a Timely</div>
                <img class="usuario" src="../imagenes/usuario.png" alt="usuario">
            </nav>
            <button type="button" class="btn btn-primary">Agregar</button>
            <table class="table table-bordered" id="tabla_usuarios">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Uuario</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                     include("../controlador/motrar_usu.php");
                     ?>
                    </tbody>
            </table>
            <footer>
                <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link" href="../vistas/pagina_administrador.html" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="../vistas/pagina_administrador.html" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
            </footer>
        </div>
    </div>
    <script src="../js/borrar_usu.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>