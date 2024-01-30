<?php
 include_once('vistas/js.php'); 
 include_once('vistas/css.php'); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
// Conexión a la base de datos utilizando PDO
session_start();
if(isset($_SESSION['user_role'])){
    header('Location: login.php');
}
include_once('modelos/Cnx.php');

$db = new Cnx();
$pdo = $db->conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['mail'];

    // Verifica si el correo electrónico existe en la base de datos
    $stmt = $pdo->prepare("SELECT id_usu, nombre FROM usuarios WHERE mail = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $user_id = $row['id_usu'];
        $username = $row['nombre'];

        // Genera un token único para el restablecimiento de contraseña
        $token = bin2hex(random_bytes(32));

        // Almacena el token en la base de datos junto con la fecha de expiración
        $expire_date = date("Y-m-d H:i:s", strtotime("+1 hour"));
        $update_sql = "UPDATE usuarios SET reset_token = :token, token_expire_date = :expire_date WHERE id_usu = :user_id";

        $stmt = $pdo->prepare($update_sql);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->bindParam(':expire_date', $expire_date, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

   
        $reset_link = "http://localhost/DreamTravel%20Tesis/FINAL_GRUPO_G-proyecto/reset_password.php?token=$token";      
   
     $mail = new PHPMailer(true);

     try {
    

         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com';
         $mail->SMTPAuth = true;
         $mail->Username = 'dreamtraveldavinci@gmail.com';
         $mail->Password = 'biyi zvbq grnp atgy';
        //  $mail->SMTPSecure = 'ssl'; //PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
         $mail->Port = 587;
 
         // Configuración del correo
         $mail->setFrom('dreamtraveldavinci@gmail.com', 'Dream Travel');
         $mail->addAddress($email, $username);
         $mail->Subject = 'Recuperación de Contraseña';
         $mail->Body = "Hola $username,\n\nPara restablecer tu contraseña, haz clic en el siguiente enlace:\n$reset_link\n\nSi no solicitaste este restablecimiento, puedes ignorar este correo.";
 
         // Configuración de la codificación de caracteres
         $mail->CharSet = 'UTF-8';

         // Envía el correo
         $mail->send();

        echo "<p class='mt-5 alert alert-success text-center'>Se ha enviado un enlace de restablecimiento a tu correo electrónico.</p>";
    } catch (Exception $e) {
        echo "<p class='mt-5'>Error al enviar el correo: {$mail->ErrorInfo}</p>";
    }
} else {
    echo "<p class='mt-5 alert alert-danger text-center'>No se encontró ninguna cuenta asociada a este correo electrónico.</p>";
}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <?php include_once('vistas/css.php'); ?>
</head>
<body>
<?php 
    include_once('vistas/header.php'); 
    include_once('vistas/header_admin.php'); 
    ?>

    <div class="container mt-5">
      <p class="h2 text-center">Recuperar Contraseña</p>
    <form action="" method="post" class="needs-validation" novalidate>
        <div class="form-row">
            <div class="col-8 m-4 mx-auto">
                <input type="email" name="mail" class="form-control " placeholder="Ingresa tu correo electrónico" required>
                <div class="invalid-feedback m-3 h3">Por favor ingresa un correo válido.</div>
            </div>
            <div class="col-4 m-4 mx-auto">               
                <input type="submit" value="Recuperar Contraseña" class="btn btn-warning">
            </div>

        </div>
    </form>
</div>

    <?php include_once('vistas/js.php'); ?>
</body>
</html>
