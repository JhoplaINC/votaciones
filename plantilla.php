<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto d-flex justify-content-center w-100 top-fixed">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formulario">Formulario</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <footer>
        <div class="footer-left-section footer-section">
            <p>Web "diseñada" y Desarrollada por <span>Jorge Plaza</span></p>
        </div>
        <div class="br-line"></div>
        <div class="footer-right-section footer-section">
            <p>Me pueden contactar a través de</p>
            <ul>
                <li><i class="fa-brands fa-whatsapp"></i><a href="https://wa.me/56983069105" target="_blank">+56 9 8306
                        9105</a></li>
                <li><i class="fa-brands fa-linkedin"></i><a href="https://www.linkedin.com/in/jhoplainc"
                        target="_blank">Jorge Plaza</a></li>
                <li><i class="fa-brands fa-github"></i><a href="https://github.com/JhoplaINC" target="_blank">&#64;Jhopla</a>
                </li>
                <li><i class="fa-solid fa-at"></i><a
                        href="mailto:jorge.plaza.gj@gmail.com">jorge.plaza.gj&#64;gmail.com</a></li>
                <li><i class="fa-solid fa-phone"></i><a href="tel:+56983069105">+56 9 8306 9105</a></li>
            </ul>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://kit.fontawesome.com/ad2b2855c3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#successModal').modal('show'); // Mostrar el modal al cargar la página si existe el ancla #successModal
        });
    </script>
</body>
</html>