


<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Dreamtravel. Paquetes</title>
 
  <style> 
      .pagination {
	  margin: 0 0 8px;
    
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
  
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
</style>
  <?php include_once('vistas/css.php'); ?>
</head>
<?php
session_start();
include_once('modelos/Cnx.php');

$db = new Cnx();
$conectar = $db->conectar();

$articulos_x_pagina = 6;

// Página actual
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Inicializar la variable de precio_usuario
$precio_usuario = isset($_GET['precio']) ? intval($_GET['precio']) : 10000; // Valor predeterminado

// Verificar si el formulario ha sido enviado (método POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el valor del precio desde el formulario
    $precio_usuario = isset($_POST['precio']) ? intval($_POST['precio']) : 10000; // Valor predeterminado 5000 si no se proporciona
}

// Calcular el punto de inicio para la consulta LIMIT
$iniciar = ($pagina_actual - 1) * $articulos_x_pagina;

// Consulta que incluye la condición de precio y la limitación de resultados
$sql_articulos = "SELECT * FROM productos WHERE precio <= :precio LIMIT :iniciar, :articulos_x_pagina";
$comando_art = $conectar->prepare($sql_articulos);
$comando_art->bindParam(":precio", $precio_usuario, PDO::PARAM_INT);
$comando_art->bindParam(":iniciar", $iniciar, PDO::PARAM_INT);
$comando_art->bindParam(":articulos_x_pagina", $articulos_x_pagina, PDO::PARAM_INT);
$comando_art->execute();

// Verificar si hay resultados
$resultado_art = $comando_art->fetchAll(PDO::FETCH_ASSOC);

if (!empty($resultado_art)) {
    $total_articulos = $conectar->query("SELECT COUNT(*) FROM productos WHERE precio <= $precio_usuario")->fetchColumn();
    $paginas = ceil($total_articulos / $articulos_x_pagina);

    // Verificar si la página actual es mayor que el total de páginas
    if ($pagina_actual > $paginas) {
        header("Location: presupuesto.php?pagina=1&precio=$precio_usuario");
        exit;
    }
} else {
include_once('vistas/css.php');  
include_once('vistas/header.php');
include_once('vistas/header_admin.php');
include_once('vistas/js.php');

    // Si no hay resultados, mostrar mensaje y salir del script
    echo '
    <div class="container p-5 text-center h2 text-danger mt-5"> 
    <p>No se encontraron resultados. Por favor, intenta de nuevo con otros filtros.</p>
    <a href="presupuesto.php" class="btn btn-primary text-center">Volver</a>
    </div>
    ';
    exit;
}
?>
<body>

<?php
include_once('vistas/header.php');
include_once('vistas/header_admin.php');
?>

<main>
    
    <div class="container mt-2">
        <form action="" method="post" class="justify-content-center p-3">
            <div class="form-row">
                <div class="col-8 m-2 mx-auto">
                    <label class="m-1" for="precio">Ingrese el precio máximo:</label>
                    <input type="number" class="form-control" id="precio" name="precio" value="<?php echo $precio_usuario; ?>" min="0" required>
                </div>
                <div class="col-4 m-2 mx-auto">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>
    </div>

    <div container class="container p-0">
        <?php if (!empty($resultado_art)) : ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($resultado_art as $row) : ?>
                    <div class="col">
    <div class="card prod" data-id="<?php echo $row['id_prod']?>">
        <div class="position-relative">
            <img src="<?php echo $row['img'] ?>" class="img-fluid w-100">
          
            <a href="#" class="btn btn-light btn-floating position-absolute bottom-0 start-0 m-3" style="pointer-events: none;">
               <span class="h6" style="color: purple;"> <?php echo $row['dias']; ?> Días / <?php echo $row['dias'] - 1; ?> Noches</span>
            </a>
        </div>

        <div class="card-body">
            <h5 class="card-title h4"><?php echo $row['destino']; ?></h5>
            <!-- <p class="card-text"><?php echo $row['info']; ?></p>  -->
            
            <p class="card-text">
    Desde <span class="fw-bold"><?php echo $row['desde']; ?></span> hasta <span class="fw-bold"><?php echo $row['hasta']; ?></span>
</p>
            <small class="text-muted cat">
            <i class="fas fa-plane"></i> Vuelo directo <span>BUE</span> <span class="custom-icon">
  <i class="bi bi-arrow-left-right"></i>               

</span> <span><?php echo $row['aeropuerto']; ?></span><br>


<i class="fas fa-bed"></i> <?php echo $row['hospedaje']; ?></small> <?php
$estrellas_hotel = $row['estrellas_hotel'];

// Imprimir estrellas
for ($i = 0; $i < $estrellas_hotel; $i++) {
    echo '&#9734;';
}
?> <br>
<small class="text-muted cat">
<i class="fas fa-utensils"></i> <?php echo $row['comidas']; ?><br>
<i class="bi bi-people-fill"></i> Ideal para <?php echo $row['ideal']; ?> 
</small> 

        </div>

        <div class="card-footer">
            <small class="text-muted cat">
                <span class="h6" >Precio final por persona</span>
            </small>
            
            <div class="d-flex align-items-center justify-content-between">
                <p class="mt-1 h4">
                    $ <span class="h4"><?php echo $row['precio']; ?> USD</span>
                </p>

                <div class="d-flex align-items-center">
                    <!-- <a href="#" class="btn btn-primary btn-sm mx-2">Ver detalle</a> -->
                    <form method="post" action="carrito.php">
                        <input type="hidden" name="id" value="<?php echo $row['id_prod']; ?>">
                        <button type="submit" class="btn btn-sm btn-warning" name="agregarCarrito">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <div class="text-center h2 text-danger mt-5">No se encontraron resultados. Por favor, intenta de nuevo con otros filtros.</div>
        <?php endif; ?>
    </div>

    <!-- paginado -->
    <div class="clearfix container">
        <?php if ($paginas > 1) : ?>
            <ul class="pagination justify-content-center">
                <li class="page-item <?php echo $pagina_actual <= 1 ? 'disabled' : ''; ?>">
                    <a class="page-link" href="presupuesto.php?pagina=<?php echo max($pagina_actual - 1, 1); ?>&precio=<?php echo $precio_usuario; ?>">Previous</a>
                </li>
                <?php for ($i = 1; $i <= $paginas; $i++) : ?>
                    <li class="page-item <?php echo $pagina_actual == $i ? 'active' : ''; ?>">
                        <a href="presupuesto.php?pagina=<?php echo $i; ?>&precio=<?php echo $precio_usuario; ?>" class="page-link"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php echo $pagina_actual >= $paginas ? 'disabled' : ''; ?>">
                    <a href="presupuesto.php?pagina=<?php echo min($pagina_actual + 1, $paginas); ?>&precio=<?php echo $precio_usuario; ?>" class="page-link">Next</a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</main>

<?php include_once('vistas/footer.php'); ?>
<?php include_once('vistas/js.php'); ?>
<script src="paquetes.js"></script>
</body>

</html>