<!DOCTYPE html>
<html lang="es">
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
                 <div class="bienvenida_adminstrador">Bienvenido Administrador <?php
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
                 <form method="POST" >
                <input type="submit" class="close-button" value="Cerrar sesión" name="btncerrar" />
                </form>
                <?php 
                if(isset($_POST['btncerrar']))
                {
                    session_destroy();
                    header('location: ../vistas/mi_emprendedor.html');
                }
                ?>
            </nav>
            
<div class="busqueda"> 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Agregar Usuarios
  </button>
    <div class="barra_busqueda">
        <input type="text" class="caja_busqueda" id="inputBusqueda" placeholder="Buscar por usuario">
        <button type="button" class="btn btn-success" onclick="buscarUsuario()">Buscar</button>
    </div>
</div>
  
  <!-- Modal -->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Administrador</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
        <form action="../controlador/newusuario.php" onsubmit="" method="post"  class="row g-3 needs-validation" novalidate>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
              </div>
              <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nivel</label>
            <select class="form-select" aria-label="Default select example" id="nivel" name="nivel" required>
                <option value="administrador">administrador</option>
                <option value="usuario">usuario</option>
              </select>
            </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" id="correo" placeholder="name@example.com" required>
              </div>
              
              <div class="mb-3 row">
                <label for="inputPassword" class="form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                </div>
              </div>
              <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                  Contener entre 8 a 6 caracteres.
                </span>
            </div>
            <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" name="insertar">Guardar</button>
        </div>

        </form>
        
        </div>
       
      </div>
      
    </div>
  </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="tabla_usuarios">
                <thead>
                    <tr>
                        <th scope="col">Usuario</th>
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
              <ul class="pagination" <?php if ($totalUsuarios <= $usuariosPorPagina) echo 'style="display: none;"'; ?>>
                  <?php
                  // Loop para generar los enlaces de las páginas
                  for ($i = 1; $i <= $totalPaginas; $i++) {
                      echo '<li class="page-item"><a class="page-link" href="?pagina=' . $i . '">' . $i . '</a></li>';
                  }
                  ?>
              </ul>
             </footer>
        </div>

</body>
<script>
                (() => {
                    'use strict'

                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    const forms = document.querySelectorAll('.needs-validation')

                    // Loop over them and prevent submission
                    Array.from(forms).forEach(form => {
                        form.addEventListener('submit', event => {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
                })()

                function buscarUsuario() {
                  var textoBusqueda = $('#inputBusqueda').val().toLowerCase();
        
        $('#tabla_usuarios tbody tr').each(function () {
            var textoFila = $(this).text().toLowerCase();
            if (textoFila.indexOf(textoBusqueda) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
}
            </script>
<script src="../js/borrar_usu.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>