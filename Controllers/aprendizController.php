<?php

class aprendiz {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function crearAprendiz($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $tipo_documento, $numero_documento, $id_tipo_documento, $id_sexo, $id_grupo_sanguineo, $id_factor_sanguineo) {
        try {
            $sql = "INSERT INTO aprendices (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, tipo_documento, numero_documento, id_tipo_documento, id_sexo, id_grupo_sanguineo, id_factor_sanguineo) VALUES ('$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido', '$tipo_documento', '$numero_documento', '$id_tipo_documento', '$id_sexo', '$id_grupo_sanguineo', '$id_factor_sanguineo')";
            $resultado = mysqli_query($this->conexion, $sql);

            if ($resultado) {
                echo "<script>alert('Registro creado correctamente');</script>";
                echo "<script>window.location.href='index.php';</script>";
            } else {
                throw new Exception('Error al crear el registro');
            }
        } catch (Exception $e) {
            echo "<script>alert('" . $e->getMessage() . "');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
    }

    public function obtenerAprendices() {
        try {
            $sql = "SELECT 
                        aprendices.id AS id_aprendiz,
                        personas.primer_nombre,
                        personas.segundo_nombre,
                        personas.primer_apellido,
                        personas.segundo_apellido,
                        personas.id AS id_persona
                    FROM aprendices
                    INNER JOIN personas ON aprendices.id_persona = personas.id";
            
            $resultado = mysqli_query($this->conexion, $sql);
            return $resultado;
        } catch (Exception $e) {
            echo "<script>alert('Error al obtener los registros: " . $e->getMessage() . "');</script>";
            return false;
        }
    }
    
}