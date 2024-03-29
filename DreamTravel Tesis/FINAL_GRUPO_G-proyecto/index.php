<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Home</title>

    <?php include_once('vistas/css.php'); ?>

    <style>
      .padding {
        margin-left: 1.5rem;
      }
    </style>
  </head>
  <body>
    <?php 
    session_start();
    include_once('config/config.php');
    require_once('modelos/Cnx.php');  
    ?>
    
    
    <?php 
    include_once('vistas/header.php'); 
    include_once('vistas/header_admin.php'); 
    ?>

<main>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/carousel1.png" class="d-block w-100 img-fluid" alt="...">

        <div class="containesr">
          <div class="carousel-caption text-start">
            <h1>Bienvenido</h1>
            <p>Diviertete planificando tu próximo viaje.</p>
            <p><a class="btn btn-lg btn-primary btn-warning" href="paquetes.php">Elíge destino</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/carousel2.png" class="d-block w-100 img-fluid" alt="...">

        <div class="container">
          <div class="carousel-caption">
            <h1>Comienza tu nueva aventura.</h1>
            <p>Descubre sitios sensacionales para conocer.</p>
            <p><a class="btn btn-lg btn-primary btn-warning" href="paquetes.php">Explorar destinos</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/carousel3.png" class="d-block w-100 img-fluid" alt="...">

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Te ofrecemos la mejor atención.</h1>
            <p>Eligenos para planificar el viaje de tus sueños.</p>
            <p><a class="btn btn-lg btn-primary btn-warning" href="contacto.php">Contacto</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <div class="rounded-circle">
          <img src="img/avion.png" alt="">
        </div>

        <h2>Vuelos</h2>
        <p>Encontrá el vuelo que buscás.<br>En nuestro buscador podrás reservarlo y hacer la emision, por teléfono, mail o en nuestras oficinas.</br></p>
        <p><a class="btn btn-secondary btn-warning" href="#">Ver más &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
         <div class="rounded-circle">
          <img src="img/carro-del-hotel.png" alt="">
        </div>
        <h2>Hoteles</h2>
        <p>Buscá tu hotel ideal al precio que queres y en la zona que te gusta, podrás reservarlo y hacer la emision por teléfono, mail o en nuestras oficinas.
        </p>
        <p><a class="btn btn-secondary btn-warning" href="#">Ver más &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <div class="rounded-circle">
          <img src="img/crucero (2).png" alt="">
        </div>

        <h2>Cruceros</h2>
        <p>¿Primer crucero o crucerista experimentado?
          <br>Buscá tu itinerario ideal o contactános para que lo busquemos juntos.</br></p>
        <p><a class="btn btn-secondary btn-warning" href="#">Ver más &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="container">
    <div class="row featurette indigo">
        <div class="col-md-7 p-4 ">
            <h2 class="featurette-heading">Disney, <span class="text-muted">de regreso a un mundo lleno de magia!</span></h2>
            <p class="lead">El Walt Disney World Resort, también conocido como Disney World, es un complejo turístico famoso por sus parques temáticos y numerosos hoteles.</p>
            <p><a class="btn btn-secondary btn-warning" href="paquetes.php">Ver más &raquo;</a></p>
        </div>
        <div class="col-md-5">
            <img class="img-fluid rounded" src="img/disney.png" alt="rounded" width="500" height="500">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette indigo">
        <div class="col-md-7 order-md-2 p-4 ">
            <h2 class="featurette-heading">Mykonos, <span class="text-muted">la famosa isla griega que te va a enamorar.</span></h2>
            <p class="lead">Mykonos es una isla del grupo de las Cícladas en el mar Egeo. Los monumentos icónicos incluyen una hilera de molinos de viento del siglo XVI, que se ubican en una colina sobre la ciudad de Mykonos.</p>
            <p><a class="btn btn-secondary btn-warning" href="paquetes.php">Ver más &raquo;</a></p>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="img-fluid rounded" src="img/a1.png" alt="rounded" width="500" height="500">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette indigo">
        <div class="col-md-7 p-4 ">
            <h2 class="featurette-heading">Taj Mahal, <span class="text-muted">una maravilla arquitectónica en Agra, India.</span></h2>
            <p class="lead">El Taj Mahal ​​ es un monumento funerario construido entre 1631 y 1654 en la ciudad de Agra, estado de Uttar Pradesh, a orillas del río Yamuna, por el emperador musulmán Shah Jahan de la dinastía mogol.</p>
            <p><a class="btn btn-secondary btn-warning" href="paquetes.php">Ver más &raquo;</a></p>
        </div>
        <div class="col-md-5">
            <img class="img-fluid rounded" src="img/a2.png" alt="rounded" width="500" height="500">
        </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette indigo">
        <div class="col-md-7 order-md-2 p-4 ">
            <h2 class="featurette-heading">Las pirámides Egipto, <span class="text-muted">las construcciones más antiguas que permanecen en pie.</span></h2>
            <p class="lead">Símbolos del Egipto moderno, las pirámides de Keóps, Kefrén y Micerino levantadas en la llanura de Guiza, que se observan a las afueras de la capital del Egipto moderno, El Cairo.</p>
            <p><a class="btn btn-secondary btn-warning" href="paquetes.php">Ver más &raquo;</a></p>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="img-fluid rounded" src="img/a3.png" alt="rounded" width="500" height="500">
        </div>
    </div>

    <hr class="featurette-divider">
