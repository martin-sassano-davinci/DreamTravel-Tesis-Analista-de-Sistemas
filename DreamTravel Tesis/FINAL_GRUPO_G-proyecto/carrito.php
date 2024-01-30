<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Carrito</title>

    <?php 
    session_start();
    include_once('vistas/css.php'); 
    require_once('modelos/Cnx.php');

    
?>
  </head>
  <body>
    
    <?php include_once('vistas/header.php'); ?>

    <?php
      if (!isset($_SESSION['user_role'])) {
		
        ?>
        <div class="text-center m-5">
          <h3 class="h1">Por favor, inicia sesión para ver el carrito.</h3>
        
          <a class="btn btn-lg btn-primary" href="registracion.php" >Registrate</a>
     
          <a class="btn btn-lg btn-primary" href="login.php" >Iniciar sesión</a>

       </div>
        <?php
      } else {
        if($_SESSION['user_role'] == 'user'){

    // Inicializar $_SESSION['carrito'] si no está definido
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    
    // Función para agregar un producto al carrito
    
    function agregarAlCarrito($id) {
        // Verificar si el producto ya está en el carrito
        
            $_SESSION['carrito'][] = $id;
        
    }

    // Verifica si se está agregando un producto al carrito
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['agregarCarrito'])) {
        agregarAlCarrito($_POST['id']);
    }
    

    // Función para obtener detalles de productos en el carrito desde la base de datos
function obtenerProductosEnCarrito() {
    
    // Obtener detalles de productos en el carrito desde la base de datos
    $productosEnCarrito = [];
    $db = new Cnx();
    $conexion = $db->conectar();
    foreach ($_SESSION['carrito'] as $id) {
        $producto = obtenerProductoPorId($conexion, $id);
        $productosEnCarrito[] = $producto;
    }

    return $productosEnCarrito;

}

// Función para obtener detalles de un producto por ID desde la base de datos
function obtenerProductoPorId($conexion, $id) {
// Consulta SQL para obtener el producto por ID
if ($conexion) {
    // Consulta SQL para obtener el producto por ID
    $consulta = $conexion->prepare('SELECT * FROM productos WHERE id_prod = :id');
    $consulta->bindParam(':id', $id);
    $consulta->execute();

    // Obtener el resultado como un array asociativo
    return $consulta->fetch(PDO::FETCH_ASSOC);
} else {
    // Manejar el caso de una conexión nula (puedes personalizar este mensaje)
    return array('error' => 'No se pudo conectar a la base de datos');
}
}



// Verificar si se ha enviado una solicitud para eliminar un producto
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['eliminar_id'])) {
    $idEliminar = $_GET['eliminar_id'];

    // Obtener el índice del producto en el carrito
    $indiceEliminar = array_search($idEliminar, $_SESSION['carrito']);

    // Eliminar el producto del carrito si se encuentra
    if ($indiceEliminar !== false) {
        unset($_SESSION['carrito'][$indiceEliminar]);
    }
}

    // Obtener detalles de productos en el carrito
    $productosEnCarrito = obtenerProductosEnCarrito();

    // Función para calcular el total de los productos en el carrito
function calcularTotal($productosEnCarrito) {
    $total = 0;
    
    foreach ($productosEnCarrito as $producto) {
        $total += $producto['precio'];
    }
    
    return number_format($total, 2);
    }
    
    
    $total = calcularTotal($productosEnCarrito);
    
    
            
      
    
    

    ?>

