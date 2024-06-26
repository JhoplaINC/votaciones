<?php
require_once 'conexion.php';

class CandidatoModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCandidatoById($id) {
        $sql = "SELECT * FROM candidatos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

$candidatoModel = new CandidatoModel($conn);
?>