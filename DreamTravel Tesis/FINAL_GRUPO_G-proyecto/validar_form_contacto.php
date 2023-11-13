<?php



$name = validarForm($_POST['name'] ?? null );

$email = $_POST['email'];
filter_var($email, FILTER_VALIDATE_EMAIL);

$subject = validarForm($_POST['subject'] ?? null );

$message = validarForm($_POST['message'] ?? null);



if ($name != null && $email != null && $subject != null && $message != null) {
    
    header("Location: contacto.php?formularioEnviado");

        
} else {
    
    header("Location: contacto.php?formularioNoEnviado");
    
}



function validarForm($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>