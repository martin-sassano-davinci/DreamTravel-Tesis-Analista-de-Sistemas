<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Dreamtravel. Buscar</title>
 
  
</style>
  <?php include_once('vistas/css.php'); ?>
</head>

<?php
session_start();
require_once('modelos/Cnx.php');
?>

<body>
<?php
include_once('vistas/header.php'); 
include_once('vistas/header_admin.php'); 

$db = new Cnx();
$conn = $db->conectar();

// Verificar si se ha enviado una consulta
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si se ha enviado una búsqueda mediante POST
    if (isset($_POST['q'])) {
        $query = $_POST['q'];

        // Realizar la búsqueda en tu base de datos o donde almacenes la información
        // Aquí puedes usar la variable $query para buscar en tu base de datos

        // Ejemplo: buscar en la tabla 'productos'
        if (!empty($query)) {
            $sql = "SELECT * FROM productos WHERE destino LIKE :query";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':query', '%' . $query . '%');
            $stmt->execute();

            // Obtener los resultados de la búsqueda
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Puedes mostrar los resultados como desees

            if(!$resultados){
              echo "
              <div class='container p-5 mx-auto text-center mt-5'>
              <p class='mt-5 alert alert-danger text-center mx-auto'>No se han encontrado destinos, intenta de nuevo con otro.</p>
              <a href='paquetes.php' class='btn btn-primary text-center mx-auto'>Ver más paquetes de viaje</a>
          </div>
              ";
            } else {
              echo '<div container class="container p-0 mt-5">
                      <div class="row row-cols-1 row-cols-md-3 g-4">';
          
              foreach ($resultados as $row) {
                  echo '<div class="col">
                          <div class="card prod" data-id="' . $row['id_prod'] . '">
                              <div class="position-relative">
                                  <img src="' . $row['img'] . '" class="img-fluid w-100">
                              
                                  <a href="#" class="btn btn-light btn-floating position-absolute bottom-0 start-0 m-3" style="pointer-events: none;">
                                      <span class="h6" style="color: purple;">' . $row['dias'] . ' Días / ' . ($row['dias'] - 1) . ' Noches</span>
                                  </a>
                              </div>
                      
                              <div class="card-body">
                                  <h5 class="card-title h4">' . $row['destino'] . '</h5>
                                  <!-- <p class="card-text">' . $row['info'] . '</p>  -->
                                  
                                  <p class="card-text">
                                      Desde <span class="fw-bold">Vie 07 Jun</span> hasta <span class="fw-bold">Dom 16 Jun</span>
                                  </p>
                                  <small class="text-muted cat">
                                      <i class="fas fa-plane"></i> Vuelo directo <span>BUE</span> 
                                      <span class="custom-icon">
                                          <i class="bi bi-arrow-left-right"></i>                              
                                      </span> 
                                      <span>' . $row['aeropuerto'] . '</span><br>
                                  
                                      <i class="fas fa-bed"></i> ' . $row['hospedaje'] . '</small>';
          
                  $estrellas_hotel = $row['estrellas_hotel'];
          
                  // Imprimir estrellas
                  echo '<small class="text-muted cat">';
                  for ($i = 0; $i < $estrellas_hotel; $i++) {
                      echo '&#9734;';
                  }
                  echo '<br>
                      <i class="fas fa-utensils"></i> ' . $row['comidas'] . '<br>
                      <i class="bi bi-people-fill"></i> Ideal para ' . $row['ideal'] . '
                      </small> 
                  </div>
          
                  <div class="card-footer">
                      <small class="text-muted cat">
                          <span class="h6" >Precio final por persona</span>
                      </small>
                      
                      <div class="d-flex align-items-center justify-content-between">
                          <p class="mt-1 h4">
                              $ <span class="h4">' . $row['precio'] . ' USD</span>
                          </p>
          
                          <div class="d-flex align-items-center">
                              <form method="post" action="carrito.php">
                                  <input type="hidden" name="id" value="' . $row['id_prod'] . '">
                                  <button type="submit" class="btn btn-sm btn-warning" name="agregarCarrito">Agregar al carrito</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>';
          }
          
          echo '</div>
                </div>';
          }
           
        } else {
            // Si no se ha enviado un término de búsqueda válido, puedes mostrar un mensaje o redirigir a la página principal, por ejemplo
            echo "
            <div class='container p-5 mx-auto text-center mt-5'>
              <p class='mt-5 alert alert-danger text-center mx-auto'>Ingresa un término de búsqueda válido.</p>
              <a href='paquetes.php' class='btn btn-primary text-center mx-auto'>Ver más paquetes de viaje</a>
            </div>
            ";
        }
    } else {
        // Si no se ha enviado una consulta, puedes mostrar un mensaje o redirigir a la página principal, por ejemplo
        echo "
        <div class='container p-5 mx-auto text-center mt-5'>
          <p class='mt-5 alert alert-danger text-center mx-auto'>Ingresa un término de búsqueda válido.</p>
          <a href='paquetes.php' class='btn btn-primary text-center mx-auto'>Ver más paquetes de viaje</a>
        </div>
        ";
    }
}else{
  header("Location: login.php"); 
}
 include_once('vistas/js.php');

?>
</body>

</html>