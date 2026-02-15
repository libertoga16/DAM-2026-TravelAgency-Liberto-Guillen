<?php
class Usuario {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }
//Explica como se haria con singelton para sumar puntos

    public function getByUsuario($usuario) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($usuario, $password) {
        if ($this->getByUsuario($usuario)) {
            return false;
        }
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
        return $stmt->execute([$usuario, $passwordHash]);
    }

    public function verificarLogin($usuario, $password): array|false {
        $usuario_db = $this->getByUsuario($usuario);
        //True y hash
        if ($usuario_db && password_verify($password, $usuario_db['password'])) {
            return $usuario_db;
        }
        return false;
    }
}
?>
