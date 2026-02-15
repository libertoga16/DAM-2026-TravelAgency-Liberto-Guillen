<?php
require '../clases/conexion.php';

$id = $_GET['id'];

if ($id <= 0) {
    header("Location: index.php");
    exit;
}

$oferta = new Oferta();
$viaje = $oferta->getById($id);

if (!$viaje) {
    header("Location: index.php");
    exit;
}

include '../vistas/header.php';
include '../vistas/nav.php';
?>

<div class="contenedor">

    <div class="migas-pan">
        <a href="index.php">Volver a ofertas</a>
    </div>

    <div class="detalle-viaje">
        <div class="detalle-cuadricula">

            <div class="detalle-imagen">
                <?php
                $img = !empty($viaje['imagenes']) ? $viaje['imagenes'] : '../assets/uploads/default.jpg';
                ?>
                <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($viaje['titulo']); ?>">
                <?php if ($viaje['destacado']): ?>
                    <span class="insignia-destacado">Oferta Destacada</span>
                <?php endif; ?>
            </div>

            <div class="detalle-info">
                <span class="etiqueta-tipo"><?php echo htmlspecialchars($viaje['tipo_viaje']); ?></span>

                <h1><?php echo htmlspecialchars($viaje['titulo']); ?></h1>

                

                <div class="info-rapida">
                    <div class="info-item">
                        <span class="info-etiqueta">Fechas:</span>
                        <span><?php echo date("d/m/Y", strtotime($viaje['fecha_inicio'])); ?> - <?php echo date("d/m/Y", strtotime($viaje['fecha_fin'])); ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-etiqueta">Plazas:</span>
                        <span><?php echo $viaje['plazas']; ?> disponibles</span>
                    </div>
                    <div class="info-item">
                        <span class="info-etiqueta">ID Viaje:</span>
                        <span>#<?php echo $viaje['id_viaje']; ?></span>
                    </div>
                    <div class="info-item">  
                        <span class="info-etiqueta"><?php echo number_format($viaje['precio'], 0); ?> €</span>
                       
                    </div>
                </div>

                <div class="detalle-descripcion">
                    <h3>Descripción del Viaje</h3>
                    <p><?php echo nl2br(htmlspecialchars($viaje['descripcion'])); ?></p>
                </div>

                <?php if (!empty($viaje['itinerario'])): ?>
                    <div class="detalle-itinerario">
                        <h3>Itinerario</h3>
                        <p><?php echo nl2br(htmlspecialchars($viaje['itinerario'])); ?></p>
                    </div>
                <?php endif; ?>

                <div class="detalle-acciones">
                    <a href="index.php" class="btn-secundario">Seguir explorando</a>
                    <button class="btn-reservar" onclick="alert('Reserva recibida! Nos pondremos en contacto contigo pronto.')">
                        Reservar Ahora
                    </button>
                </div>

            </div>
        </div>
    </div>

</div>

<?php include '../vistas/fotter.php'; ?>
