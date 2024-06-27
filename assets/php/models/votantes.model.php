<?php
require_once __DIR__ . '/../database/conexion.php';

class VotantesModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getVotanteById($id) {
        $sql = "SELECT * FROM votantes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function createVotante($values) {
        try {
            $sql = "INSERT INTO votantes
                    (nombre_completo, alias, rut, dv, email, region_comuna_id)
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssssi", 
                            $values['fullname'], 
                            $values['alias'], 
                            $values['numero'], 
                            $values['dv'], 
                            $values['email'], 
                            $values['id']);
            $stmt->execute();
            return $stmt->insert_id;
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() === 1062) {
                // Analizar el mensaje de error para identificar el campo duplicado
                $errorMessage = $e->getMessage();
                if (strpos($errorMessage, 'for key \'votantes.rut\'') !== false) {
                    return ['error' => 'duplicate_email'];
                } else if (strpos($errorMessage, 'for key \'votantes.email\'') !== false) {
                    return ['error' => 'duplicate_rut'];
                } else {
                    return ['error' => 'duplicate_entry'];
                }
            } else {
                return ['error' => $e->getCode()];
            }
        }
    }
}

$votantesModel = new VotantesModel($conn);
?>