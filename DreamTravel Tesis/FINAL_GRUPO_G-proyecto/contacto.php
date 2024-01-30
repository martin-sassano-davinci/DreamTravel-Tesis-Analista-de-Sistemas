

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Dreamtravel . Contacto</title>

    <?php include_once('vistas/css.php'); ?>
</head>

<body>
    <?php 
    session_start();
    include_once('modelos/Cnx.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    
    $db = new Cnx();
    $pdo = $db->conectar();
    
    function validarForm($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$envioExitoso = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $name = validarForm($_POST['name'] ?? null );

$email = $_POST['email'];
filter_var($email, FILTER_VALIDATE_EMAIL);

$subject = validarForm($_POST['subject'] ?? null );

$message = validarForm($_POST['message'] ?? null);

    if($name != null && $email != null && $subject != null && $message != null){
        
        $mail = new PHPMailer(true);
    
        try {
            // Configuración del servidor SMTP de Gmail
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'dreamtraveldavinci@gmail.com';
            $mail->Password = 'biyizvbqgrnpatgy';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
    
            // Configuración del correo
            $mail->setFrom('dreamtraveldavinci@gmail.com', 'Dream Travel');
            $mail->addAddress('dreamtraveldavinci@gmail.com');
            $mail->addAddress($email);
            $mail->Subject = $subject;
            $mail->Body = "Hemos recibido la siguiente solicitud, pronto te responderemos a la brevedad, muchas gracias!\n
            Nombre: $name\n
            Correo: $email\n
            Mensaje:\n $message";
    
            // Configuración de la codificación de caracteres
            $mail->CharSet = 'UTF-8';
    
            // Envía el correo
            $mail->send();
            
            // Establece la variable de éxito en true
            $envioExitoso = true;
    
            
            
        } catch (Exception $e) {
            echo "<p class='mt-5'>Error al enviar el correo: {$mail->ErrorInfo}</p>";
            $envioExitoso = false;
        }
    } else {
        echo '<div class="alert alert-danger mt-5" role="alert">
                                                          <strong>¡Error!</strong> Completa el formulario e intenta nuevamente.
                                                      </div>';
                                                      $envioExitoso = false;
    }
    }
    if ($envioExitoso) {
        ob_start();  // Inicia el buffer de salida
        header('Location: contacto.php?formularioEnviado=true');
        ob_end_flush();  // Envia el buffer de salida y lo limpia
        exit;
    }
    include_once('vistas/header.php'); 
    include_once('vistas/header_admin.php'); 
    ?>
    
    <!-- Default form contact -->
    <section class="p-0 mt-5 mb-5" style="background-color: #eee;">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <form class="text-center border border-light p-5" method="post">
    
                                        <img class="mb-4" src="img/paper-plane.png" alt="">
                                        <p class="h4 mb-4">Contact us</p>
    
                                        <!-- CONTACT FORM VALIDATION -->
                                        <?php
                                        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
                                            if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
                                                echo '<div class="alert alert-danger mt-5" role="alert">
                                                          <strong>¡Error!</strong> Todos los campos son obligatorios. Completa el formulario e intenta nuevamente.
                                                      </div>';
                                            }
                                        }
                                        if (isset($_GET['formularioEnviado']) && $_GET['formularioEnviado'] == 'true') {
                                            echo "<p class='mt-5 alert alert-success text-center'>Su consulta ha sido enviada, le responderemos a la brevedad.</p>";
                                        }
        
                                        ?>
    
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control mb-4" placeholder="Name" name="name" id="name" aria-label="Last name" required>
                                            </div>
                                        </div>
    
                                        <input type="email" class="form-control mb-4" name="email" id="email" placeholder="E-mail" required>
    
                                        <input type="text" class="form-control mb-4" name="subject" id="subject" placeholder="Asunto" required>
    
                                        <div class="form-group mb-3">
                                            <textarea class="form-control rounded-0" id="message" name="message" rows="6" placeholder="Message" required></textarea>
                                        </div>
    
                                        <button class="btn btn-warning" type="submit">Send</button>
    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('vistas/footer.php');?>

    <?php include_once('vistas/js.php');?>
</body>

</html>