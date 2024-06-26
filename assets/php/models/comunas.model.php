<?php
require_once 'assets\php\database\conexion.php';

class ComunasModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllComunas() {
        $sql = "SELECT * FROM comunas";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function getComunaById($id) {
        $sql = "SELECT * FROM comunas WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

$comunasModel = new ComunasModel($conn);
?>