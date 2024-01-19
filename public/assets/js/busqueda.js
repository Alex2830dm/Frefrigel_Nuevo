document.addEventListener("DOMContentLoaded", function () {
    // Obtener referencia al campo de búsqueda
    var searchInput = document.getElementById("searchInput");

    // Obtener todas las tarjetas de productos
    var cards = document.querySelectorAll(".card");

    // Agregar evento de escucha al campo de búsqueda
    searchInput.addEventListener("input", function () {
        // Obtener el término de búsqueda
        var searchTerm = searchInput.value.toLowerCase();

        // Iterar sobre todas las tarjetas y mostrar/ocultar según el término de búsqueda
        cards.forEach(function (card) {
            var productName = card.querySelector("#producto_venta").innerText.toLowerCase();

            if (productName.includes(searchTerm)) {
                // Mostrar la tarjeta si el nombre del producto incluye el término de búsqueda
                card.style.display = "block";
            } else {
                // Ocultar la tarjeta si el nombre del producto no incluye el término de búsqueda
                card.style.display = "none";
            }
        });
    });
});
