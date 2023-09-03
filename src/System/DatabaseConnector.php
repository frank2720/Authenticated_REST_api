<?php
namespace Src\System;

use PDO;
use PDOException;

class DatabaseConnector {
    private $conn=null;

    //public constructor method for database connection

    function __construct()
    {
        //database connection properties

        $host =getenv('DB_HOST');
        $port =getenv('DB_PORT');
        $database=getenv('DB_DATABASE');
        $username=getenv('DB_USERNAME');
        $password=getenv('DB_PASSWORD');

        //connect while handling the connection error
        try{
            $this->conn= new PDO('mysql:host='.$host.';dbname='.$database,$username,$password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo 'connection failed:- '.$e->getMessage();
        }
    }
    function getConnection(){
        return $this->conn;
    }
}