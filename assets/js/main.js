document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

    navLinks.forEach(function (navLink) {
        if (window.location.href.includes(navLink.href)) {
            navLink.classList.add("active");
        }
    });
});

document.getElementById("region").addEventListener("change", function () {
    let regionNum = this.value;

    let comunaSelect = document.getElementById("comuna");
    
    if (regionNum == "default") {
        comunaSelect.disabled = true;
        return;
    }

    comunaSelect.disabled = false;

    while (comunaSelect.options.length > 1) {
        comunaSelect.remove(1);
    }

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "obtener_comunas.php?id=" + regionNum, true);
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
            let data = JSON.parse(xhr.responseText);
            data.forEach(function (comuna) {
                let option = document.createElement("option");
                option.value = comuna.id;
                option.textContent = comuna.nombre;
                comunaSelect.appendChild(option);
            });
        }
    };
    xhr.send();
});

document.getElementById("region").addEventListener("change", function () {
    let regionNum = this.value;

    let candidatoSelect = document.getElementById("candidato");

    if (regionNum == "default") {
        candidatoSelect.disabled = true;
        return;
    }

    candidatoSelect.disabled = false;

    while (candidatoSelect.options.length > 1) {
        candidatoSelect.remove(1);
    }

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "obtener_candidatos.php?id=" + regionNum, true);
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
            let data = JSON.parse(xhr.responseText);
            data.forEach(function (candidato) {
                let option = document.createElement("option");
                option.value = candidato.id;
                option.textContent = candidato.nombre_completo;
                candidatoSelect.appendChild(option);
            });
        }
    };
    xhr.send();
});
