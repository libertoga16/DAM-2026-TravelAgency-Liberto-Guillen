<?php 
require '../clases/conexion.php';

$oferta = new Oferta();

$filtros = [
    'mes' => $_GET['mes'] ?? '',
    'continente' => $_GET['continente'] ?? '',
    'tipo' => $_GET['tipo'] ?? ''
];

$ofertas = $oferta->getAllConFiltros($filtros);

include '../vistas/header.php';
include '../vistas/nav.php';
?>

<div class="contenedor">
    
    <div class="seccion-presentacion">
        <h1>El mundo, más cerca <br>con <span class="resaltado">NexAir</span></h1>
        <p>Descubre destinos increíbles. Selecciona tus filtros y encuentra tu próxima aventura.</p>
    </div>

    <div class="buscador-filtros">
        <h3>Encuentra tu viaje ideal</h3>
        
        <div class="seccion-filtro">
            <span class="etiqueta-filtro">Fecha de viaje</span>
            <div class="botones-filtro">
                <?php
                $meses = [
                    '01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', 
                    '04' => 'Abril', '05' => 'Mayo', '06' => 'Junio',
                    '07' => 'Julio', '08' => 'Agosto', '09' => 'Septiembre',
                    '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'
                ];
                foreach ($meses as $num => $nombre): 
                    $claseActiva = ($filtros['mes'] === $num) ? 'activo' : '';
                ?>
                    <a href="?mes=<?php echo $num; ?>&continente=<?php echo $filtros['continente']; ?>&tipo=<?php echo $filtros['tipo']; ?>" 
                       class="btn-filtro <?php echo $claseActiva; ?>"><?php echo $nombre; ?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="seccion-filtro">
            <span class="etiqueta-filtro">Continente</span>
            <div class="botones-filtro">
                <?php
                $continentes = ['Europa', 'Asia', 'América', 'África', 'Oceanía'];
                foreach ($continentes as $cont): 
                    $claseActiva = ($filtros['continente'] === $cont) ? 'activo' : '';
                ?>
                    <a href="?mes=<?php echo $filtros['mes']; ?>&continente=<?php echo $cont; ?>&tipo=<?php echo $filtros['tipo']; ?>" 
                       class="btn-filtro <?php echo $claseActiva; ?>"><?php echo $cont; ?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="seccion-filtro">
            <span class="etiqueta-filtro">Tipo de viaje</span>
            <div class="botones-filtro">
                <?php
                $tipos = ['Cultural', 'Aventura', 'Relax', 'Gastronomía', 'Naturaleza'];
                foreach ($tipos as $tipo): 
                    $claseActiva = ($filtros['tipo'] === $tipo) ? 'activo' : '';
                ?>
                    <a href="?mes=<?php echo $filtros['mes']; ?>&continente=<?php echo $filtros['continente']; ?>&tipo=<?php echo $tipo; ?>" 
                       class="btn-filtro <?php echo $claseActiva; ?>"><?php echo $tipo; ?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if(!empty($filtros['mes']) || !empty($filtros['continente']) || !empty($filtros['tipo'])): ?>
        <div class="seccion-filtro">
            <a href="index.php" class="btn-limpiar">Limpiar todos los filtros</a>
        </div>
        <?php endif; ?>
    </div>

    <h2 class="titulo-seccion">
        <?php echo empty($ofertas) ? 'No se encontraron vuelos' : 'Vuelos Disponibles (' . count($ofertas) . ')'; ?>
    </h2>

    <div class="cuadricula-ofertas">
        <?php foreach ($ofertas as $viaje): ?>
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
                        <h3 class="tarjeta-titulo"><?php echo htmlspecialchars($viaje['titulo']); ?></h3>
                        <p class="tarjeta-desc">
                            <?php echo htmlspecialchars(substr($viaje['descripcion'], 0, 80)) . '...'; ?>
                        </p>
                        <p class="tarjeta-fecha">
                            <?php echo date("d M", strtotime($viaje['fecha_inicio'])); ?> - <?php echo date("d M Y", strtotime($viaje['fecha_fin'])); ?>
                        </p>
                        <span class="tarjeta-precio"><?php echo number_format($viaje['precio'], 0); ?> €</span>
                        <a href="detalle_viaje.php?id=<?php echo $viaje['id_viaje']; ?>" class="tarjeta-btn">Ver Detalles</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?php include '../vistas/fotter.php'; ?>