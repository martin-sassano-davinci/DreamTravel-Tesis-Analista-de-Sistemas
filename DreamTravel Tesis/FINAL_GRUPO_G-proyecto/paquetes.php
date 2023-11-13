<?php
session_start();
include_once('modelos/Cnx.php');

$db = new Cnx();
$conectar = $db->conectar();
// $query = $conectar->query("SELECT * FROM productos");
// $query->execute();
// $productos = $query->fetchAll(PDO::FETCH_ASSOC);
// echo $productos;
// $consulta = $conectar=>prepare("SELECT * FROM productos"); realizar consulta
// $consulta->execute(); ejecutar consulta
// $consulta->fetchAll(PDO::FETCH_ASSOC); obtener resultados asociativos (default si ponemos fetchAll())
// $consulta->fetchAll(PDO::FETCH_OBJ); obtener resultados objetos
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
</style>
  <?php include_once('vistas/css.php'); ?>
</head>

<body>

<?php 
    include_once('vistas/header.php'); 
    include_once('vistas/header_admin.php'); 
    ?>

  <main>
    <div container class="container p-5">
      <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php
        foreach ($resultado_art as $row) {
        ?>

          <div class="col">


            <div class="card prod" data-id="<?php echo $row['id_prod']?>">
              <img src="<?php echo $row['img'] ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['destino']; ?></h5>
                <p class="card-text"><?php echo $row['info']; ?></p>
                <p><a class="btn btn-info btn-sm btn-dark" style="pointer-events: none;">$<?php echo $row['precio']; ?> USD</a> <a class="btn btn-sm btn-primary btn-warning" href="compra.php">Agregar al carrito</a></p>
              </div>
              <div class="card-footer">
                <small class="text-muted cat">
                  <i class="fas fa-plane"></i> <?php echo $row['aereos']; ?> <br>
                  <i class="fas fa-bed"></i> <?php echo $row['hospedaje']; ?><br>
                  <i class="fas fa-utensils"></i> <?php echo $row['comidas']; ?><br>
                  <i class="bi bi-people-fill"></i> <?php echo $row['cant_personas']; ?> personas
                </small>
              </div>
            </div>
          </div>
          <?php } ?>
          </div>
          </div>

        


        <!-- paginado -->
			
        
			<div class="clearfix container">
				
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