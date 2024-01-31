<?php 
    session_start();
    require_once('modelos/Cnx.php');      
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Carrito</title>
    <?php include_once('vistas/css.php'); ?>
  </head>
  <body>
    
    <?php include_once('vistas/header.php'); 

      if (!isset($_SESSION['user_role'])) {
		
        ?>
        <div class="text-center m-5">
          <h3 class="h1">Por favor, inicia sesión para ver el carrito.</h3>
        
          <a class="btn btn-lg btn-primary" href="registracion.php" >Registrate</a>
     
          <a class="btn btn-lg btn-primary" href="login.php" >Iniciar sesión</a>

       </div>
        <?php
      } else if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_SESSION['user_role'] == 'user'){

            
            function luhnAlgorithm($number) {
                $number = strrev(preg_replace('/[^\d]/', '', $number));
                $sum = 0;
            
                for ($i = 0, $j = strlen($number); $i < $j; $i++) {
                    $digit = (int) $number[$i];
            
                    if ($i % 2 === 1) {
                        $digit *= 2;
            
                        if ($digit > 9) {
                            $digit -= 9;
                        }
                    }
            
                    $sum += $digit;
                }
            
                return $sum % 10 === 0;
            }
            
        function validateExpirationDate($expirationDate)
        {
            // Obtener el primer día del mes actual
            $firstDayOfMonth = date("Y-m-01");

            // Convertir la fecha de expiración a un objeto DateTime
            $expirationDateTime = DateTime::createFromFormat('m/Y', $expirationDate);

            // Verificar si la fecha de expiración es válida y no es anterior al primer día del mes actual
            return $expirationDateTime !== false && $expirationDateTime >= new DateTime($firstDayOfMonth);
        }
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['realizarPago'])) {
                $tarjetaNombre = $_POST['tarjetaNombre'];
                $tarjetaNumero = $_POST['tarjetaNumero'];
                $tarjetaExpiracion = $_POST['tarjetaExpiracion'];
                $tarjetaCvv = $_POST['tarjetaCvv'];
            
                // Validar la tarjeta de crédito utilizando el algoritmo de Luhn
        
        $errores = [];
       
        // Validación para el nombre de la tarjeta
        if (empty($tarjetaNombre) || !preg_match("/^[a-zA-Z ]{6,}$/", $tarjetaNombre)) {
            // header("Location: tarjeta_nombre.php");
            $errores[] = "El nombre de la tarjeta debe contener solo letras y tener una longitud mínima de 6 caracteres.";
        }
        
        // Validación para el número de tarjeta (Luhn Algorithm)
        if (empty($tarjetaNumero) || !luhnAlgorithm($tarjetaNumero)) {
            // header("Location: tarjeta_numero.php");
            $errores[] = "El número de tarjeta no es válido.";
        }
        
        // Validación para la fecha de expiración
        if (empty($tarjetaExpiracion) || !validateExpirationDate($tarjetaExpiracion)) {
            
            // header("Location: tarjeta_expiracion.php");
            $errores[] = "La fecha de expiración no es válida o está vencida.";
        }
        
        // Validación para el CVV
        if (empty($tarjetaCvv) || !preg_match("/^[0-9]{3,4}$/", $tarjetaCvv)) {
            // header("Location: tarjeta_cvv.php");
            $errores[] = "El CVV debe contener solo números y tener una longitud entre 3 y 4 caracteres.";
        }
        
        // Verificar si hay errores
        if (!empty($errores)) {
            echo "
            <div class='container p-5 mt-4 mx-auto text-center'>
                <h2 class='mt-5'>Errores en el procesamiento del pago:</h2>
                <ul>";
            
            foreach ($errores as $error) {
                echo "<li class='alert alert-danger '>$error</li>";
            }
        
            echo "
                </ul>
                <p class='mt-4'>Por favor, verifica la información de tu tarjeta e inténtalo de nuevo.</p>
                <a href='carrito.php' class='btn btn-primary mt-3'>Volver al carrito</a>
            </div>
            ";
        } else {
            // Continuar con el procesamiento si no hay errores
$productosEnCarrito = isset($_POST['productosEnCarrito']) ? $_POST['productosEnCarrito'] : [];
$totalCompra = isset($_POST['totalCompra']) ? $_POST['totalCompra'] : 0;

$db = new Cnx();
$conectar = $db->conectar();

$id_usuario = $_SESSION['id_usuario'];

foreach ($productosEnCarrito as $idProducto) {
    // Obtener detalles del producto desde la base de datos
    $consultaDetalleCompra = $conectar->prepare("SELECT destino, precio, hospedaje, desde, hasta FROM productos WHERE id_prod = :idProd");
    $consultaDetalleCompra->bindParam(':idProd', $idProducto);
    $consultaDetalleCompra->execute();

    // Obtener el resultado de la consulta
    $resultado = $consultaDetalleCompra->fetch(PDO::FETCH_ASSOC);

    // Verificar si se obtuvo un resultado
    if ($resultado) {
        $precioUnitario = $resultado['precio'];
        $destino = $resultado['destino'];
        $fechaActual = date('Y-m-d H:i:s'); // Incluir la hora exacta de la compra
        $estadia = $resultado['desde'] . "/" . $resultado['hasta'];
        $hospedaje = $resultado['hospedaje'];

        // Preparar la consulta de inserción
        $consultaInsercion = $conectar->prepare("INSERT INTO compras (id_usu, destino, fecha_de_compra, estadia, hospedaje, precio, estado) VALUES (:idUsu, :destino, :fechacompra, :estadia, :hospedaje, :precioUnitario, 'Completado')");
        $consultaInsercion->bindParam(':idUsu', $id_usuario);
        $consultaInsercion->bindParam(':destino', $destino);
        $consultaInsercion->bindParam(':fechacompra', $fechaActual);
        $consultaInsercion->bindParam(':estadia', $estadia);
        $consultaInsercion->bindParam(':hospedaje', $hospedaje);
        $consultaInsercion->bindParam(':precioUnitario', $precioUnitario);

        // Ejecutar la consulta de inserción
        if ($consultaInsercion->execute()) {
            echo "
                    <div class='container p-5 mx-auto text-center'>
                        <p class='mt-5 alert alert-success text-center mx-auto'>Número de tarjeta de crédito válido. ¡Compra realizada con éxito!</p>
                        <a href='paquetes.php' class='btn btn-primary text-center mx-auto'>Ver más paquetes de viaje</a>
                    </div>
                    ";
                    unset($_SESSION['carrito']);
                    exit();
            
        } else {
            // Manejar el caso en el que la inserción falló
            echo "
            <div class='container p-5 mx-auto text-center'>
                        <p class='mt-5 alert alert-danger text-center mx-auto'>Error al realizar la compra. Volve a intentar.</p>                 
                    </div>
            ";
        }
    
}
            
                    
        }}} else {
            header("Location: paquetes.php"); 
        }
    
    ?>


    <section class="h-100 h-custom" style="background-color: #eee;">
        
    </section>

    <?php
        }
      } else{
        header("Location: index.php"); 
    }
    ?>
   
    <?php include_once('vistas/js.php'); ?>
  </body>
</html>

