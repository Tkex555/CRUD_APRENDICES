<?php

class aprendizController {
    private $model;

    public function __construct() {
        require_once("C:\laragon\www\CRUD_APRENDICES\Models\aprendizModel.php");
        $this->model = new aprendiz(); 
    }

    public function guardar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $primer_nombre = $_POST['primer_nombre'];
            $segundo_nombre = $_POST['segundo_nombre'];
            $primer_apellido = $_POST['primer_apellido'];
            $segundo_apellido = $_POST['segundo_apellido'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $documento = $_POST['documento'];
            $tipo_documento = $_POST['tipo_documento'];
            $sexo = $_POST['sexo'];
            $grupo_sanguineo = $_POST['grupo_sanguineo'];
            $factor_sanguineo = $_POST['factor_sanguineo'];
            $id_formacion = $_POST['formacion']; 
    
            $id = $this->model->insertar($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $tipo_documento, $documento, $sexo, $grupo_sanguineo, $factor_sanguineo, $id_formacion);
    
            if ($id != false) {
                echo "<div class='alert alert-success' style='margin: 20px;'>✅ ¡Aprendiz agregado correctamente!</div>";
                echo "<a href='/CRUD_APRENDICES/index.php' class='btn btn-primary' style='margin: 20px;'>Volver al inicio</a>";
            } else {
                echo "<div class='alert alert-danger' style='margin: 20px;'>❌ Error al agregar el aprendiz.</div>";
                echo "<a href='/CRUD_APRENDICES/index.php' class='btn btn-secondary' style='margin: 20px;'>Volver al inicio</a>";
            }
            
        }
    }
    
}

if (isset($_GET['accion']) && $_GET['accion'] === 'guardar') {
    $controller = new aprendizController();
    $controller->guardar();
}
