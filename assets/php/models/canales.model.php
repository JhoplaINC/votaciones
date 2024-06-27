<?php
require_once __DIR__ . '/../database/conexion.php';

class CanalesModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCanales() {
        $sql = "SELECT * FROM canales";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

$canalesModel = new CanalesModel($conn);
?>