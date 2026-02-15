<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexAir - Tu agencia de viajes</title>
    <link rel="shortcut icon" href="../assets/logo_sinFondo.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/estilos.css">
</head>
<body>
    <header>
        <div class="contenedor-logo">
             <a href="<?php echo (strpos($_SERVER['PHP_SELF'], '/admin/') !== false) ? '../public/index.php' : 'index.php'; ?>">
                 <img class="icono-imagen" src="../assets/logo_sinFondo.png" alt="Logo NexAir">
             </a>
        </div>

        <div class="cabecera-derecha">
            <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
                <span style="color: var(--col-secundario); font-weight: bold;">MODO ADMINISTRADOR</span>
                <a href="logout.php" class="btn-acceso" style="border-color: #e74c3c; background: #e74c3c;">Cerrar Sesión</a>
            <?php else: ?>
                <span>Atención: 900 123 456</span>
                <a href="login.php" class="btn-acceso">Soy Admin</a>
            <?php endif; ?>
        </div>
    </header>