
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Login</title>

    <?php 
    session_start();
    if(isset($_SESSION['user_role'])){
      header('Location: index.php');
    }
    include_once('vistas/css.php'); ?>
  </head>
  <body>
    
    <?php include_once('vistas/header.php'); ?>


  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">
<main class="form-signin p-5">
<form action="validar_form_login.php" method="POST">
  <img class="mb-4" src="img/user.png" alt="">
  <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

  <?php if(isset($_GET['formularioEnviadoAdmin'])){ 
                  
                  echo '<div class="alert alert-success" role="alert">
                        <strong>¡Bienvenido!</strong> Has iniciado sesion como Administrador!
                      </div>';
                      
                      header('Location: admin.php');
                      require_once('vistas/header_admin.php');
                }        
                
                if(isset($_GET['formularioEnviado'])){ 
                  
                  echo '<div class="alert alert-success" role="alert">
                        <strong>¡Bienvenido '; if(isset($_SESSION['user_name'])) {
                          echo $_SESSION['user_name'];
                        } echo '!</strong> Has iniciado sesion!.
                      </div>';                     
                }        
                
                if(isset($_GET['formularioNoEnviado'])){ 
                
                  echo '<div class="alert alert-danger" role="alert">
                        <strong>¡Error!</strong> No se pudo iniciar sesión. Comprueba los datos y vuelve a intentarlo.
                      </div>';
                }
                ?>

  <div class="form-floating">
    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" required>
    <label for="email">Email address</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" id="pass" placeholder="Password" name="pass" required>
    <label for="pass">Password</label>
  </div>

  <div class="checkbox mb-3">
    <a href="olvidar_contra.php">Recuperar contraseña</a>
  </div>
  <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
</form>
</main>

   

   <?php include_once('vistas/js.php'); ?>
  </body>
</html>
