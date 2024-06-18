<?php

class Connection {
    private $server = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbName = 'cs_db';
    public $connection;

    // Constructor to initialize the connection
    public function __construct() {
        $this->connect();
    }

    // Method to connect to the MySQL database
    private function connect() {

        $this->connection = new mysqli($this->server, $this->username, $this->password, $this->dbName);

        if ($this->connection->connect_error) {
            die("ERROR: Could not connect. " . $this->connection->connect_error);
        } else {
         //echo "Connection established with database server successfully";
        }
    }

    public function close() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}

$db = new Connection();
$db->close();

?>