</div>
  
  <!-- /.container -->
  <?php
  $db = new Cnx();
$conectar = $db->conectar();
$stmt = $conectar->query('SELECT * FROM opiniones'); 
$testimonios = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container mt-5">
  <div class="row">

    <?php
  
    $sql = 'SELECT o.*, c.id_compras, p.img
            FROM opiniones o
            INNER JOIN compras c ON o.id_compras = c.id_compras
            INNER JOIN productos p ON c.destino = p.destino
            ORDER BY RAND()
            LIMIT 3';

    $stmt = $conectar->query($sql);
    $testimonios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($testimonios as $testimonio) {
    ?>
      <div class="col-12 col-sm-6 col-md-4">
        <div class="card">
          <div class="card-body text-center">
            <img src="<?php echo $testimonio['img']; ?>" class="card-img-top rounded-circle img-fluid mx-auto mt-3" alt="Imagen de destino <?php echo $index + 1; ?>" style="width: 150px; height: 150px; object-fit: cover;">
            <h5 class="card-title h4 m-3"><?php echo $testimonio['titulo']; ?></h5>
            <p class="card-text testimonial-text m-3"><?php echo $testimonio['comentario']; ?></p>
            <p class="card-text client-name m-3"><small class="text-muted"><?php echo $testimonio['nombre']; ?></small></p>
            <div class="text-center">
              <?php
              
              $calificacion = $testimonio['calificacion'];

              
              for ($star = 1; $star <= 5; $star++) {
                
                $estrellaLlena = $star <= $calificacion ? '&#9733;' : '&#9734;';

                
                echo "<span class='text-warning'>$estrellaLlena</span> ";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

  </div>
</div>

            <div class='container p-5 m-3 mx-auto text-center'>
                <a href='resenias.php' class='btn btn-primary text-center mx-auto'>Ver más reseñas</a>
            </div>
           
</main>



<!-- footer -->
<footer class="bg-dark text-center text-white mt-5">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="mb-4">
          <!-- Facebook -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-facebook-f"></i
          ></a>
    
          <!-- Twitter -->
          <a class="btn btn-outline-light btn-floating  m-1" href="#!" role="button"
            ><i class="fab fa-twitter"></i
          ></a>
    
          <!-- Instagram -->
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
            ><i class="fab fa-instagram"></i
          ></a>
        </section>
        <!-- Section: Social media -->
      </div>

      <div class="container mt-4" id="suscripcion">
      <p class="h4">Suscripción a Newsletter</p>
    <form action="suscripcion.php" method="post" class="needs-validation" novalidate>
        <div class="form-row">
            <div class="col-8 m-3 mx-auto">
                <input type="email" name="email" class="form-control " placeholder="Ingresa tu correo electrónico" required>
                <div class="invalid-feedback m-3 h3">Por favor ingresa un correo válido.</div>
            </div>
            <div class="col-4 m-3 mx-auto">
                <button type="submit" class="btn btn-warning">Suscribirse</button>
            </div>

            <?php
            if(isset($_GET['formularioEnviado'])){ 
                  
              echo '<div class="alert alert-success m-3" role="alert">
                    <strong>¡Gracias!</strong> Te has suscrito al Newsletter!.
                  </div>';
            }  
              if (isset($_GET['errorMailRepetido'])){
                echo '<div class="alert alert-danger m-3" role="alert">
                <strong>¡Error!</strong> al suscribirse, por favor ingrese otro email.
                </div>';
              }

            ?>
        </div>
    </form>
</div>

<!-- validación -->

<script>
    // Activar la validación de Bootstrap
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>


      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright
        <a class="text-white" href="https://mdbootstrap.com/%22%3EMDBootstrap.com"></a>
      </div>
      <!-- Copyright -->
    </footer>
    
    <?php include_once('vistas/js.php'); ?>
  </body>
</html>
