<?php
session_start();
include_once('modelos/Cnx.php');

$db = new Cnx();
$conectar = $db->conectar();


$comando = $conectar->prepare("SELECT *
FROM opiniones ");
$comando->execute();
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

// <!-- paginado -->
			
			$articulos_x_pagina = 6;
			$total_articulos = $comando->rowCount();
			$paginas = $total_articulos / $articulos_x_pagina;
			$paginas = ceil($paginas);
			
			
			if (!$_GET || $_GET['pagina'] > $paginas || $_GET['pagina'] < 1) {
				header("Location: resenias.php?pagina=1");
			}

      $iniciar = ($_GET['pagina']-1)*$articulos_x_pagina;
      

      $sql_articulos = "SELECT o.*, c.id_compras, p.img
      FROM opiniones o
      INNER JOIN compras c ON o.id_compras = c.id_compras
      INNER JOIN productos p ON c.destino = p.destino LIMIT :iniciar, :articulos_x_pagina";
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
  <title>Dreamtravel. Reseñas</title>
 
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

<body>
    <main>
<?php 
    include_once('vistas/header.php'); 
    include_once('vistas/header_admin.php'); 
    ?>


<div class="container mt-5">
  <div class="row">
<?php
    // Modifica la consulta para obtener testimonios aleatorios
    $sql = 'SELECT o.*, c.id_compras, p.img
            FROM opiniones o
            INNER JOIN compras c ON o.id_compras = c.id_compras
            INNER JOIN productos p ON c.destino = p.destino
            ORDER BY RAND()
           
            ';

    $stmt = $conectar->query($sql);
    $testimonios = $stmt->fetchAll(PDO::FETCH_ASSOC);

   
        foreach ($resultado_art as $testimonio) {
       
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
              // Calificación almacenada en la base de datos (asumo que está en la columna 'calificacion')
              $calificacion = $testimonio['calificacion'];

              // Itera para imprimir las estrellas según la calificación
              for ($star = 1; $star <= 5; $star++) {
                // Compara la calificación para determinar si la estrella debe estar llena o vacía
                $estrellaLlena = $star <= $calificacion ? '&#9733;' : '&#9734;';

                // Imprime la estrella
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
    <!-- paginado -->
			
        
			<div class="clearfix container p-3">
				
				<ul class="pagination justify-content-center">
					<li class="page-item"><a class="<?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?> page-link"" href="resenias.php?pagina=<?php echo $anterior; ?>">Previous</a></li>
         

					<?php for ($i = 1; $i <= $paginas; $i++) : ?>
						
					<li class="page-item <?php echo $_GET['pagina']==$i ? 'active' : '' ?>"><a href="resenias.php?pagina=<?php echo $i ?>" class="page-link"><?php echo $i ?></a></li>
					
					<?php endfor ?>
					<li class="page-item"><a href="resenias.php?pagina=<?php echo $siguiente; ?>" class="<?php echo $_GET['pagina']>= $paginas ? 'disabled' : '' ?> page-link">Next</a></li>
					
				</ul>
			</div>
</main>

<?php include_once('vistas/footer.php'); ?>

<?php include_once('vistas/js.php'); ?>
    </body>
</html>