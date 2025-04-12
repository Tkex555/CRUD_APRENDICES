<?php

require_once("c://laragon/www/CRUD_APRENDICES/Views/head/head.php");

?>


<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SENA || Edit </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1>Agregar Aprendiz</h1>
                    <form action="/Controllers/aprendizController.php" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Primer Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Segundo Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="">
                        </div>
                        <div class="mb-3">
                            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="">
                        </div>
                        <div>
                            <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                            <select class="form-select" id="tipo_documento" name="tipo_documento" required>
                                <option value="CC">Cédula de Ciudadanía</option>
                                <option value="TI">Tarjeta de Identidad</option>
                                <option value="CE">Cédula de Extranjería</option>
                                <option value="PA">Pasaporte</option>
                                <option value="RC">Registro Civil</option>
                            </select>
                        </div>
                        <div>
                            <label for="documento" class="form-label">N° de Documento</label>
                            <input type="int" class="form-control" id="documento" name="documento" value="" required>
                        </div>
                        <div>
                            <label for="sexo" class="form-label">Sexo</label>
                            <select class="form-select" id="sexo" name="sexo" required>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="O">Otro</option>
                            </select>
                        </div>
                        <div>
                            <label for="grupo_sanguineo" class="form-label">Grupo Sanguíneo</label>
                            <select class="form-select" id="grupo_sanguineo" name="grupo_sanguineo">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option> 
                            </select>
                        </div>
                        <div>
                            <label for="factor_sanguineo" class="form-label">Factor Sanguíneo</label>
                            <select class="form-select" id="factor_sanguineo" name="factor_sanguineo">
                                <option value="+">+</option>
                                <option value="-">-</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>

<?php

require_once("c://laragon/www/CRUD_APRENDICES/Views/head/head.php");

?>