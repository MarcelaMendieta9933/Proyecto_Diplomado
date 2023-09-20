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
