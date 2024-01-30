<?php

require_once('modelos/Cnx.php');

session_start();
if($_SESSION['user_role'] == 'admin'){
$db = new Cnx();
$conectar = $db->conectar();
 

$id = $_GET['id'];

 
        $sql = 'DELETE FROM productos WHERE id_prod = :id_prod';
        $stmt = $conectar->prepare($sql);               
       
        if ($stmt->execute([':id_prod' => $id])) {
            header("Location: admin.php?status=deleted");
          } else {
            header("Location: admin.php?status=fail_delete");
          }
        
        } else{
          header("Location: index.php"); 
      }
?>