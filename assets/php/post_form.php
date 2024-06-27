<?php
require_once 'models\votantes.model.php';
require_once 'models\votante_canales.model.php';
require_once 'models\votos_candidato.model.php';
require_once 'models\regiones_comunas.model.php';

session_start();

function validarRut($rut) {
    $rut = str_replace(['.', '-'], '', $rut);

    if (strlen($rut) < 2) {
        return false;
    }

    $numero = substr($rut, 0, -1);
    $dv = substr($rut, -1);

    if (!is_numeric($numero)) {
        return false;
    }

    $numero = (int) $numero;
    $dv = strtoupper($dv);

    $multiplicador = 2;
    $suma = 0;

    while ($numero > 0) {
        $suma += ($numero % 10) * $multiplicador;
        $numero = floor($numero / 10);
        $multiplicador = $multiplicador == 7 ? 2 : $multiplicador + 1;
    }

    $residuo = 11 - ($suma % 11);

    if ($residuo == 11) {
        $residuo = 0;
    } elseif ($residuo == 10) {
        $residuo = 'K';
    }

    return $dv == $residuo;
}

function separarRutDv($rut) {
    $rut = str_replace(['-'], '', $rut);

    if (strlen($rut) < 2) {
        return false;
    }

    $numero = substr($rut, 0, -1);
    $dv = substr($rut, -1);

    return ['numero' => $numero, 'dv' => $dv];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    
    $fullname = trim($_POST['fullname'] ?? '');
    if (empty($fullname)) {
        $errors['err_form_nombre'] = "El nombre completo es obligatorio.";
    }
    
    $alias = trim($_POST['alias'] ?? '');
    if (empty($alias)) {
        $errors['err_form_alias'] = "El alias es obligatorio.";
    } elseif (!preg_match('/^[a-zA-Z0-9]{5,}$/', $alias)) {
        $errors['err_form_alias'] = "El alias debe tener al menos 5 caracteres y contener solo letras y números.";
    }
    
    $rut = trim($_POST['rut'] ?? '');
    if (empty($rut)) {
        $errors['err_form_rut'] = "El RUT es obligatorio.";
    } elseif (!validarRut($rut)) {
        $errors['err_form_rut'] = "El RUT no es válido.";
    }
    
    $email = trim($_POST['email'] ?? '');
    if (empty($email)) {
        $errors['err_form_email'] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['err_form_email'] = "El correo electrónico no es válido.";
    }
    
    $region = $_POST['region'] ?? '';
    if ($region == 'default' || empty($region)) {
        $errors['err_form_region'] = "Debe seleccionar una región.";
    }
    
    $comuna = $_POST['comuna'] ?? '';
    if ($comuna == 'default' || empty($comuna)) {
        $errors['err_form_comuna'] = "Debe seleccionar una comuna.";
    }
    
    $candidato = $_POST['candidato'] ?? '';
    if ($candidato == 'default' || empty($candidato)) {
        $errors['err_form_candidato'] = "Debe seleccionar un candidato.";
    }

    $canales = $_POST['canales'] ?? [];
    if (count($canales) < 2) {
        $errors['err_form_canales'] = "Debe seleccionar al menos dos opciones de cómo se enteró de nosotros.";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: ./../../form.php');
        exit();
    }

    $resRut = separarRutDv($_POST['rut']);
    
    $regionComunaId = $regionesComunasModel->getRegionAndComunaIdByIds($_POST['region'], $_POST['comuna']);

    $values = [
        'fullname' => $_POST['fullname'],
        'alias' => $_POST['alias'],
        'numero' => $resRut['numero'],
        'dv' => $resRut['dv'],
        'email' => $_POST['email'],
        'id' => $regionComunaId['id']
    ];

    $votante_id = $votantesModel->createVotante($values);
    
    if($votante_id['error']) {
        $errors['err_form_email'] = "El email que se intentó registrar, ya existe. Por lo que el voto no se registrará";
        $_SESSION['errors'] = $errors;
        header('Location: ./../../form.php');
        exit();
    } else {
        if ($votante_id !== false) {
            if (isset($_POST['canales']) && is_array($_POST['canales'])) {
                foreach ($_POST['canales'] as $canal) {
                    $canal_id = substr($canal, strpos($canal, '-') + 1);
                    
                    if (!$votanteCanalesModel->createVotanteCanal($votante_id, $canal_id)) {
                        echo "Error al asignar canal al votante";
                        break;
                    }
                }
            }

            $votosCandidatosModel->createVotoCandidato($_POST['candidato'], $votante_id);

            $_SESSION['success'] = "El votante junto a su voto, fueron registrados exitosamente!";
            header('Location: ./../../form.php');
            exit();
        } else {
            echo "Error al crear el votante.";
        }
    }
} else {
    echo "Método no permitido.";
}
?>