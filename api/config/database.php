<?php

// Check connection

class Database {
    static private $_instance;
    private $_connection;

    private function __construct() {
        $host = $_ENV["DB_HOST"];
        $username = $_ENV["DB_USER"];
        $password = $_ENV["DB_PASSWORD"];
        $dbname = $_ENV["DB_NAME"];

        $this->_connection = new mysqli($host, $username, $password, $dbname);
        if ($this->_connection->connect_error) {
            die("Connection failed: " . $this->_connection->connect_error);
        }
    }
    
    public static function getInstance(){
        if (!self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    } 

    public function getConnection(){
        return $this->_connection;
    }

    public function closeConnection(){
        return mysqli_close($this->_connection);
    }
}
?>
