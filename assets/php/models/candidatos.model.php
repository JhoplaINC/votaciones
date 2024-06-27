<?php
require_once __DIR__ . '/../database/conexion.php';

class CandidatosModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCandidatoByRegionNum($num) {
        $sql = "SELECT c.id, c.nombre_completo FROM candidatos AS c
                INNER JOIN regiones AS r
                ON c.region_id = r.id
                WHERE r.numero = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $num);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

$candidatosModel = new CandidatosModel($conn);
?>