<?php

class Conexion {
    private $Host; 
    private $Usuario;
    private $Contraseña;
    private $Db;
    private $conexion;
    
    public function __construct ($host, $usuario, $contraseña, $DB){
        $this->Host=$host;
        $this->Usuario=$usuario;
        $this->Contraseña=$contraseña;
        $this->Db=$DB;
    }

    public function Conectar(){
        
        try {
            $dsn = "mysql:host={$this->Host};dbname={$this->Db};charset=utf8mb4";
            $this->conexion = new PDO($dsn, $this->Usuario, $this->Contraseña);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        }
          catch (PDOException $e) {
            echo "Error de conexion: ". $e->getMessage();
            exit;
        }
    }

    public function Desconectar () {
        $this->conexion = null;
    }

} 
?>