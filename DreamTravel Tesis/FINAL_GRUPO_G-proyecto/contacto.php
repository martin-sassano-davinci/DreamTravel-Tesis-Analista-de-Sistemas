

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
    include_once('vistas/header.php'); 
    include_once('vistas/header_admin.php'); 
    ?>


    
    <!-- Default form contact -->
    <section class=" p-5" style="background-color: #eee;">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <form class="text-center border border-light p-5" action="validar_form_contacto.php" method="post">

                                        <img class="mb-4" src="img/paper-plane.png" alt="">
                                        <p class="h4 mb-4">Contact us</p>

                                        <!-- Name -->
                                        <div class="row">
                                            <!-- CONTACT FORM VALIDATION -->
    <?php 
    
                if(isset($_GET['formularioEnviado'])){ 
    
            echo '<div class="alert alert-success container" role="alert">
                     <strong>¡Mensaje Enviado!</strong> Gracias por contactarnos.
                </div>';
                }               
                if(isset($_GET['formularioNoEnviado'])){ 
    
            echo '<div class="alert alert-danger" role="alert">
                  <strong>¡Error!</strong> No se ha podido enviar el mensaje. Compruébalo y vuelve a intentarlo.
                </div>';
            }
?>
                                            <div class="col">
                                                <input type="text" class="form-control mb-4" placeholder="Name" name="name" id="name" aria-label="Last name" required>
                                            </div>
                                        </div>

                                        <!-- Email -->
                                        <input type="email"  class="form-control mb-4" name="email" id="email" placeholder="E-mail" required>

                                        <!-- Subject -->
                                        <input type="text"  class="form-control mb-4" name="subject" id="subject" placeholder="Asunto" required>

                                        <!-- Message -->
                                        <div class="form-group mb-3">
                                            <textarea class="form-control rounded-0" id="message" name="message" rows="6" placeholder="Message" required></textarea>
                                        </div>

                                        <!-- Copy -->
                                        <!-- <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="defaultContactFormCopy" >
                                            <label class="custom-control-label" for="defaultContactFormCopy">Send me a copy of this message</label>
                                        </div> -->

                                        <!-- Send button -->
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
    <!-- Default form contact -->


    <?php include_once('vistas/footer.php'); ?>

    <?php include_once('vistas/js.php'); ?>
</body>

</html>