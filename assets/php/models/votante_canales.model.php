<?php
require_once __DIR__ . '/../database/conexion.php';

class VotanteCanalesModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCanalesVotanteById($id) {
        $sql = "SELECT * FROM votante_canales WHERE votante_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function createVotanteCanal($votante_id, $canal_id) {
        $sql = "INSERT INTO votante_canales
                (votante_id, canal_id)
                VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $votante_id, $canal_id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

$votanteCanalesModel = new VotanteCanalesModel($conn);
?>