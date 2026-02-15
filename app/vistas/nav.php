<?php
$base_url = '';
if (strpos($_SERVER['PHP_SELF'], '/admin/') !== false) {
    $base_url = '../public/';
} else {
    $base_url = '';
}
?>
<nav>
    <ul>
        <li><a href="<?php echo $base_url; ?>index.php">Inicio</a></li>
        
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
            <li><a href="<?php echo $base_url; ?>../admin/crear_oferta.php" class="nav-admin">Crear Viaje</a></li>
            <li><a href="<?php echo $base_url; ?>../admin/editar_eliminar.php" class="nav-admin">Gestionar</a></li>
        <?php endif; ?>
        
        <li><a href="<?php echo $base_url; ?>destinos.php">Destinos</a></li>
        <li><a href="<?php echo $base_url; ?>aviso-legal.php">Legal</a></li>
    </ul>
</nav>