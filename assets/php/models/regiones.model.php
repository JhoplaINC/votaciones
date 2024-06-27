<?php
require_once 'assets\php\database\conexion.php';

class RegionesModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getRegiones() {
        $sql = "SELECT * FROM regiones";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function getRegionById($id) {
        $sql = "SELECT * FROM regiones WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

$regionesModel = new RegionesModel($conn);
?>