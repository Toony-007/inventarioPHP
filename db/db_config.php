<?php
// db/db_config.php

class Database {
    private $host = "inventario-db1.cyf2izxbusmn.us-east-1.rds.amazonaws.com";
    private $dbname = "inventario_db";
    private $username = "admin";
    private $password = "1234567890";
    public $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}

$db = new Database();
$pdo = $db->pdo;
?>
