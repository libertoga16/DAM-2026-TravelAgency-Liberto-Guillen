<?php
require '../clases/conexion.php';

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../public/login.php");
    exit;
}

$oferta = new Oferta();

if (isset($_GET['borrar'])) {
    $id = $_GET['borrar'];
    $oferta->delete($id);
    header("Location: editar_eliminar.php");
    exit;
}

$viajes = $oferta->getAll();

include '../vistas/header.php';
include '../vistas/nav.php';
?>

<div class="contenedor">
    
    <div class="cabecera-pagina">
        <h1>Gestionar Viajes</h1>
        <p>Edita o elimina las ofertas existentes del catálogo</p>
    </div>

    <div class="barra-superior">
        <span class="barra-info">Total: <strong><?php echo count($viajes); ?></strong> viajes</span>
        <a href="crear_oferta.php" class="btn-nuevo">+ Crear Nuevo Viaje</a>
    </div>

    <table class="tabla-admin">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Título</th>
                <th>Fechas</th>
                <th>Precio</th>
                <th>Plazas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($viajes)): ?>
                <tr>
                    <td colspan="7" class="tabla-vacia">
                        No hay viajes registrados. <a href="crear_oferta.php">Crea uno nuevo</a>
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($viajes as $viaje): ?>
                <tr>
                    <td><strong>#<?php echo $viaje['id_viaje']; ?></strong></td>
                    <td>
                        <?php 
                            $img = !empty($viaje['imagenes']) ? $viaje['imagenes'] : '../assets/uploads/default.jpg'; 
                        ?>
                        <img src="<?php echo htmlspecialchars($img); ?>" alt="" class="tabla-img">
                    </td>
                    <td>
                        <strong><?php echo htmlspecialchars($viaje['titulo']); ?></strong><br>
                        <small class="texto-gris"><?php echo htmlspecialchars($viaje['tipo_viaje']); ?></small>
                        <?php if($viaje['destacado']): ?>
                            <span class="icono-destacado">*</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo date("d/m/Y", strtotime($viaje['fecha_inicio'])); ?><br>
                        <small>a <?php echo date("d/m/Y", strtotime($viaje['fecha_fin'])); ?></small>
                    </td>
                    <td><strong><?php echo number_format($viaje['precio'], 0); ?> €</strong></td>
                    <td><?php echo $viaje['plazas']; ?></td>
                    <td class="acciones">
<!--                        En el navegador borrar=32-->
                        <a href="editar_oferta.php?id=<?php echo $viaje['id_viaje']; ?>" class="btn-editar">Editar</a>
                        
                        <a href="editar_eliminar.php?borrar=<?php echo $viaje['id_viaje']; ?>" 
                           class="btn-eliminar" 
                           onclick="return confirm('¿Estás seguro de eliminar este viaje?');">
                           Borrar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="../public/index.php" class="enlace-volver">Volver al inicio</a>

</div>

<?php include '../vistas/fotter.php'; ?>