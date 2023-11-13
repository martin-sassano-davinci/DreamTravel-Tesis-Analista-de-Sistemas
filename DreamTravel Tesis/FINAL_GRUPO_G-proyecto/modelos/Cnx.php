<?php

require_once('config/config.php');

class Cnx {

//     public function __construct() {
//         parent::__construct(
//             'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
//              DB_USER, 
//              DB_PASS);
// }

function conectar(){


try
{
// crear objeto pdo y conectar a la base de datos
$connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
return $connect;
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

}
}