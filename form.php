<?php
require_once 'assets/php/models/regiones.model.php';
require_once 'assets/php/models/regiones_comunas.model.php';
require_once 'assets/php/models/candidatos.model.php';

$regiones = $regionesModel->getAllRegiones();

$title = "Página del formulario";
$content = <<<HTML
    <form>
        <p class="form-title">
            Formulario de votación
        </p>
        <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="fullname" id="fullname" placeholder="Nombre y apellido" required>
        </div>
        <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="alias" id="alias" placeholder="Alias" required>
        </div>
        <div class="form-group">
            <i class="fa-solid fa-id-card"></i>
            <input type="text" name="rut" id="rut" placeholder="Rut" required>
        </div>
        <div class="form-group">
            <i class="fa-solid fa-at"></i>
            <input type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <i class="fa-solid fa-location-dot"></i>
            <select name="region" id="region">
                <option value="default">Seleccione la región</option>
HTML;

        foreach ($regiones as $region) {
            $content .= <<<HTML
                <option value="{$region['numero']}">{$region['nombre']}</option>
HTML;
}

$content .= <<<HTML
            </select>
        </div>
        <div class="form-group">
            <i class="fa-solid fa-location-dot"></i>
            <select name="comuna" id="comuna" disabled>
                <option value="default">Seleccione la comuna</option>
            </select>
        </div>
        <div class="form-group">
            <i class="fa-solid fa-location-dot"></i>
            <select name="candidato" id="candidato" disabled>
                <option value="default">Seleccione el candidato</option>
            </select>
        </div>
        <div class="form-group">
            <i class="fa-solid fa-question"></i>
            <label for="canales">¿Cómo se enteró de nosotros?</label>
            <input type="checkbox" name="web" id="web"> Web
            <input type="checkbox" name="tv" id="tv"> TV
            <input type="checkbox" name="social" id="social"> Redes Sociales
            <input type="checkbox" name="amigos" id="amigos"> Amigos
        </div>
        <div class="form-group">
            <input type="submit" value="Votar">
        </div>
    </form>
HTML;

include 'plantilla.php';
?>