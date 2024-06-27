<?php
require_once __DIR__ . '/../database/conexion.php';
class RegionesComunasModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getComunasByRegionId($id) {
        $sql = "SELECT c.id, c.nombre FROM comunas AS c
                INNER JOIN regiones_comunas AS rc
                ON c.id = rc.comuna_id
                INNER JOIN regiones AS r
                ON rc.region_id = r.id
                WHERE r.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getComunasByRegionNum($num) {
        $sql = "SELECT c.id, c.nombre FROM comunas AS c
                INNER JOIN regiones_comunas AS rc
                ON c.id = rc.comuna_id
                INNER JOIN regiones AS r
                ON rc.region_id = r.id
                WHERE r.numero = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $num);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRegionAndComunaIdByIds($region_id, $comuna_id) {
        $sql = "SELECT rc.id FROM regiones_comunas AS rc
                WHERE rc.region_id = ? AND rc.comuna_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $region_id, $comuna_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

$regionesComunasModel = new RegionesComunasModel($conn);
?>