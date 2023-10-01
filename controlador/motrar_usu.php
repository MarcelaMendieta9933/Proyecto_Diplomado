<?php
include 'conexion_db.php';

$consulta = "SELECT id,	usuario, nivel, correo FROM usuarios;";
$resultado = mysqli_query($conn, $consulta);

// Generar filas de la tabla
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<th scope='row'>" . $fila['id'] . "</th>";
    echo "<td>" . $fila['usuario'] . "</td>";
    echo "<td>" . $fila['nivel'] . "</td>";
    echo "<td>" . $fila['correo'] . "</td>";
    echo "<td>";
    echo "<a href='editar_usuario.php?id=" . $fila['id'] . "' class='btn btn-warning'>Editar</a>";
    echo "<button onclick='borrarUsuario(" . $fila['id'] . ")' type=\"button\" class=\"btn btn-danger\">Borrar</button>";
    echo "</td>";
    echo "</tr>";
    //echo "<td><button type=\"button\" class=\"btn btn-warning\">Editar</button><button type=\"button\" class=\"btn btn-danger\">borrar</button></td>";
    //echo "</tr>";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);

?>