<?php
require '../clases/conexion.php';

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: ../public/login.php");
    exit;
}

if (isset($_POST['submit'])) {

    $datos = [
        'titulo' => $_POST['titulo'],
        'descripcion' => $_POST['descripcion'],
        'fecha_inicio' => $_POST['fecha_inicio'],
        'fecha_fin' => $_POST['fecha_fin'],
        'precio' => $_POST['precio'],
        'plazas' => $_POST['plazas'],
        'tipo_viaje' => $_POST['tipo_viaje'],
        'destacado' => isset($_POST['destacado']) ? 1 : 0,
        'imagenes' => ''
    ];
    //Comprueba el coorecto paso
    if (isset($_FILES['files']['name']) && $_FILES['files']['name'] != "") {
        //nombre del archivo
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

    $oferta = new Oferta();

    if ($oferta->create($datos)) {
        header("Location: ../public/index.php");
        exit;
    }
}

include '../vistas/header.php';
include '../vistas/nav.php';
?>

<div class="contenedor">

    <div class="cabecera-pagina">
        <h1>Crear Nuevo Viaje</h1>
        <p>Añade una nueva oferta de viaje al catálogo de NexAir</p>
    </div>

    <div class="formulario-tarjeta">
        <form method="POST" action="" enctype="multipart/form-data">

            <div class="grupo-campo">
                <label>Título del Viaje</label>
                <input type="text" name="titulo" placeholder="Ej: París Romántico" required>
            </div>

            <div class="grupo-campo">
                <label>Descripción</label>
                <textarea name="descripcion" rows="4" placeholder="Describe el viaje, qué incluye, lugares a visitar..."></textarea>
            </div>

            <div class="fila-campos">
                <div class="grupo-campo">
                    <label>Fecha Inicio</label>
                    <input type="date" name="fecha_inicio" required>
                </div>
                <div class="grupo-campo">
                    <label>Fecha Fin</label>
                    <input type="date" name="fecha_fin" required>
                </div>
            </div>

            <div class="fila-campos">
                <div class="grupo-campo">
                    <label>Precio (€)</label>
                    <input type="number" step="0.01" name="precio" placeholder="899.00" required>
                </div>
                <div class="grupo-campo">
                    <label>Plazas Disponibles</label>
                    <input type="number" name="plazas" placeholder="50" required>
                </div>
            </div>

            <div class="grupo-campo">
                <label>Tipo de Viaje</label>
                <select name="tipo_viaje">
                    <option value="Cultural">Cultural</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Relax">Relax</option>
                    <option value="Gastronomía">Gastronomía</option>
                    <option value="Naturaleza">Naturaleza</option>
                </select>
            </div>

            <div class="grupo-campo">
                <label>Imagen del Viaje</label>
                <input type="file" name="files" accept="image/*">
            </div>

            <div class="grupo-campo">
                <label>
                    <input type="checkbox" name="destacado" id="destacado"> 
                    Marcar como Destacado
                </label>
            </div>

            <button type="submit" name="submit" class="btn-guardar">Crear Oferta</button>

            <a href="../public/index.php" class="enlace-volver">Cancelar y volver</a>
        </form>
    </div>

</div>

<?php include '../vistas/fotter.php'; ?>