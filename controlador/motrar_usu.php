<?php
include 'conexion_db.php';

// Número de usuarios por página
$usuariosPorPagina = 5;

// Obtén el número total de usuarios
$consultaTotal = "SELECT COUNT(*) AS total FROM usuarios";
$resultadoTotal = mysqli_query($conn, $consultaTotal);
$filaTotal = mysqli_fetch_assoc($resultadoTotal);
$totalUsuarios = $filaTotal['total'];

// Calcula la cantidad total de páginas
$totalPaginas = ceil($totalUsuarios / $usuariosPorPagina);

// Obtiene el número de página actual de la URL (por ejemplo, ?pagina=2)
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcula el offset (inicio) para la consulta SQL
$offset = ($paginaActual - 1) * $usuariosPorPagina;

// Consulta para obtener los usuarios en la página actual
$consulta = "SELECT id, usuario, nivel, correo FROM usuarios LIMIT $offset, $usuariosPorPagina";
$resultado = mysqli_query($conn, $consulta);

// Generar filas de la tabla
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr id='filaUsuario" . $fila['id'] . "'>";
    //echo "<th scope='row'>" . $fila['id'] . "</th>";
    echo "<td>" . $fila['usuario'] . "</td>";
    echo "<td>" . $fila['nivel'] . "</td>";
    echo "<td>" . $fila['correo'] . "</td>";
    echo "<td>";
    echo "<a href='editar_usuario.php?id=" . $fila['id'] . "' class='btn btn-warning'>Editar</a>";
    echo "<button onclick='borrarUsuario(" . $fila['id'] . ")' type=\"button\" class=\"btn btn-danger\">Borrar</button>";
    echo "</td>";
    echo "</tr>";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>