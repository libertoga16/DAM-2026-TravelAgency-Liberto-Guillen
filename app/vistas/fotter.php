<?php
$base_pie = '';
if (strpos($_SERVER['PHP_SELF'], '/admin/') !== false) {
    $base_pie = '../public/';
} else {
    $base_pie = '';
}
?>
<footer>
    <div class="pie-contenido">
        
        <div class="pie-seccion">
            <h3>NexAir Airlines</h3>
            <p>Conectando horizontes desde 2024. Tu compañía de confianza para volar a cualquier destino.</p>
            <p>&copy; <?php echo date("Y"); ?> Todos los derechos reservados.</p>
        </div>

        <div class="pie-seccion">
            <h4>Contacto</h4>
            <ul class="pie-lista">
                <li>Tel: 900 123 456</li>
                <li>Email: info@nexair.com</li>
                <li>Dirección: Avenida Cervantes 16, Granada</li>
            </ul>
        </div>

        <div class="pie-seccion">
            <h4>Legal</h4>
            <ul class="pie-lista">
                <li><a href="<?php echo $base_pie; ?>aviso-legal.php" class="pie-enlace">Aviso Legal</a></li>
                <li><a href="<?php echo $base_pie; ?>terminos.php" class="pie-enlace">Términos y Condiciones</a></li>
                <li><a href="<?php echo $base_pie; ?>privacidad.php" class="pie-enlace">Política de Privacidad</a></li>
            </ul>
        </div>

    </div>
</footer>
</body>
</html>