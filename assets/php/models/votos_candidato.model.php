<?php
require_once __DIR__ . '/../database/conexion.php';

class VotosCandidatosModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getVotosByCandidatoId($id) {
        $sql = "SELECT * FROM votos_candidato WHERE candidato_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function createVotoCandidato($candidato_id, $votante_id) {
        $sql = "INSERT INTO votos_candidatos
                (candidato_id, votante_id)
                VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $candidato_id, $votante_id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

$votosCandidatosModel = new VotosCandidatosModel($conn);
?>