document.addEventListener("DOMContentLoaded", async function () {
    try {
        // Lógica para cargar los elementos de la galería
        const response = await fetch('../controlador/cargar_emprendimientos.php');
        const data = await response.json();

        const emprendimientosDiv = document.getElementById('emprendimientos');
        data.forEach(emprendimiento => {
            const emprendimientoDiv = document.createElement('div');
            emprendimientoDiv.classList.add('card', 'gallery-item', 'col-xs-12', 'col-sm-6', 'col-md-4', 'col-lg-3');
            emprendimientoDiv.setAttribute('data-tags', emprendimiento.categorias); // Si tienes categorías, puedes asignarlas aquí
            emprendimientoDiv.setAttribute('data-categorias', emprendimiento.categorias); 
            emprendimientoDiv.innerHTML = `
                <img src="../imagenes/empredimientos/${emprendimiento.logo}" class="card-img-top w-100 h-100" alt="${emprendimiento.categorias}" onclick="location.href='../vistas/pagina_emprendimiento.php?id=${emprendimiento.id}'"">
                <div class="card-body" id="card-body_id">
                    <h2 class="card-title">${emprendimiento.title_emprendimiento}</h2>
                    <p class="card-text">${emprendimiento.descripcion.substring(0, 100)}...</p>
                    <button onclick="location.href='../vistas/pagina_emprendimiento.php?id=${emprendimiento.id}'" class="btn btn-primary">Ver más</button>
                </div>
            `;
            emprendimientosDiv.appendChild(emprendimientoDiv);
        });

        // Lógica para habilitar la funcionalidad de búsqueda
        const searchInput = document.getElementById("search-input");
        const galleryItems = document.querySelectorAll(".gallery-item");

        searchInput.addEventListener("input", function () {
  
            const searchTerm = searchInput.value.toLowerCase();

            galleryItems.forEach(function (item) {
                const altText = item.querySelector("img").getAttribute("alt").toLowerCase(); // Obtener las categorías

                if (altText.includes(searchTerm)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    } catch (error) {
        console.error("Error al cargar los datos: ", error);
    }
});