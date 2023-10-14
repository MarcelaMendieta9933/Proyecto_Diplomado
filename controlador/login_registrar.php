<!DOCTYPE html>

<head>
<script src="dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="icon" type="image/x-icon" href="../imagenes/logo.png"/>
</head>

</html>
<?php

include('conexion_db.php');

if(isset($_POST["accion"]))
{
    $accion = $_POST["accion"];
    $nombre = $_POST["txtusuario"];
    $pass = $_POST["txtpassword"];
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
            $_SESSION['idusuario']=$mostrar['id'];
            if($mostrar['nivel']=='usuario') 
            {
                header("Location: ../vistas/pagina_emprendedor.php");
            }
            else
            {
                header("Location: ../vistas/pagina_administrador.php");
            }
            
        }
        else
        {
            echo "<script> Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Usuario o contraseña incorrecto',
                showConfirmButton: false
              });
              setTimeout(function() {
                window.location='../vistas/pagina_administrador.php';
              }, 2800);
              </script>";; 
        }
    }

    //Para registrar
    if($accion == "registrar")
    {
        
        $correo = $_POST["txtemail"];
        $queryusuario = mysqli_query($conn,"SELECT * FROM usuarios WHERE usuario = '$nombre'");
        $nr = mysqli_num_rows($queryusuario); 

        if ($nr == 0)
        {
            $pass_fuerte = password_hash($pass, PASSWORD_BCRYPT);
            $queryregistrar = "INSERT INTO usuarios(usuario,nivel,correo,contraseña) values ('$nombre','$nivel','$correo','$pass_fuerte')";
            
            if(mysqli_query($conn,$queryregistrar))
            {
                echo "<script> Swal.fire(
                    {icon: 'success',
                    title: 'Usuario creado $nombre',
                    text: 'Exitosamente!!!',
                    showConfirmButton: false}
                  );    
                  setTimeout(function() {
                    window.location='../vistas/pagina_emprendedor.php';
                  }, 1500);
                  </script>";            }
            else 
            {
                echo "Error: " .$queryregistrar."<br>".mysql_error($conn);
            }
        }
        else
        {
            echo "<script> Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Este usuario $nombre ya existe '
              });    
              setTimeout(function() {
                window.location='../vistas/pagina_emprendedor.php';
              }, 2800);
              </script>";         }
    } 
}
?>