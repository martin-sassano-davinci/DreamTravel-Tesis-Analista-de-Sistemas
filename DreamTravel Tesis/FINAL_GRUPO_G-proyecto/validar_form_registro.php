<?php

require_once('modelos/Cnx.php');

$name = validarForm($_POST['name'] ?? null );

$email = $_POST['email'];
filter_var($email, FILTER_VALIDATE_EMAIL);

$pass = validarForm($_POST['pass'] ?? null );

$pass_hash = password_hash($pass, PASSWORD_DEFAULT);

$pass2 = validarForm($_POST['pass2'] ?? null );

if ($name != null && $email != null && $pass != null && $pass2 != null) {
    
    $db = new Cnx();
    $conectar = $db->conectar();

     $sql = $conectar->prepare("SELECT * FROM usuarios WHERE mail = '$email'");
     $sql->execute();
     $resultado = $sql->fetchAll();
    
    if (count($resultado) > 0) {

        header("Location: registracion.php?errorMailRepetido");

    } else if($pass != $pass2){

        header("Location: registracion.php?errorPass");

    } else {

        $comando = $conectar->prepare("INSERT INTO usuarios (nombre, mail, pass, is_admin) VALUES ('$name', '$email', '$pass_hash', 0)");
        $comando->execute();
    
        header("Location: registracion.php?formularioEnviado");
    }

} else {
    
    header("Location: registracion.php?formularioNoEnviado");

}



function validarForm($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>