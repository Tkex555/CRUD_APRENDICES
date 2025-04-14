<?php

require_once("c://laragon/www/CRUD_APRENDICES/Views/head/footer.php");

require_once __DIR__ . '/../../Database/conexion.php';

date_default_timezone_set('America/Bogota');

$db = new db();
$conexion = $db->conexion();

if ($conexion === null) {
    die("Error de conexión a la base de datos.");
}

$query = "SELECT a.id, p.primer_nombre, p.primer_apellido, p.fecha_nacimiento, f.nombre_programa
          FROM aprendices a
          INNER JOIN personas p ON a.id_persona = p.id
          INNER JOIN programa_formacion f ON a.id_formacion = f.id";

$aprendices = $conexion->query($query);
$contador = 1;
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SENA || Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="text-center">Lista de Aprendices</h1>
                    <table class="table table-sm table-hover table-responsive">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No.</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Programa de Formación</th>
                                <th colspan="3" scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($aprendices && $aprendices->rowCount() > 0) {
                                while ($row = $aprendices->fetch(PDO::FETCH_ASSOC)) {
                                    $id = $row['id'];
                                    $nombre = $row['primer_nombre'] . ' ' . $row['primer_apellido'];
                                    $fecha_nacimiento = $row['fecha_nacimiento'];
                                    $programa_formacion = $row['nombre_programa'];

                                    $edad = "N/D";
                                    if ($fecha_nacimiento) {
                                        $fecha_nacimiento_dt = new DateTime($fecha_nacimiento);
                                        $hoy = new DateTime();
                                        $edad = $hoy->diff($fecha_nacimiento_dt)->y;
                                    }

                                    echo "<tr class='text-center'>";
                                    echo "<th scope='row'>$contador</th>";
                                    echo "<td>$nombre</td>";
                                    echo "<td>$edad años</td>";
                                    echo "<td>$programa_formacion</td>";
                                    echo "<td><a href='ver.php?id=$id' class='btn btn-info btn-sm'>
                                            <i class='fas fa-eye'></i>
                                          </a></td>";
                                    echo "<td><a href='editar.php?id=$id' class='btn btn-warning btn-sm'>
                                            <i class='fas fa-edit'></i>
                                          </a></td>";
                                    echo "<td><a href='aprendizController.php?accion=eliminar&id=$id' class='btn btn-danger btn-sm'>
                                          <i class='fas fa-trash-alt'></i>
                                        </a></td>";
                                    echo "</tr>";

                                    $contador++;
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center'>No hay aprendices registrados.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <div class="text-center mt-4">
                        <a href="../../index.php" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> 
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

require_once("c://laragon/www/CRUD_APRENDICES/Views/head/footer.php");

?>
