<?php
require '../clases/conexion.php';

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../public/login.php");
    exit;
}

$ofertaModel = new Oferta();

if (!isset($_GET['id'])) {
    header("Location: editar_eliminar.php");
    exit;
}

$id = $_GET['id'];

$viaje = $ofertaModel->getById($id);
if (!$viaje) { 
    header("Location: editar_eliminar.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        'titulo' => $_POST['titulo'],
        'precio' => $_POST['precio'],
        'fecha_inicio' => $_POST['fecha_inicio'],
        'fecha_fin' => $_POST['fecha_fin'],
        'plazas' => $_POST['plazas'],
        'imagenes' => $viaje['imagenes']
    ];

    if (isset($_FILES['files']['name']) && $_FILES['files']['name'] != "") {

        $filename = $_FILES['files']['name'];
        //ruta
        $target_dir = "../assets/uploads/";
        //Limpia la ruta le añade la nuestra
        $target_file = $target_dir . basename($filename);
        //Que sea valida la extension
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "gif");
        //Lo mueve a nuestra ruta
        if (in_array($imageFileType, $extensions_arr)) {
            if (move_uploaded_file($_FILES['files']['tmp_name'], $target_file)) {
                //sube el enlace a la bd
                $datos['imagenes'] = $target_file;
            }
        }
    }

    $ofertaModel->update($id, $datos);

    header("Location: editar_eliminar.php");
    exit;
}


include '../vistas/header.php';
include '../vistas/nav.php';
?>

<div class="contenedor">
    
    <div class="cabecera-pagina">
        <h1>Editar Viaje</h1>
        <p>Modificando: <strong><?php echo htmlspecialchars($viaje['titulo']); ?></strong></p>
    </div>

    <div class="formulario-tarjeta">
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="imagenes" value="<?php echo htmlspecialchars($viaje['imagenes']); ?>">
            <?php if (!empty($viaje['imagenes'])): ?>
                <div class="grupo-campo">
                    <label>Foto actual</label>
                    <br>
                    <img src="<?php echo htmlspecialchars($viaje['imagenes']); ?>" alt="Imagen del viaje" style="max-width:200px;" />
                </div>
            <?php endif; ?>
            
            <div class="grupo-campo">
                <label>Título del Viaje</label>
                <input type="text" name="titulo" value="<?php echo htmlspecialchars($viaje['titulo']); ?>" required>
            </div>
            
            <div class="fila-campos">
                <div class="grupo-campo">
                    <label>Precio (€)</label>
                    <input type="number" step="0.01" name="precio" value="<?php echo $viaje['precio']; ?>" required>
                </div>
                <div class="grupo-campo">
                    <label>Plazas Disponibles</label>
                    <input type="number" name="plazas" value="<?php echo $viaje['plazas']; ?>" required>
                </div>
            </div>

            <div class="fila-campos">
                <div class="grupo-campo">
                    <label>Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" value="<?php echo $viaje['fecha_inicio']; ?>" required>
                </div>
                <div class="grupo-campo">
                    <label>Fecha Fin</label>
                    <input type="date" name="fecha_fin" value="<?php echo $viaje['fecha_fin']; ?>" required>
                </div>
            </div>
              <div class="grupo-campo">
                <label>Imagen del Viaje</label>
                <input type="file" name="files" accept="image/*">
            </div>

            <button type="submit" class="btn-guardar">Guardar Cambios</button>
            
            <a href="editar_eliminar.php" class="enlace-volver">Cancelar y volver</a>
        </form>
    </div>

</div>

<?php include '../vistas/fotter.php'; ?>