<?php
session_start();
require_once 'assets/php/models/regiones.model.php';
require_once 'assets/php/models/regiones_comunas.model.php';
require_once 'assets/php/models/candidatos.model.php';
require_once 'assets/php/models/canales.model.php';

// Obtener errores de la sesión
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

$regiones = $regionesModel->getRegiones();
$canales = $canalesModel->getCanales();

$title = "Página del formulario";
$content = <<<HTML
    <form action="assets/php/post_form.php" method="POST" class="formulario-votacion">
        <p class="form-title">Formulario de votación</p>

HTML;


$content .= <<<HTML
        <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="fullname" id="fullname" placeholder="Nombre y apellido">
            
HTML;
if (!empty($errors['err_form_nombre'])) {
    $content .=  "<span class='mensaje-error'>".$errors['err_form_nombre']."</span>";
}
$content .= <<<HTML
        </div>
        <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="alias" id="alias" placeholder="Alias">
HTML;
if (!empty($errors['err_form_alias'])) {
    $content .=  "<span class='mensaje-error'>".$errors['err_form_alias']."</span>";
}
$content .= <<<HTML
        </div>
        <div class="form-group">
            <i class="fa-solid fa-id-card"></i>
            <input type="text" name="rut" id="rut" placeholder="Rut">
HTML;
if (!empty($errors['err_form_rut'])) {
    $content .=  "<span class='mensaje-error'>".$errors['err_form_rut']."</span>";
}
$content .= <<<HTML
        </div>
        <div class="form-group">
            <i class="fa-solid fa-at"></i>
            <input type="email" name="email" id="email" placeholder="Email">
HTML;
if (!empty($errors['err_form_email'])) {
    $content .=  "<span class='mensaje-error'>".$errors['err_form_email']."</span>";
}
$content .= <<<HTML
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
HTML;
if (!empty($errors['err_form_region'])) {
    $content .=  "<span class='mensaje-error'>".$errors['err_form_region']."</span>";
}
$content .= <<<HTML
        </div>
        <div class="form-group">
            <i class="fa-solid fa-location-dot"></i>
            <select name="comuna" id="comuna" disabled>
                <option value="default">Seleccione la comuna</option>
            </select>
HTML;
if (!empty($errors['err_form_comuna'])) {
    $content .=  "<span class='mensaje-error'>".$errors['err_form_comuna']."</span>";
}
$content .= <<<HTML
        </div>
        <div class="form-group">
            <i class="fa-solid fa-location-dot"></i>
            <select name="candidato" id="candidato" disabled>
                <option value="default">Seleccione el candidato</option>
            </select>
HTML;
if (!empty($errors['err_form_candidato'])) {
    $content .=  "<span class='mensaje-error'>".$errors['err_form_candidato']."</span>";
}
$content .= <<<HTML
        </div>
        <div class="form-group checkbox-group">
            <i class="fa-solid fa-question"></i>
            <label for="canales">¿Cómo se enteró de nosotros?</label>
            <div class="checkbox-container">
HTML;

foreach ($canales as $canal) {
    $content .= <<<HTML
                <input type="checkbox" name="canales[]" value="canal-{$canal['id']}" id="canal-{$canal['id']}"> {$canal['nombre']}
HTML;
}
if (!empty($errors['err_form_canales'])) {
    $content .=  "<span class='mensaje-error'>".$errors['err_form_canales']."</span>";
}
$content .= <<<HTML
            </div>
        </div>
        <div class="form-group submit-form">
            <input type="submit" value="Votar">
        </div>
    </form>
HTML;

include 'plantilla.php';
?>