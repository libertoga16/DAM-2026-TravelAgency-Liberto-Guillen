<?php

require '../app/clases/conexion.php';

$usuario = new Usuario();
$_SESSION['admin'] = true;
$user = "javier";
$password = "nexair2026"; // La contraseña se encripta automáticamente

if ($usuario->create($user, $password)) {
    echo "<h2>Usuario Admin creado correctamente</h2>";
    echo "<p>Usuario: <strong>$user</strong></p>";
    echo "<p>Contraseña: <strong>$password</strong></p>";
    echo "<p>La contraseña ha sido encriptada con password_hash()</p>";
    echo "<br><a href='../app/public/index.php'>Ir al inicio</a>";
} else {
    echo "<h2>El usuario ya existe o hubo un error</h2>";
    echo "<a href='../app/public/index.php'>Ir al inicio</a>";
}
?>