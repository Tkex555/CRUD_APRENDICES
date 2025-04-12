<?php
include 'Database/conexion.php'; // Archivo de conexión

$id = $_GET['id'];
$sql        = "SELECT * FROM aprendices WHERE id = $id";
$resultado  = mysqli_query($conexion, $sql);
$row       = mysqli_fetch_assoc($resultado);
$primer_nombre = $row['primer_nombre'];
$segundo_nombre = $row['segundo_nombre'];
$primer_apellido = $row['primer_apellido'];
$segundo_apellido = $row['segundo_apellido'];






echo $primer_nombre;
echo "<br>";
echo $primer_apellido;
