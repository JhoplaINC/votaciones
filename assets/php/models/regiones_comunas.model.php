<?php
require_once 'assets\php\database\conexion.php';
class RegionesComunasModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
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
}

$regionesComunasModel = new RegionesComunasModel($conn);
?>