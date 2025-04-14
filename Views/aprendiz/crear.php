<?php
require_once("c://laragon/www/CRUD_APRENDICES/Views/head/head.php");
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SENA || Agregar Aprendiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Agregar Aprendiz</h1>
                <form action="/CRUD_APRENDICES/controllers/aprendizController.php?accion=guardar" method="post">
                    <div class="mb-3">
                        <label for="primer_nombre" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre">
                    </div>
                    <div class="mb-3">
                        <label for="primer_apellido" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                    </div>
                    <div class="mb-3">
                        <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                        <select class="form-select" id="tipo_documento" name="tipo_documento" required>
                            <option value="1">Cédula de Ciudadanía</option>
                            <option value="2">Tarjeta de Identidad</option>
                            <option value="3">Cédula de Extranjería</option>
                            <option value="4">Pasaporte</option>
                            <option value="5">Registro Civil</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="documento" class="form-label">N° de Documento</label>
                        <input type="number" class="form-control" id="documento" name="documento" required>
                    </div>
                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select class="form-select" id="sexo" name="sexo" required>
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                            <option value="3">Otro</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="grupo_sanguineo" class="form-label">Grupo Sanguíneo</label>
                        <select class="form-select" id="grupo_sanguineo" name="grupo_sanguineo">
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">AB</option>
                            <option value="4">O</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="factor_sanguineo" class="form-label">Factor Sanguíneo</label>
                        <select class="form-select" id="factor_sanguineo" name="factor_sanguineo">
                            <option value="1">+</option>
                            <option value="2">-</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formacion" class="form-label">Programa de Formación</label>
                        <select class="form-select" id="formacion" name="formacion" required>
                            <option value="1">ADSO</option>
                            <option value="2">Peluquería</option>
                            <option value="3">Panadería</option>
                            <option value="4">Ambiental</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
