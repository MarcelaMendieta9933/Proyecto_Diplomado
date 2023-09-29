function borrarUsuario(usuarioID) {
    if (confirm("¿Estás seguro de que deseas borrar este usuario?")) {
        // Hacer una solicitud AJAX para eliminar el usuario en el servidor
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../controlador/borrar_usu.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Recargar la página o actualizar la tabla después de eliminar el usuario
                location.reload();
            }
        };
        xhr.send("usuarioID=" + usuarioID);
    }
}
