<?php

class db{
    private $server = "localhost";
    private $database = "prueba_sena";
    private $usuario = "root";
    private $contrasenia = "";

    public function conexion (){
        try{
            $PDO = new PDO("mysql:host=$this->server;dbname=$this->database", $this->usuario, $this->contrasenia);
            return $PDO;
        }catch(PDOException $e){
            echo "Error de conexión: " . $e->getMessage();
        }
    }
}
