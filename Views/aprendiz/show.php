<?php
require_once("../../models/aprendizModel.php");


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $model = new aprendiz();
    
    $aprendiz = $model->obtenerPorId($id);

    if ($aprendiz) {
        echo "<h1>Detalles del Aprendiz</h1>";
        echo "<p><strong>Primer Nombre:</strong> " . $aprendiz['primer_nombre'] . "</p>";
        echo "<p><strong>Segundo Nombre:</strong> " . $aprendiz['segundo_nombre'] . "</p>";
        echo "<p><strong>Primer Apellido:</strong> " . $aprendiz['primer_apellido'] . "</p>";
        echo "<p><strong>Segundo Apellido:</strong> " . $aprendiz['segundo_apellido'] . "</p>";
        echo "<p><strong>Fecha de Nacimiento:</strong> " . $aprendiz['fecha_nacimiento'] . "</p>";
        echo "<p><strong>Documento:</strong> " . $aprendiz['documento'] . "</p>";
        echo "<p><strong>Tipo de Documento:</strong> " . $aprendiz['id_tipo_documento'] . "</p>";
        echo "<p><strong>Sexo:</strong> " . $aprendiz['id_sexo'] . "</p>";
        echo "<p><strong>Grupo Sanguíneo:</strong> " . $aprendiz['id_grupo_sanguineo'] . "</p>";
        echo "<p><strong>Factor Sanguíneo:</strong> " . $aprendiz['id_factor_sanguineo'] . "</p>";
        echo "<p><strong>Formación:</strong> " . $aprendiz['id_formacion'] . "</p>";
    } else {
        echo "<p>No se encontró el aprendiz con el ID especificado.</p>";
    }
} else {
    echo "<p>ID no especificado.</p>";
}
?>
