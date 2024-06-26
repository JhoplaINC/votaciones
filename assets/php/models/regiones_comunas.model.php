<?php
require_once 'conexion.php';

class RegionComunaModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getComunasByRegionId($id) {
        $sql = "SELECT * FROM regiones_comunas WHERE region_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

$regionComunaModel = new RegionComunaModel($conn);
?>