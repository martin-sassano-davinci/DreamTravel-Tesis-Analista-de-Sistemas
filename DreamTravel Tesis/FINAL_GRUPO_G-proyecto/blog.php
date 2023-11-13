<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Blog</title>

    <?php include_once('vistas/css.php'); ?>

  </head>
  <body>
    
    <?php 
    session_start();
    include_once('vistas/header.php'); 
    include_once('vistas/header_admin.php'); 
    ?>

<!-- Secciones de blog -->

<main>
  <div class="container p-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card">
          <img class="card-img" src="img/blog3.png" alt="#">
          <div class="card-img-overlay">
            <a href="#" class="btn btn-light btn-sm">Tips </a>
          </div>
          <div class="card-body">
            <h4 class="card-title">10 cosas que no pueden faltar en tu viaje.</h4>
           
            <p class="card-text">Descubre todos los tips necesarios que deberias saber antes de viajar.</p>
            <a href="#" class="btn btn-info btn-warning">Más info</a>
          </div>
          <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
            <div i class="bi bi-calendar3"></i> 16/04/19 
            </div>
            <div class="stats">
               <i class="far fa-eye"></i> 2.867
              <i class="far fa-comment"></i> 590
            </div>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card">
          <img class="card-img" src="img/blog1.png" alt="#">
          <div class="card-img-overlay">
            <a href="#" class="btn btn-light btn-sm">Documentación</a>
          </div>
          <div class="card-body">
            <h4 class="card-title">Documentación necesaria para viajar.</h4>
           
            <p class="card-text">Te ofrecemos la mejor información útil y necesaria para poder disfrutar de tu viaje plenamente sin ningun tipo de restricciones .</p>
            <a href="#" class="btn btn-info btn-warning">Más info</a>
          </div>
          <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
            <div i class="bi bi-calendar3"></i> 10/04/19 
            </div>
            <div class="stats">
               <i class="far fa-eye"></i> 9.347
              <i class="far fa-comment"></i> 5.430
            </div>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card">
          <img class="card-img" src="img/blog2.png" alt="#">
          <div class="card-img-overlay">
            <a href="#" class="btn btn-light btn-sm">Seguro de viaje</a>
          </div>
          <div class="card-body">
            <h4 class="card-title">¿Por qué es importante contratar un seguro de viaje?</h4>
           
            <p class="card-text">Durante los preparativos de viaje, contratar un seguro ya es una parte indispensable.</p>
            <a href="#" class="btn btn-info btn-warning">Más info</a>
          </div>
          <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
            <div i class="bi bi-calendar3"></i> 09/04/19 
            </div>
            <div class="stats">
               <i class="far fa-eye"></i> 30.965
              <i class="far fa-comment"></i> 8.976
            </div>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card">
          <img class="card-img" src="img/blog4.png" alt="#">
          <div class="card-img-overlay">
            <a href="#" class="btn btn-light btn-sm">Excurciones</a>
          </div>
          <div class="card-body">
            <h4 class="card-title">Disfruta de las mejores excursiones del mundo.</h4>
          
            <p class="card-text">Descubre los mejores sitios para realizar y disfrutar diferentes excursiones.</p>
            <a href="#" class="btn btn-info btn-warning">Más info</a>
          </div>
          <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
            <div i class="bi bi-calendar3"></i> 02/04/19 
            </div>
            <div class="stats">
               <i class="far fa-eye"></i> 20.978
              <i class="far fa-comment"></i> 1.264
            </div>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card">
          <img class="card-img" src="img/blog5.png" alt="#">
          <div class="card-img-overlay">
            <a href="#" class="btn btn-light btn-sm">Escapadas</a>
          </div>
          <div class="card-body">
            <h4 class="card-title">Qué ver en Bruselas en 3 días.</h4>
           
            <p class="card-text"> Recomendaciones y consejos para no perderte sus lugares imprescindibles para visitar Belgica.
            </p>
            <a href="#" class="btn btn-info btn-warning">Más info</a>
          </div>
          <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
            <div i class="bi bi-calendar3"></i> 21/03/19 
            </div>
            <div class="stats">
               <i class="far fa-eye"></i> 19.476
              <i class="far fa-comment"></i> 12.297
            </div>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card">
          <img class="card-img" src="img/blog6.png" alt="#">
          <div class="card-img-overlay">
            <a href="#" class="btn btn-light btn-sm">Escapadas</a>
          </div>
          <div class="card-body">
            <h4 class="card-title">Qué ver en París en 3 días</h4>
            
            <p class="card-text">Un recorrido por  París. Los lugares más importantes que ver en la capital francesa.</p>
            <a href="#" class="btn btn-info btn-warning">Más info</a>
          </div>
          <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
            <div i class="bi bi-calendar3"></i> 06/03/19 
            </div>
            <div class="stats">
               <i class="far fa-eye"></i> 61.347
              <i class="far fa-comment"></i> 12.050
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>

</main>

  <?php include_once('vistas/footer.php'); ?>    

  <?php include_once('vistas/js.php'); ?>

  </body>
</html>
