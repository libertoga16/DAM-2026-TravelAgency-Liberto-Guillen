<?php
require '../clases/conexion.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['usuario'];
    $pass = $_POST['password'];

    $usuario = new Usuario();
    $usuario_db = $usuario->verificarLogin($user, $pass);

    if ($usuario_db) {      
        $_SESSION['admin'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso Admin | NexAir</title>
    <link rel="shortcut icon" href="../assets/logo_sinFondo.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/estilos.css">
</head>
<body>
    <div class="contenedor login-contenedor">
        <h2 class="login-titulo">Acceso Admin | NexAir</h2>
        
        <?php if($error): ?>
            <p class="login-error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST" class="login-formulario">
            <div class="grupo-campo">
                <label>Usuario</label>
                <input type="text" name="usuario" required>
            </div>
            <div class="grupo-campo">
                <label>Contraseña</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn-guardar">Entrar</button>
        </form>
        <p class="login-enlace"><a href="index.php">Volver al inicio</a></p>
    </div>
</body>
</html>