<?php
session_start();

require_once('modelos/Cnx.php');


$db = new Cnx();
$conectar = $db->conectar();


$email = $_POST['email'];
filter_var($email, FILTER_VALIDATE_EMAIL);

// $name = $conectar->prepare("SELECT nombre FROM usuarios WHERE mail = '$email' LIMIT 1");
// $name = execute();
// $resultado_name = $name->fetchAll(); 

// $name = $conectar->prepare("SELECT nombre FROM usuarios WHERE mail = :email LIMIT 1");
// $name->execute(array(':email' => $email));
// $resultado_name = $name->fetchAll();

$name = $conectar->prepare("SELECT nombre FROM usuarios WHERE mail = :email LIMIT 1");
$name->execute(array(':email' => $email));
$resultado_name = $name->fetch(); // Usa fetch() en lugar de fetchAll() para obtener una sola fila

if ($resultado_name) {
    $_SESSION['user_name'] = $resultado_name['nombre']; // Almacena solo el nombre de usuario
}


$pass = validarForm($_POST['pass'] ?? null );

$verificar_pass = $conectar->prepare("SELECT pass FROM usuarios WHERE mail = '$email' LIMIT 1");
$verificar_pass->execute();
$resultado = $verificar_pass->fetchAll();

$verificar_admin = $conectar->prepare("SELECT is_admin FROM usuarios WHERE mail = '$email' LIMIT 1");
$verificar_admin->execute();
$resultado_admin = $verificar_admin->fetchAll();



if ($email != null && $pass != null) {

    if (password_verify($pass, $resultado[0]['pass']) && $resultado_admin[0]['is_admin'] == 1) {
        $_SESSION['user_role'] = 'admin';
        $_SESSION['user_name'] = $resultado_name['nombre'];
        header("Location: login.php?formularioEnviadoAdmin");
      
    } else if(password_verify($pass, $resultado[0]['pass']) && $resultado_admin[0]['is_admin'] == 0){
        $_SESSION['user_role'] = 'user';
        $_SESSION['user_name'] = $resultado_name['nombre'];
        header("Location: login.php?formularioEnviado"); 

        } else {
            session_destroy();
            header("Location: login.php?formularioNoEnviado"); 

            }
        }

     // if (count($resultado) == 1) {

     //     header("Location: login.php?formularioEnviado");
    
    // } else {
    
    // header("Location: login.php?formularioNoEnviado"); 
        // }
    // $sql = $conectar->prepare("SELECT * FROM usuarios WHERE mail = '$email' AND pass = '$pass' ");
    // $sql->execute();
    // $resultado = $sql->fetchAll();

    



    
    

    




function validarForm($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>