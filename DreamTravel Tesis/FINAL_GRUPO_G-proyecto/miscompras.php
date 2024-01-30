

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Mis Compras</title>
  

    <?php include_once('vistas/css.php'); ?>

    <style>
      .padding {
        margin-left: 1.5rem;
      }
      .badge {
        color: green !important;
      }
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
  </head>
  <body>
    <?php 
    session_start();
    if (!isset($_SESSION['user_role'])) {
		
      ?>
      <div class="text-center m-5">
        <h3 class="h1">Por favor, inicia sesión para ver esta seccion.</h3>
      
        <a class="btn btn-lg btn-primary" href="registracion.php" >Registrate</a>
   
        <a class="btn btn-lg btn-primary" href="login.php" >Iniciar sesión</a>
  
     </div>
      <?php
    } else {
      if($_SESSION['user_role'] == 'user'){

    include_once('config/config.php');
    
    

    
	
    ?>

<?php
include_once('modelos/Cnx.php');

$db = new Cnx();
$conectar = $db->conectar();

$id_usuario = $_SESSION['id_usuario'];


$stmt = $conectar->prepare("SELECT * FROM compras WHERE id_usu = :idUsu");
$stmt->execute(array(':idUsu' => $id_usuario));
$compras = $stmt->fetchAll(PDO::FETCH_ASSOC);

// <!-- paginado -->
			
$articulos_x_pagina = 8;
$total_articulos = $stmt->rowCount();
$paginas = $total_articulos / $articulos_x_pagina;
$paginas = ceil($paginas);


if (!$_GET || $_GET['pagina'] > $paginas || $_GET['pagina'] < 1) {
  header("Location: miscompras.php?pagina=1");
}

$iniciar = ($_GET['pagina']-1)*$articulos_x_pagina;


$sql_articulos = "SELECT * FROM compras WHERE id_usu = :idUsu LIMIT :iniciar, :articulos_x_pagina";
$comando_art = $conectar->prepare($sql_articulos);
$comando_art->bindParam(":idUsu", $id_usuario, PDO::PARAM_INT);
$comando_art->bindParam(":iniciar", $iniciar, PDO::PARAM_INT);
$comando_art->bindParam(":articulos_x_pagina", $articulos_x_pagina, PDO::PARAM_INT);

$comando_art->execute();
$resultado_art = $comando_art->fetchAll(PDO::FETCH_ASSOC);

$anterior = $_GET['pagina'] - 1;



$siguiente = $_GET['pagina'] + 1;
include_once('vistas/header.php'); 
include_once('vistas/header_admin.php'); 
?>

<div class="container mt-5">
    <h2 class="text-center">Mis Compras</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Orden</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Fecha de Compra</th>
                    <th scope="col">Estadia</th>
                    <th scope="col">Hospedaje</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mostrar resultados de la consulta
                $orden = 1;
                if (!empty($compras)) {
                    foreach ($resultado_art as $compra) {
                        echo "<tr>
                                <th scope='row'>" . $orden . "</th>
                                <td>" . $compra["destino"] . "</td>
                                <td>" . $compra["fecha_de_compra"] . "</td>
                                <td>" . $compra["estadia"] . " </td>
                                <td>" . $compra["hospedaje"] . " </td>
                                <td>$" . $compra["precio"] . " USD</td>
                                <td><span class='badge'>" . $compra["estado"] . "</span></td>
                            </tr>";
                        $orden++;
                    }
                } else {
                    echo "<tr><td colspan='4'>No has realizado ninguna compra</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <!-- paginado -->
			
        
        <div class="clearfix container p-3">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''; ?>" href="miscompras.php?pagina=<?php echo $anterior; ?>">Previous</a>
        </li>

        <?php for ($i = 1; $i <= $paginas; $i++) : ?>
            <li class="page-item <?php echo $_GET['pagina'] == $i ? 'active' : ''; ?>">
                <a href="miscompras.php?pagina=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>

        <li class="page-item">
            <a href="miscompras.php?pagina=<?php echo $siguiente; ?>" class="page-link <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''; ?>">Next</a>
        </li>
    </ul>
</div>

   <?php include_once('vistas/js.php'); 
      }} 
   ?>
</body>
</html>
    