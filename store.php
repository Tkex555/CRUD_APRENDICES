<?php

include 'Database/conexion.php'; 

$primerNombre = $_POST['primer_nombre'];
$segundoNombre = $_POST['segundo_nombre'];
$primerApellido = $_POST['primer_apellido'];
$segundoApellido = $_POST['segundo_apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$documento = $_POST['documento'];


$sql = "INSERT INTO aprendices ($primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $documento) VALUES ('$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido', '$documento')";
$resultado = mysqli_query($conexion, $sql);

if ($resultado) {
    echo "<script>alert('Registro creado correctamente');</script>";
    echo "<script>window.location.href='index.php';</script>";
} else {
    echo "<script>alert('Error al crear el registro');</script>";
    echo "<script>window.location.href='index.php';</script>";
}
mysqli_close($conexion);
