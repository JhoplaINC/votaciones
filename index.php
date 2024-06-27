<?php
$title = "Inicio";
$content = 
<<<HTML
    <div class="container d-flex flex-wrap index-container">
        <div class="w-100 d-flex flex-wrap info-container">
            <div class="w-50">
                <img src="assets/images/technologies.png" alt="Technologies">
            </div>
            <div class="w-50 d-flex flex-column align-items-center justify-content-center">
                <p class="index-title">Las tecnologías utilizadas fueron</p>
                <ul>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>Bootstrap</li>
                    <li>PHP 8.1.10</li>
                    <li>Javascript</li>
                    <li>jQuery</li>
                    <li>MySQL 8.0.30</li>
                    <li>Laragon</li>
                </ul>
            </div>
        </div>
        <div class="w-100 d-flex flex-wrap info-container">
            <div class="w-50 d-flex flex-column align-items-center justify-content-center">
                <p class="index-title">¿Cuál es el propósito de este sitio web?</p>
                <p>
                    El principal motivo por el que se desarrolló este sitio web, fue para demostrar un poco lo que es posible realizar con las herramientas bases 
                    utilizadas por muchos programadores, tanto Frontend como Backend.     
                </p>
                <p class="index-title">¿Para qué sirve este sitio web?</p>
                <p>
                    Este sitio web, nos permite realizar unas elecciones de manera virtual, obteniendo los candidatos por regiones. <br />
                    Solo podremos votar 1 vez con nuestro rut y correo, por lo que debemos tener cuidado! :)
                </p>
            </div>
            <div class="w-50">
                <img src="assets/images/goal.png" alt="Goal">
            </div>
        </div>
        <div class="w-100 d-flex flex-wrap info-container">
            <div class="w-50 d-flex flex-column align-items-center justify-content-center">
                <p class="index-title">¿A quiénes está dirigido este sitio web?</p>
                <p>
                    A aquellas entidades que deseen tener un sistema electoral de manera virtual, evitando filas y colas de espera para, de esta forma, 
                    agilizar el flujo de votantes, permitiendo hacerlo a todo aquel que tenga: acceso a internet, un rut y un correo     
                </p>
                <p class="index-title">¿Solo a ellos?</p>
                <p>
                    Claro que no! <br />
                    También, está dirigido a quienes vean este sitio web y quieran ver las maravillas que, aunque relativamente simples, se pueden crear con 
                    herramientas "base" para la programación, como lo serían PHP, HTML, CSS y Javascript
                </p>
                <p>
                    Además de las personas mencionadas, también es una web para un portafolio personal, permitiendo a los reclutadores o desarrolladores 
                    conocer un poco sobre las cosas que hago
                </p>
            </div>
            <div class="w-50">
                <img src="assets/images/goal.png" alt="Goal">
            </div>
        </div>
    </div>
HTML;

include 'plantilla.php';
?>