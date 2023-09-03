<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;

use Src\System\DatabaseConnector;

$dotenv = new DotEnv(__DIR__);
$dotenv->load();

//Initiate DatabaseConnector class

$db_connection=new DatabaseConnector();

$db_conn=$db_connection->getConnection();

// test code, should output:localhost
// when you run $ php bootstrap.php after uncommenting the line below
//echo getenv('DB_HOST');