<?php
class Oferta {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM oferta ORDER BY destacado DESC, id_viaje DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM oferta WHERE id_viaje = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
// el 1=1 explicalo
    public function getAllConFiltros($filtros = []) {
        $sql = "SELECT * FROM oferta WHERE 1=1";
        $params = [];

        if (!empty($filtros['mes'])) {
            $sql .= " AND MONTH(fecha_inicio) = ?";
            $params[] = intval($filtros['mes']);
        }

        if (!empty($filtros['tipo'])) {
            $sql .= " AND tipo_viaje = ?";
            $params[] = $filtros['tipo'];
        }

        $sql .= " ORDER BY destacado DESC, fecha_inicio ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($datos) {
        $sql = "INSERT INTO oferta (titulo, descripcion, fecha_inicio, fecha_fin, precio, plazas, tipo_viaje, imagenes, destacado) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $datos['titulo'],
            $datos['descripcion'],
            $datos['fecha_inicio'],
            $datos['fecha_fin'],
            $datos['precio'],
            $datos['plazas'],
            $datos['tipo_viaje'],
            $datos['imagenes'] ?? '',
            $datos['destacado'] ?? 0
        ]);
    }

    public function update($id, $datos) {
        $sql = "UPDATE oferta SET titulo=?, precio=?, fecha_inicio=?, fecha_fin=?, plazas=?, imagenes=? WHERE id_viaje=?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $datos['titulo'],
            $datos['precio'],
            $datos['fecha_inicio'],
            $datos['fecha_fin'],
            $datos['plazas'],
            $datos['imagenes'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM oferta WHERE id_viaje = ?");
        return $stmt->execute([$id]);
    }
}
?>
