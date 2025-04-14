<?php

class aprendiz {
    private $PDO;

    public function __construct() {
        require_once(__DIR__ . '/../Database/conexion.php');
        $con = new db();
        $this->PDO = $con->conexion();
    }

    public function insertar($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $tipo_documento, $documento, $sexo, $grupo_sanguineo, $factor_sanguineo, $id_formacion) {
        try {
            $sql_persona = "INSERT INTO personas (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, fecha_nacimiento, documento, id_tipo_documento, id_sexo, id_grupo_sanguineo, id_factor_sanguineo)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->PDO->prepare($sql_persona);
            $stmt->execute([$primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $fecha_nacimiento, $documento, $tipo_documento, $sexo, $grupo_sanguineo, $factor_sanguineo]);

            $id_persona = $this->PDO->lastInsertId();

            $sql_aprendiz = "INSERT INTO aprendices (id_persona, id_formacion) VALUES (?, ?)";
            $stmt_aprendiz = $this->PDO->prepare($sql_aprendiz);
            $stmt_aprendiz->execute([$id_persona, $id_formacion]);

            return $id_persona;
        } catch (PDOException $e) {
            error_log("Error en la inserción: " . $e->getMessage());
            return false;
        }
    }

    public function obtenerPorId($id) {
        try {
            $sql = "SELECT * FROM personas 
                    INNER JOIN aprendices ON personas.id = aprendices.id_persona
                    WHERE aprendices.id = ?";
            $stmt = $this->PDO->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: false;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function actualizar($id, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $tipo_documento, $sexo) {
        try {
            $sql_persona = "UPDATE personas SET primer_nombre = ?, segundo_nombre = ?, primer_apellido = ?, segundo_apellido = ?, id_tipo_documento = ?, id_sexo = ? WHERE id = ?";
            $stmt = $this->PDO->prepare($sql_persona);
            $stmt->execute([$primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $tipo_documento, $sexo, $id]);
            return true;
        } catch (PDOException $e) {
            error_log("Error en la actualización: " . $e->getMessage());
            return false;
        }
    }

    public function eliminar($id_aprendiz) {
        try {
            // Obtener id_persona primero
            $stmt = $this->PDO->prepare("SELECT id_persona FROM aprendices WHERE id = ?");
            $stmt->execute([$id_aprendiz]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$resultado) return false;
    
            $id_persona = $resultado['id_persona'];
    
            // Eliminar de aprendices
            $stmt = $this->PDO->prepare("DELETE FROM aprendices WHERE id = ?");
            $stmt->execute([$id_aprendiz]);
    
            // Eliminar de personas
            $stmt = $this->PDO->prepare("DELETE FROM personas WHERE id = ?");
            $stmt->execute([$id_persona]);
    
            return true;
        } catch (PDOException $e) {
            error_log("Error al eliminar: " . $e->getMessage());
            return false;
        }
    }
    
}
