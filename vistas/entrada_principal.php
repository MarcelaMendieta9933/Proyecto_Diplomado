<link rel="icon" type="image/x-icon" href="../imagenes/logo.png" />
<link rel="stylesheet" href="../css/mi_emprendedor.css">
<title>Timely | Emprendedor</title>
<div class="cajafuera">
<div class="pagprincipal">
	
<?php
include('../controlador/conexion_db.php');
session_start();

if(isset($_SESSION['nombredelusuario']))
{
	$usuarioingresado = $_SESSION['nombredelusuario'];
	echo "<h1>Bienvenido: $usuarioingresado </h1>";
}
else
{
	header('location: ../vistas/mi_emprendedor.html');
}
?>
<form method="POST">
<tr><td colspan="2" style="align:center"><input type="submit" value="Cerrar sesión" name="btncerrar" /></td></tr>
</form>

<?php 

if(isset($_POST['btncerrar']))
{
	session_destroy();
	header('location: ../vistas/mi_emprendedor.html');
}
	
?>

</div>

</div>