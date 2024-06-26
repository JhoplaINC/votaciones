<?php
require_once 'assets/php/models/regiones_comunas.model.php';

if (isset($_GET['id'])) {
    $regionNum = $_GET['id'];

    $regionesComunasModel = new RegionesComunasModel($conn); 

    $comunas = $regionesComunasModel->getComunasByRegionNum($regionNum);

    header('Content-Type: application/json');
    echo json_encode($comunas);
    exit;
} else {
    http_response_code(400); 
    echo json_encode(array('error' => 'No se proporcionó un ID de región válido.'));
    exit;
}
?>