<?php
require_once 'assets/php/models/candidatos.model.php';

if (isset($_GET['id'])) {
    $num = $_GET['id'];

    $candidatosModel = new CandidatosModel($conn); 

    $candidatos = $candidatosModel->getCandidatoByRegionNum($num);

    header('Content-Type: application/json');
    echo json_encode($candidatos);
    exit;
} else {
    http_response_code(400); 
    echo json_encode(array('error' => 'No se proporcionó un ID de región válido.'));
    exit;
}
?>