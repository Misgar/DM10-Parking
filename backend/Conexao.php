<?php

require '../vendor/autoload.php';
class DBConnection{
    private $database = 'estacionamento';
    private $host = 'localhost';
    private $dbuser = 'root';

    private $dbpass = "";
    private $_con;
    

    public function __construct()
    {
        try
        {
            $this->_con = new PDO("mysql:dbname=".$this->database.";host=".$this->host, $this->dbuser, $this->dbpass);

        } catch(Exception $e){
                echo "Falha ao conectar ". $e->getMessage();
        }
    }

    public function returnConnection(){
        return $this->_con;

    }

}