<main>
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col m-0 p-0">
                    <div class="card ">
                        <div class="card-body">

                            <div class="row ">

                                <div class="col-lg-7 ">
                                    <h5 class="mb-3"><a href="paquetes.php" class="text-body"><i
                                                class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-1">Shopping cart</p>
                                            <p class="mb-0">You have <?php echo count($productosEnCarrito); ?> items in your cart</p>
                                        </div>
                                    </div>

                                    <?php foreach ($productosEnCarrito as $producto) { ?>
    <div class="card mb-3" data-id="<?php echo $producto['id_prod']; ?>">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <img src="<?php echo $producto['img']; ?>" class="img-fluid rounded-3" alt="Shopping item">
                </div>
                <div class="col-md-8">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5><?php echo $producto['destino']; ?></h5>
                            <p class="small text-muted cat">
                            <i class="fas fa-plane"></i> Vuelo directo <span>BUE</span> <span class="custom-icon">
  <i class="bi bi-arrow-left-right"></i>               

</span> <span><?php echo $producto['aeropuerto']; ?></span><br> 
                                <i class="fas fa-bed"></i> <?php echo $producto['hospedaje'];?> 
                                <?php  $estrellas_hotel = $producto['estrellas_hotel'];

// Imprimir estrellas
for ($i = 0; $i < $estrellas_hotel; $i++) {
    echo '&#9734;';
}
?> <br> 
                                <i class="fas fa-utensils"></i> <?php echo $producto['comidas']; ?> <br>
                                <i class="bi bi-people-fill"></i> Ideal para <?php echo $producto['ideal']; ?> <br>
                                <i class="bi bi-clock"></i> <?php echo $producto['dias']; ?> Días / <?php echo $producto['dias'] - 1; ?> Noches<br>
                                <i class="bi bi-calendar-check"></i> <?php echo $producto['desde']; ?> - <?php echo $producto['hasta']; ?>
                            </p>
                        </div>
                        <div class="d-flex flex-column">
                            <p class="mb-2">
                                <span class="fw-normal">Cantidad:</span> 1
                            </p>
                            <p class="mb-2">
                                <span class="fw-normal">Precio:</span> $<?php echo number_format($producto['precio'], 2); ?> USD
                            </p>
                            <a href="?eliminar_id=<?php echo $producto['id_prod']; ?>" class="btn btn-danger">Eliminar <i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

                                </div>
                                <div class="col-lg-5">

                                    <div class="card bg-secondary text-white rounded-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <h5 class="mb-0">Card details</h5>
                                            </div>

                                            <p class="small mb-2">Card type</p>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-visa fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-amex fa-2x me-2"></i></a>
                                            <!-- <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-paypal fa-2x"></i></a> -->

                                                    <form class="mt-4" action="procesar_pago.php" method="post">
                                                    <?php foreach ($productosEnCarrito as $producto) { ?>
        <input type="hidden" name="productosEnCarrito[]" value="<?php echo $producto['id_prod']; ?>">
    <?php } ?>

    <input type="hidden" name="totalCompra" value="<?php echo $total; ?>">
    <div class="form-outline form-white mb-4">
        <input type="text" name="tarjetaNombre" id="tarjetaNombre" class="form-control form-control-lg"
            size="17" placeholder="Cardholder's Name" />
        <label class="form-label" for="tarjetaNombre">Cardholder's Name</label>
    </div>

    <div class="form-outline form-white mb-4">
        <input type="text" name="tarjetaNumero" id="tarjetaNumero" class="form-control form-control-lg"
            size="17" placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" oninput="formatCardNumber()" required />
        <label class="form-label" for="tarjetaNumero">Card Number</label>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-outline form-white">
                <input type="text" name="tarjetaExpiracion" id="tarjetaExpiracion"
                    class="form-control form-control-lg" placeholder="MM/YYYY"
                    size="7" minlength="7" maxlength="7" oninput="formatExpirationDate(this)" required />
                <label class="form-label" for="tarjetaExpiracion">Expiration</label>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-outline form-white">
                <input type="password" name="tarjetaCvv" id="tarjetaCvv"
                    class="form-control form-control-lg"
                    placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3"
                    maxlength="3" />
                <label class="form-label" for="tarjetaCvv">Cvv</label>
            </div>
        </div>
    </div>

                                                <button type="submit" name="realizarPago" id="realizarPago"
                                                    class="btn btn-info btn-block btn-lg btn-warning"
                                                    <?php echo count($productosEnCarrito) == 0 ? 'disabled' : ''; ?>>
                                                    <div class="d-flex justify-content-between">
                                                        <span>$<?php echo count($productosEnCarrito) != 0 ? number_format((float)str_replace(',', '', $total), 2, '.', ',') : '0.00  '; ?></span>
                                                        <span class="ms-2">Checkout <i
                                                                class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                    </div>
                                                </button>
                                            </form>
                                        </div>
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

    <?php
        }
      }
    ?>
    
    
    <script>
    function formatCardNumber() {
        var cardNumberInput = document.getElementById('tarjetaNumero');
        var cardNumber = cardNumberInput.value.replace(/\s/g, ''); // Eliminar espacios en blanco
        var formattedCardNumber = '';

        for (var i = 0; i < cardNumber.length; i += 4) {
            formattedCardNumber += cardNumber.slice(i, i + 4) + ' ';
        }

        // Eliminar el espacio adicional al final
        formattedCardNumber = formattedCardNumber.trim();

        // Establecer el valor formateado de nuevo en el campo de entrada
        cardNumberInput.value = formattedCardNumber;
    }
    function formatExpirationDate(input) {
        var expirationDate = input.value.replace(/\s/g, ''); // Eliminar espacios en blanco

        // Asegurarse de que solo se permiten números
        expirationDate = expirationDate.replace(/\D/g, '');

        // Formatear MMYYYY
        if (expirationDate.length > 2) {
            expirationDate = expirationDate.substring(0, 2) + '/' + expirationDate.substring(2);
        }

        // Establecer el valor formateado de nuevo en el campo de entrada
        input.value = expirationDate;
    }
</script>
    <?php include_once('vistas/js.php'); ?>
  </body>
</html>

