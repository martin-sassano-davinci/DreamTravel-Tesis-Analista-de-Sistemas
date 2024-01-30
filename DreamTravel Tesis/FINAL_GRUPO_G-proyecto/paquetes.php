<?php
session_start();
include_once('modelos/Cnx.php');

$db = new Cnx();
$conectar = $db->conectar();

$comando = $conectar->prepare("SELECT * FROM productos");
$comando->execute();
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

// <!-- paginado -->
			
			$articulos_x_pagina = 6;
			$total_articulos = $comando->rowCount();
			$paginas = $total_articulos / $articulos_x_pagina;
			$paginas = ceil($paginas);
			
			
			if (!$_GET || $_GET['pagina'] > $paginas || $_GET['pagina'] < 1) {
				header("Location: paquetes.php?pagina=1");
			}

      $iniciar = ($_GET['pagina']-1)*$articulos_x_pagina;
      

      $sql_articulos = "SELECT * FROM productos LIMIT :iniciar, :articulos_x_pagina";
      $comando_art = $conectar->prepare($sql_articulos);
      $comando_art->bindParam(":iniciar", $iniciar, PDO::PARAM_INT);
      $comando_art->bindParam(":articulos_x_pagina", $articulos_x_pagina, PDO::PARAM_INT);
      $comando_art->execute();
      $resultado_art = $comando_art->fetchAll(PDO::FETCH_ASSOC);
	 
			$anterior = $_GET['pagina'] - 1;


			
			$siguiente = $_GET['pagina'] + 1;
			
	
			
?>


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
.custom-icon {
  font-size: 0.7rem; 
}
</style>
  <?php include_once('vistas/css.php'); ?>
</head>

<body>

<?php 
    include_once('vistas/header.php'); 
    include_once('vistas/header_admin.php'); 
    ?>

  <main>
  <div container class="container  m-5 mx-auto text-center">
    <a href="presupuesto.php" class="btn btn-primary m-2">Calcular presupuesto</a>
    <a href="conversorDivisas.php" class="btn btn-primary">Calcular divisa de Peso Argentino a Usd/Euro</a>
  </div>
    <div container class="container p-0">
      <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php
        foreach ($resultado_art as $row) {
        ?>

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
<?php } ?>
</div>
</div>

        


        <!-- paginado -->
			
        
			<div class="clearfix container p-3">
				
				<ul class="pagination justify-content-center">
					<li class="page-item"><a class="<?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?> page-link"" href="paquetes.php?pagina=<?php echo $anterior; ?>">Previous</a></li>
         

					<?php for ($i = 1; $i <= $paginas; $i++) : ?>
						
					<li class="page-item <?php echo $_GET['pagina']==$i ? 'active' : '' ?>"><a href="paquetes.php?pagina=<?php echo $i ?>" class="page-link"><?php echo $i ?></a></li>
					
					<?php endfor ?>
					<li class="page-item"><a href="paquetes.php?pagina=<?php echo $siguiente; ?>" class="<?php echo $_GET['pagina']>= $paginas ? 'disabled' : '' ?> page-link">Next</a></li>
					
				</ul>
			</div>
        
  </main>

  <?php include_once('vistas/footer.php'); ?>

  <?php include_once('vistas/js.php'); ?>
  
</body>

</html>