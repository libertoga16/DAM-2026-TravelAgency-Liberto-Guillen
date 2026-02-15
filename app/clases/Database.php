<?php
require_once __DIR__ . '/../config.php';

$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
?>
