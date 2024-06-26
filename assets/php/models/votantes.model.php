<?php
require_once 'assets\php\database\conexion.php';

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
}

$votantesModel = new VotantesModel($conn);
?>