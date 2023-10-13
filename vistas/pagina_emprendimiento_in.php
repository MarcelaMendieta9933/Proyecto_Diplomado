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

<?php include "nav.html"; ?>

    <!-- Button trigger modal -->
    <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Editar Emprendimiento
        </button>
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
                        <form action="../controlador/detalle_update_empren.php" onsubmit="" method="post"  class="row g-3 needs-validation" novalidate>
                            <div class="form-group emprendimiento-info">
                                <input type="hidden" name="id" value="<?php echo $emprendimiento['id']; ?>">
                                <label for="nombre">Nombre del Emprendimiento:</label>
                                <input class="form-control"  type="text" name="nombre" value="<?php echo $emprendimiento['title_emprendimiento'] ?>" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control"  name="descripcion" required><?php echo $emprendimiento['descripcion'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="whatsapp">Número de WhatsApp:</label>
                                <input class="form-control"  type="text" name="whatsapp" value="<?php echo $emprendimiento['whatsapp']?>" required autocomplete="off">
                            </div>
                            <div id="productFields">
                                <div class="form-group product">
                                    <label for="image">Enlace del Video:</label>
                                    <input class="form-control" type="text" name="image[]" value="<?php echo $emprendimiento['video'];?>" required autocomplete="off">
                                </div>
                            </div>
                            <br>
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
    <button id="borrarBtn" data-id="<?php echo $emprendimiento['id']; ?>">Borrar</button>
    <button id="volverBtn">Volver</button> 
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-6 informacion_general">
                <img src="../imagenes/empredimientos/<?php echo $emprendimiento['logo']?>" class="card-img-top" alt="logo empredimiento">
            </div>
            <div class="col-6 informacion_general">
                <h1 class="titulo_empredimiento"><?php echo $emprendimiento['title_emprendimiento'] ?> </h1>
                <p class="descripcion_empredimiento"><?php echo $emprendimiento['descripcion'] ?></p>
                <div class="contacto_empredimiento" onclick="redireccionar()">
                    <img src="../imagenes/logoTimely.png" alt="logo_whats">
            </div>
                    <a href="https://api.whatsapp.com/send?phone=<?php echo $emprendimiento['whatsapp']?>"><?php echo $emprendimiento['whatsapp']?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="video-section">
        <!-- Aquí puedes insertar tu video -->    
        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $emprendimiento['video'];?>?si=NPusF_BoiBJPF2MN" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
        
    <!-- Modal -->
    <?php 
        //$query=mysqli_query($conn,"SELECT * FROM emprendedores WHERE fk_id_usu = $id;");
        //$resultado = mysqli_fetch_array($query);


    ?>

    <?php include "footer.html"; ?>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $("#borrarBtn").click(function() {
        var id = $(this).data("id");
        
        if (confirm("¿Estás seguro de que deseas eliminar este elemento?")) {
            $.post("../controlador/borrar_emprendimiento.php", { id: id }, function(data) {
                if (data.includes("Exito")) {
                    window.location.href = '../vistas/pagina_emprendedor.php'; // Redirige a la otra página después de eliminar.
                } else {
                    alert('Error al eliminar el usuario: ' + data);
                }
            });
        }
    });
});
</script>

<script>
$(document).ready(function() {
    $("#volverBtn").click(function() {
        window.history.back();
    });
});
</script>

<script>function redireccionar() {
    window.location.href ='https://api.whatsapp.com/send?phone=<?php echo $emprendimiento['whatsapp']?>';
  }</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</html>