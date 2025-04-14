<?php

class db {
    private $host = "localhost";
    private $dbname = "prueba_sena";
    private $user = "root";
    private $password = "";

    public function conexion() {
        try {
            $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->password);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Aseguramos que los errores se muestren
            return $PDO;
        } catch(PDOException $e) {
            error_log("Error de conexión: " . $e->getMessage()); // Log del error de conexión
            return null; // Devuelve null si no se puede conectar
        }
    }
}
