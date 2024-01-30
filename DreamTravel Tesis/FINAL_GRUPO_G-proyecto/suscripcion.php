<?php

require_once('modelos/Cnx.php');


$db = new Cnx();
$conectar = $db->conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén el correo electrónico del formulario
    $email = $_POST["email"];
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($email !== false) {
        $mail = $conectar->prepare("SELECT * FROM newsletter WHERE mail = :email LIMIT 1");
        $mail->execute(array(':email' => $email));
        $resultado_mail = $mail->fetch(); // Usa fetch() en lugar de fetchAll() para obtener una sola fila

        if ($resultado_mail !== false) {
            header("Location: index.php?errorMailRepetido#suscripcion");
        } else {
            $comando = $conectar->prepare("INSERT INTO newsletter (mail) VALUES (:email)");
            $comando->execute(array(':email' => $email));
            header("Location: index.php?formularioEnviado#suscripcion");
        }
    }
} else {
    header("Location: index.php?error"); 
}

?>
