<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Oferta.php';
require_once __DIR__ . '/Usuario.php';
?>