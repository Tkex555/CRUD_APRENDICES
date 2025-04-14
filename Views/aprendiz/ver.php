<?php
require_once("c://laragon/www/CRUD_APRENDICES/Views/head/head.php");
require_once("c://laragon/www/CRUD_APRENDICES/Database/conexion.php");

$db = new db();
$conexion = $db->conexion();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT 
                p.primer_nombre,
                p.segundo_nombre,
                p.primer_apellido,
                p.segundo_apellido,
                p.documento,
                td.tipo_documento,
                s.sexo,
                gs.tipo_grupo,
                fs.tipo_factor,
                p.fecha_nacimiento,
                pf.nombre_programa
            FROM aprendices a
            INNER JOIN personas p ON a.id_persona = p.id
            INNER JOIN tipo_documento td ON p.id_tipo_documento = td.id
            INNER JOIN sexo s ON p.id_sexo = s.id
            INNER JOIN grupo_sanguineo gs ON p.id_grupo_sanguineo = gs.id
            INNER JOIN factor_sanguineo fs ON p.id_factor_sanguineo = fs.id
            INNER JOIN programa_formacion pf ON a.id_formacion = pf.id
            WHERE a.id = :id";

    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $aprendiz = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<div class="container my-4">
    <h2 class="text-center mb-4">Información del Aprendiz</h2>
    <?php if ($aprendiz): ?>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <!-- Contenedor para mostrar la información del aprendiz -->
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Primer Nombre:</strong>
                        <span><?= $aprendiz['primer_nombre'] ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Segundo Nombre:</strong>
                        <span><?= $aprendiz['segundo_nombre'] ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Primer Apellido:</strong>
                        <span><?= $aprendiz['primer_apellido'] ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Segundo Apellido:</strong>
                        <span><?= $aprendiz['segundo_apellido'] ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Documento:</strong>
                        <span><?= $aprendiz['tipo_documento'] . ' - ' . $aprendiz['documento'] ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Sexo:</strong>
                        <span><?= $aprendiz['sexo'] ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Grupo Sanguíneo:</strong>
                        <span><?= $aprendiz['tipo_grupo'] . ' ' . $aprendiz['tipo_factor'] ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Fecha de Nacimiento:</strong>
                        <span><?= $aprendiz['fecha_nacimiento'] ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Programa de Formación:</strong>
                        <span><?= $aprendiz['nombre_programa'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">No se encontró información del aprendiz.</div>
    <?php endif; ?>
</div>

<?php
require_once("c://laragon/www/CRUD_APRENDICES/Views/head/footer.php");
?>
