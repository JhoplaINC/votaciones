<?php
session_start();

function validarRut($rut) {
    // Eliminar puntos y guiones
    $rut = str_replace(['.', '-'], '', $rut);

    // Separar número y dígito verificador
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    
    // Validaciones
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

    // Si hay errores, redirigir de vuelta al formulario con los errores en la sesión
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: ./../../form.php');
        exit();
    }
    
    // Procesar los datos (guardar en la base de datos, etc.)
    echo $_POST['fullname'];
    echo $_POST['alias'];
    echo $_POST['rut'];
    echo $_POST['email'];
    echo $_POST['region'];
    echo $_POST['comuna'];
    echo $_POST['candidato'];
    print_r($_POST['canales']);
} else {
    echo "Método no permitido.";
}
?>