document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

    // Iterar sobre cada enlace de navegación
    navLinks.forEach(function (navLink) {
        // Verificar si la URL actual coincide con el href del enlace
        if (window.location.href.includes(navLink.href)) {
            navLink.classList.add("active"); // Agregar la clase active al enlace correspondiente
        }
    });
});
