// Variables globales para almacenar el ID del usuario que se va a editar
var usuarioID;

function editarUsuario(btn) {
    usuarioID = btn.getAttribute('data-id');
    console.log("Editar usuario con ID: " + usuarioID);
    $('#editarModal').modal('show');
    // Obtener los datos del usuario mediante una solicitud AJAX si es necesario
    // Llenar el formulario con los datos del usuario
    // Ejemplo de cómo llenar el campo 'usuario':
    // document.getElementById('usuario').value = 'Valor del usuario';
    $('#editarModal').modal('show'); // Mostrar el modal
}

function guardarEdicion() {
    // Obtener los datos del formulario de edición
    var usuario = document.getElementById('usuario').value;
    var nivel = document.getElementById('nivel').value;
    var correo = document.getElementById('correo').value;
    var contrasena = document.getElementById('contrasena').value;

    // Hacer una solicitud AJAX para guardar los cambios en el servidor
    $.ajax({
        type: "POST",
        url: "../controlador/actualizar_usu.php", // Ruta al script PHP de actualización
        data: {
            usuarioID: usuarioID,
            usuario: usuario,
            nivel: nivel,
            correo: correo,
            contrasena: contrasena
        },
        success: function (response) {
            if (response === "success") {
                // Actualizar la fila en la tabla con los nuevos datos (si es necesario)
                // Esto depende de cómo actualices tus datos en la tabla
                // Cierra el modal
                $('#editarModal').modal('hide');
                // Recargar la página o actualizar la tabla si es necesario
                // location.reload();
            } else {
                // Manejar errores o mostrar un mensaje de error al usuario
                alert("Error al guardar los cambios: " + response);
            }
        }
    });
}
