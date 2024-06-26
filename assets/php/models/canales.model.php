<?php
require_once 'conexion.php';

class CanalesModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCanalById($id) {
        $sql = "SELECT * FROM canales WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

$canalesModel = new CanalesModel($conn);
?>