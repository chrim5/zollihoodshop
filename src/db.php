<?php

// Check connection

class DB {
    static private $_instance;
    private $_connection;


    private function __construct() {
        $servername = $_ENV["MYSQL_PORT_3306_TCP_ADDR"];
        $username = "root";
        $password = $_ENV["MYSQL_ENV_MYSQL_ROOT_PASSWORD"];

        $this->_connection = new mysqli($servername, $username, $password, "myapp");
        if ($this->_connection->connect_error) {
            die("Connection failed: " . $conn->connect_error);
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
}
?>

