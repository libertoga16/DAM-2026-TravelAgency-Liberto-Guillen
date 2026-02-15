<?php 
require '../clases/conexion.php';
include '../vistas/header.php';
include '../vistas/nav.php';

$oferta = new Oferta();
$viajes = $oferta->getAll();
?>

<div class="contenedor">
    
    <div class="seccion-presentacion">
        <h1>Nuestros <span class="resaltado">Destinos</span></h1>
        <p>Explora todos los destinos disponibles con NexAir. Aventura, cultura o relax, tú eliges.</p>
    </div>

    <?php if(empty($viajes)): ?>
        <div class="estado-vacio">
            <h2>No hay destinos disponibles</h2>
            <p>Pronto añadiremos nuevos viajes increíbles.</p>
            <a href="index.php" class="btn-principal">Volver al inicio</a>
        </div>
    <?php else: ?>
        
        <div class="cuadricula-ofertas">
            <?php foreach ($viajes as $viaje): ?>
                <div class="tarjeta-contenedor">
                    <?php if($viaje['destacado']): ?>
                        <span class="tarjeta-insignia">Destacado</span>
                    <?php endif; ?>
                    <div class="tarjeta">
                        <?php 
                            $img = !empty($viaje['imagenes']) ? $viaje['imagenes'] : '../assets/uploads/default.jpg'; 
                        ?>
                        <img src="<?php echo htmlspecialchars($img); ?>" class="tarjeta-img" alt="<?php echo htmlspecialchars($viaje['titulo']); ?>">
                        
                        <div class="tarjeta-cuerpo">
                            <span class="etiqueta-tipo"><?php echo htmlspecialchars($viaje['tipo_viaje']); ?></span>
                            <h3 class="tarjeta-titulo"><?php echo htmlspecialchars($viaje['titulo']); ?></h3>
                            <p class="tarjeta-desc">
                                <?php echo htmlspecialchars(substr($viaje['descripcion'], 0, 100)) . '...'; ?>
                            </p>
                            <p class="tarjeta-fecha">
                                <?php echo date("d M", strtotime($viaje['fecha_inicio'])); ?> - <?php echo date("d M Y", strtotime($viaje['fecha_fin'])); ?>
                            </p>
                            <p class="info-plazas">
                                <?php echo $viaje['plazas']; ?> plazas disponibles
                            </p>
                            <span class="tarjeta-precio"><?php echo number_format($viaje['precio'], 0); ?> €</span>
                            <a href="detalle_viaje.php?id=<?php echo $viaje['id_viaje']; ?>" class="tarjeta-btn">Reservar Ahora</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

    <div class="seccion-centrada">
        <a href="index.php" class="enlace-volver">Volver al inicio con filtros</a>
    </div>

</div>

<?php include '../vistas/fotter.php'; ?>
