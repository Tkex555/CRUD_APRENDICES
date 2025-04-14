<?php
require_once("c://laragon/www/CRUD_APRENDICES/Views/head/head.php");
require_once("c://laragon/www/CRUD_APRENDICES/Database/conexion.php");

$db = new db();
$conexion = $db->conexion();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT 
                p.id, p.primer_nombre, p.segundo_nombre, p.primer_apellido, p.segundo_apellido, 
                p.documento, td.tipo_documento, s.sexo, p.id_sexo, p.id_tipo_documento
            FROM personas p
            INNER JOIN aprendices a ON a.id_persona = p.id
            LEFT JOIN tipo_documento td ON p.id_tipo_documento = td.id
            LEFT JOIN sexo s ON p.id_sexo = s.id
            WHERE a.id = :id";

    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $aprendiz = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<h1 class="text-center mb-4">Actualizar Aprendiz</h1>

<form action="/CRUD_APRENDICES/controllers/aprendizController.php?accion=actualizar" method="post" class="col-md-6 mx-auto">

    <input type="hidden" name="id" value="<?php echo $aprendiz['id']; ?>">

    <div class="mb-3">
        <label for="primer_nombre" class="form-label">Primer Nombre</label>
        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" value="<?php echo $aprendiz['primer_nombre']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
        <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" value="<?php echo $aprendiz['segundo_nombre']; ?>">
    </div>

    <div class="mb-3">
        <label for="primer_apellido" class="form-label">Primer Apellido</label>
        <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" value="<?php echo $aprendiz['primer_apellido']; ?>" required>
    </div>

    <div class="mb-3">
        <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
        <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" value="<?php echo $aprendiz['segundo_apellido']; ?>">
    </div>

    <div class="mb-3">
        <label for="tipo_documento" class="form-label">Tipo de Documento</label>
        <select class="form-select" id="tipo_documento" name="tipo_documento" required>
            <option value="1" <?php echo $aprendiz['id_tipo_documento'] == 1 ? 'selected' : ''; ?>>Cédula de Ciudadanía</option>
            <option value="2" <?php echo $aprendiz['id_tipo_documento'] == 2 ? 'selected' : ''; ?>>Tarjeta de Identidad</option>
            <option value="3" <?php echo $aprendiz['id_tipo_documento'] == 3 ? 'selected' : ''; ?>>Cédula de Extranjería</option>
            <option value="4" <?php echo $aprendiz['id_tipo_documento'] == 4 ? 'selected' : ''; ?>>Pasaporte</option>
            <option value="5" <?php echo $aprendiz['id_tipo_documento'] == 5 ? 'selected' : ''; ?>>Registro Civil</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="sexo" class="form-label">Sexo</label>
        <select class="form-select" id="sexo" name="sexo" required>
            <option value="1" <?php echo $aprendiz['id_sexo'] == 1 ? 'selected' : ''; ?>>Masculino</option>
            <option value="2" <?php echo $aprendiz['id_sexo'] == 2 ? 'selected' : ''; ?>>Femenino</option>
            <option value="3" <?php echo $aprendiz['id_sexo'] == 3 ? 'selected' : ''; ?>>Otro</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

<?php if (isset($_GET['success'])): ?>
<script>
    Swal.fire({
        icon: '<?php echo $_GET['success'] == 'true' ? 'success' : 'error'; ?>',
        title: '<?php echo $_GET['success'] == 'true' ? 'Éxito' : 'Error'; ?>',
        text: '<?php echo $_GET['success'] == 'true' ? 'Aprendiz actualizado correctamente.' : 'No se pudo actualizar el aprendiz.'; ?>',
        confirmButtonText: 'Aceptar'
    });
</script>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.0/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
