<?php
include 'Database/conexion.php'; // Archivo de conexión
require_once 'Controllers/aprendizController.php'; // Controlador

// Establecer la zona horaria de Colombia (UTC-5)
date_default_timezone_set('America/Bogota');

$aprendizController = new aprendiz($conexion);
$aprendices = $aprendizController->obtenerAprendices();

$contador = 1;
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SENA || Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="text-center">Lista de Aprendices</h1>
                    <div class="text-center mb-3">
                        <a href="crear.php" class="btn btn-sm btn-primary">Crear Aprendiz</a>
                    </div>

                    <table class="table table-sm table-hover table-responsive">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">No.</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Edad</th>
                                <th colspan="3" scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($aprendices && mysqli_num_rows($aprendices) > 0) {
                                while ($row = mysqli_fetch_assoc($aprendices)) {
                                    $id = $row['id_aprendiz'];
                                    $nombre = $row['primer_nombre'] . ' ' . $row['segundo_nombre'] . ' ' . $row['primer_apellido'] . ' ' . $row['segundo_apellido'];
                                    $fecha_nacimiento = $row['fecha_nacimiento'] ?? null;

                                    // Validar y calcular edad
                                    if ($fecha_nacimiento) {
                                        $obj = new DateTime($fecha_nacimiento);
                                        $hoy = new DateTime();
                                        $edad = $hoy->diff($obj)->y;
                                    } else {
                                        $edad = "N/D";
                                    }

                                    echo "<tr class='text-center'>";
                                    echo "<th scope='row'>$contador</th>";
                                    echo "<td>$nombre</td>";
                                    echo "<td>$edad años</td>";
                                    echo "<td><a href='ver.php?id=$id' class='btn btn-info btn-sm'>Ver</a></td>";
                                    echo "<td><a href='editar.php?id=$id' class='btn btn-warning btn-sm'>Editar</a></td>";
                                    echo "<td><a href='delete.php?id=$id' class='btn btn-danger btn-sm'>Eliminar</a></td>";
                                    echo "</tr>";

                                    $contador++;
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center'>No hay aprendices registrados.</td></tr>";
                            }

                            mysqli_close($conexion);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
