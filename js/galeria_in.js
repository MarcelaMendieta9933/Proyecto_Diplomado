// script.js
window.addEventListener('DOMContentLoaded', (event) => {
    fetch('../controlador/cargar_emprendimientos_in.php')
    .then(response => response.json())
    .then(data => {
        const emprendimientosDiv = document.getElementById('emprendimientos');
        data.forEach(emprendimiento => {
            const emprendimientoDiv = document.createElement('div');
            emprendimientoDiv.classList.add('card', 'gallery-item', 'col-xs-12', 'col-sm-6', 'col-md-4', 'col-lg-3');
            emprendimientoDiv.setAttribute('data-tags', emprendimiento.categorias); // Si tienes categorías, puedes asignarlas aquí
            emprendimientoDiv.innerHTML = `
                <img src="../imagenes/empredimientos/${emprendimiento.logo}" class="card-img-top w-100 h-100" alt="${emprendimiento.title_emprendimiento}">
                <div class="card-body" id="card-body_id">
                    <h2 class="card-title">${emprendimiento.title_emprendimiento}</h2>
                    <p class="card-text">${emprendimiento.descripcion.substring(0, 100)}...</p>
                    <button onclick="location.href='../vistas/pagina_emprendimiento_in.php?id=${emprendimiento.id}'" class="btn btn-primary">Ver más</button>
                </div>
            `;
            emprendimientosDiv.appendChild(emprendimientoDiv);
        });
    });
 });
 