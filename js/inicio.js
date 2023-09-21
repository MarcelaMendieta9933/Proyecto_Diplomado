document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search-input");
    const galleryItems = document.querySelectorAll(".gallery-item");

    searchInput.addEventListener("input", function () {
        const searchTerm = searchInput.value.toLowerCase();

        galleryItems.forEach(function (item) {
            const tags = item.getAttribute("data-tags").toLowerCase();

            if (tags.includes(searchTerm)) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    });
});

$(document).ready(function () {
    // Variables para rastrear la imagen actual y el número total de imágenes
    var currentImage = 0;
    var totalImages = $("ul li").length;

    // Agrega un controlador de clic al botón "Siguiente"
    $("#carousel-control-next").click(function () {
        currentImage++;
        if (currentImage >= totalImages) {
            currentImage = 0;
        }
        updateCarousel();
    });

    // Agrega un controlador de clic al botón "Anterior"
    $("#carousel-control-prev").click(function () {
        currentImage--;
        if (currentImage < 0) {
            currentImage = totalImages - 1;
        }
        updateCarousel();
    });

    // Función para actualizar el carrusel
    function updateCarousel() {
        $("ul li").removeClass("active");
        $("ul li:eq(" + currentImage + ")").addClass("active");
    }
});
