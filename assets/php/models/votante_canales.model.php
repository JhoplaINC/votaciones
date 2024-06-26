<?php
require_once 'assets\php\database\conexion.php';

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
}

$votanteCanalesModel = new VotanteCanalesModel($conn);
?>