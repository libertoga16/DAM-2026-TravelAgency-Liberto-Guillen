<?php 
require '../clases/conexion.php';
include '../vistas/header.php';
include '../vistas/nav.php';
?>

<div class="contenedor">
    
    <div class="cabecera-pagina" style="text-align: center;">
        <h1>Política de Privacidad</h1>
        <p>Protección de datos personales - RGPD</p>
    </div>

    <div class="formulario-tarjeta">
        
        <h2 class="titulo-seccion">1. Responsable del Tratamiento</h2>
        <div style="background: var(--col-fondo); padding: 25px; border-radius: 10px; margin: 20px auto; max-width: 600px; text-align: center;">
            <p style="margin: 8px 0;"><strong>Identidad:</strong> NexAir S.L.</p>
            <p style="margin: 8px 0;"><strong>CIF:</strong> B-78005119K</p>
            <p style="margin: 8px 0;"><strong>Dirección:</strong> Avenida Cervantes nº16, 18008 Granada</p>
            <p style="margin: 8px 0;"><strong>Email DPO:</strong> privacidad@nexair.com</p>
        </div>

        <hr style="margin: 30px 0; border: 0; border-top: 1px solid #eee;">

        <h2 class="titulo-seccion">2. Finalidad del Tratamiento</h2>
        <p style="text-align: center;">En NexAir tratamos la información que nos facilitan las personas interesadas con los siguientes fines:</p>
        <div style="max-width: 600px; margin: 0 auto; text-align: center;">
            <p style="margin: 8px 0;">Gestión de reservas de vuelos y servicios asociados</p>
            <p style="margin: 8px 0;">Envío de comunicaciones comerciales (si ha dado su consentimiento)</p>
            <p style="margin: 8px 0;">Gestión de la cuenta de usuario</p>
            <p style="margin: 8px 0;">Análisis estadísticos y mejora de servicios</p>
            <p style="margin: 8px 0;">Cumplimiento de obligaciones legales</p>
        </div>

        <hr style="margin: 30px 0; border: 0; border-top: 1px solid #eee;">

        <h2 class="titulo-seccion">3. Legitimación</h2>
        <p style="text-align: center;">La base legal para el tratamiento de sus datos es:</p>
        <div style="max-width: 600px; margin: 0 auto; text-align: center;">
            <p style="margin: 8px 0;"><strong>Ejecución de contrato:</strong> para gestionar sus reservas y vuelos</p>
            <p style="margin: 8px 0;"><strong>Consentimiento:</strong> para el envío de comunicaciones comerciales</p>
            <p style="margin: 8px 0;"><strong>Interés legítimo:</strong> para la mejora de nuestros servicios</p>
            <p style="margin: 8px 0;"><strong>Obligación legal:</strong> para el cumplimiento de normativas aeronáuticas</p>
        </div>

        <hr style="margin: 30px 0; border: 0; border-top: 1px solid #eee;">

        <h2 class="titulo-seccion">4. Conservación de Datos</h2>
        <p style="text-align: center;">Los datos personales proporcionados se conservarán:</p>
        <div style="max-width: 600px; margin: 0 auto; text-align: center;">
            <p style="margin: 8px 0;">Mientras se mantenga la relación comercial</p>
            <p style="margin: 8px 0;">Durante los plazos legalmente establecidos para cada tipo de dato</p>
            <p style="margin: 8px 0;">Hasta que solicite su supresión (cuando sea legalmente posible)</p>
        </div>

        <hr style="margin: 30px 0; border: 0; border-top: 1px solid #eee;">

        <h2 class="titulo-seccion">5. Sus Derechos</h2>
        <p style="text-align: center;">Usted tiene derecho a:</p>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 15px; margin: 20px auto; max-width: 800px;">
            <div style="background: #e8f5e9; padding: 20px; border-radius: 8px; text-align: center;">
                <strong>Acceso</strong>
                <p style="font-size: 13px; margin: 8px 0 0 0;">Conocer qué datos tratamos</p>
            </div>
            <div style="background: #e3f2fd; padding: 20px; border-radius: 8px; text-align: center;">
                <strong>Rectificación</strong>
                <p style="font-size: 13px; margin: 8px 0 0 0;">Modificar datos incorrectos</p>
            </div>
            <div style="background: #ffebee; padding: 20px; border-radius: 8px; text-align: center;">
                <strong>Supresión</strong>
                <p style="font-size: 13px; margin: 8px 0 0 0;">Solicitar el borrado</p>
            </div>
            <div style="background: #fff3e0; padding: 20px; border-radius: 8px; text-align: center;">
                <strong>Oposición</strong>
                <p style="font-size: 13px; margin: 8px 0 0 0;">Oponerse al tratamiento</p>
            </div>
        </div>

        <p style="text-align: center;">Para ejercer estos derechos, puede contactar con nosotros en: <strong>privacidad@nexair.com</strong></p>

        <hr style="margin: 30px 0; border: 0; border-top: 1px solid #eee;">

        <h2 class="titulo-seccion">6. Cookies</h2>
        <p style="text-align: center;">Este sitio web utiliza cookies propias y de terceros para mejorar la experiencia del usuario. Puede consultar nuestra política de cookies para más información.</p>

        <div style="background: var(--col-fondo); padding: 20px; border-radius: 8px; margin-top: 20px; text-align: center;">
            <p style="margin: 0; font-size: 14px;"><strong>Última actualización:</strong> <?php echo date("d/m/Y"); ?></p>
        </div>

        <div class="seccion-centrada">
            <a href="index.php" class="enlace-volver">Volver al inicio</a>
        </div>
    </div>

</div>

<?php include '../vistas/fotter.php'; ?>
