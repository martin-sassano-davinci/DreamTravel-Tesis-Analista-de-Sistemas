<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Registro</title>

    <?php 
    session_start();
    if(isset($_SESSION['user_role'])){
      header('Location: index.php');
    }
    include_once('vistas/css.php'); 
    ?>
  </head>
  <body>
    
    <?php include_once('vistas/header.php'); ?>


  <!-- Custom styles for this template -->
  <section class=" p-0 mt-5" style="background-color: #eee;">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                <?php if(isset($_GET['formularioEnviado'])){ 
                  
                    echo '<div class="alert alert-success" role="alert">
                          <strong>¡Gracias!</strong> Te has registrado!.
                        </div>';
                  }  

                  if (isset($_GET['errorMailRepetido'])){
                    echo '<div class="alert alert-danger" role="alert">
                    <strong>¡Error!</strong> No se ha podido registrar. Ya se ha registrado con este mail.
                    </div>';
                  }
                  
                  if(isset($_GET['errorPassIntro'])){
                    echo '<div class="alert alert-danger" role="alert">
                          <strong>¡Error!</strong> No se ha podido registrar. La contraseña debe contener una mayuscula, una minuscula, un numero y un caracter especial.
                        </div>';
                  }
                  if(isset($_GET['errorPass'])){ 
                  
                    echo '<div class="alert alert-danger" role="alert">
                          <strong>¡Error!</strong> No se ha podido registrar. Las contraseñas no coinciden.
                        </div>';
                  }
                  
                  if(isset($_GET['formularioNoEnviado'])){ 
                  
                    echo '<div class="alert alert-danger" role="alert">
                          <strong>¡Error!</strong> No se ha podido registrar. Comprueba los datos y vuelve a intentarlo.
                        </div>';
                  }
                  ?>
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
  
                  <form class="mx-1 mx-md-4" id="contact-form" name="contact-form" action="validar_form_registro.php" method="POST">
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" name="name" class="form-control" required/>
                        <label class="form-label" for="form3Example1c">Your Name</label>
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" id="form3Example3c" name="email" class="form-control" required/>
                        <label class="form-label" for="form3Example3c">Your Email</label>
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4c" name="pass" min="8" class="form-control" required/>
                        <label class="form-label" for="form3Example4c">Password</label>
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4cd" min="8" name="pass2" class="form-control" required/>
                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      </div>
                    </div>
                
  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">                     
                      <input type="submit" type="button" name='submit' class="btn btn-primary btn-lg" value="Registrar">
                    </div>
  
                  </form>
  
                </div>
                <div class="col-md-10 col-lg-6 d-flex align-items-center order-1 order-lg-2">
  
                  <img src="img/travel-argentina.png" class="img-fluid " alt="Sample image">
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
  </section>
</main>

    
    
    <?php include_once('vistas/js.php'); ?>
  </body>
</html>
