<?php

include('../db.php');

if(isset($_POST["accion"]))
{
    $accion = $_POST["accion"];
    $nombre = $_POST["txtusuario"];
    $pass = $_POST["txtpassword"];
    $correo =$_POST["txtemail"];
    $nivel = "usuario";


    //Para iniciar sesión
    if($accion == "login")
    {
        $queryusuario = mysqli_query($conn,"SELECT * FROM usuarios WHERE usuario = '$nombre'");
        $nr = mysqli_num_rows($queryusuario); 
        $mostrar = mysqli_fetch_array($queryusuario); 
        
        if (($nr == 1) && (password_verify($pass,$mostrar['contraseña'])))
        { 
            session_start();
            $_SESSION['nombredelusuario']=$nombre;
            header("Location: principal.php");
        }
        else
        {
            echo "<script> alert('Usuario o contraseña incorrecto. ');window.location= 'index.html' </script>"; 
        }
    }

    //Para registrar
    if($accion == "registrar")
    {
        $queryusuario = mysqli_query($conn,"SELECT * FROM usuarios WHERE usuario = '$nombre'");
        $nr = mysqli_num_rows($queryusuario); 

        if ($nr == 0)
        {
            $pass_fuerte = password_hash($pass, PASSWORD_BCRYPT);
            $queryregistrar = "INSERT INTO usuarios(usuario,correo,nivel,contraseña) values ('$nombre','$nivel','$correo','$pass_fuerte')";
            
            if(mysqli_query($conn,$queryregistrar))
            {
                echo "<script> alert('Usuario registrado: $nombre');window.location= 'index.html' </script>";
            }
            else 
            {
                echo "Error: " .$queryregistrar."<br>".mysql_error($conn);
            }
        }
        else
        {
            echo "<script> alert('No puedes registrar a este usuario: $nombre');window.location= 'index.html' </script>";
        }
    } 
}
?>
