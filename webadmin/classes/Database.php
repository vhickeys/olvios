<?php

class Database
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "olvios";
    private $conn;


    // // Uncomment this for Live Connection
    // private $hostname = "localhost";
    // private $username = "jeapscar_victor";
    // private $password = "V1c0lv10$";
    // private $dbname = "jeapscar_victorDB";
    // private $conn;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $th) {
            echo "Connection failed: " . $th->getMessage();
            die();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
