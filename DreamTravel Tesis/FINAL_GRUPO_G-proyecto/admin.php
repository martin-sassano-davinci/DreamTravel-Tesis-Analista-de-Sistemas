<?php
session_start();

include_once('modelos/Cnx.php');

$db = new Cnx();
 $conectar = $db->conectar();
 $comando = $conectar->prepare("SELECT id_prod, destino, info, precio, aereos, hospedaje, comidas, cant_personas FROM productos");
$comando->execute();
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
// $query = $conectar->query("SELECT * FROM productos");
// $query->execute();
// $productos = $query->fetchAll(PDO::FETCH_ASSOC);
// $consulta = $conectar=>prepare("SELECT * FROM productos"); realizar consulta
// $consulta->execute(); ejecutar consulta
// $consulta->fetchAll(PDO::FETCH_ASSOC); obtener resultados asociativos (default si ponemos fetchAll())
// $consulta->fetchAll(PDO::FETCH_OBJ); obtener resultados objetos

	// if (!$_SESSION['user_role'] = 'admin') {
	// 	header("Location: index.php"); 
	// }
	// if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'){
	// 	echo "Bienvenido Admin!";
	// } else {
	// 	header("Location: index.php");
	// }
	if (!isset($_SESSION['user_role'])) {
		header('location: login.php');
	} else {
		if($_SESSION['user_role'] != 'admin'){
			header('location: login.php');
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Admin panel</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<style>
   
.table-responsive {
    margin: 30px 0;
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
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
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    

/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
.pad{
	padding-top: 75px;
}
</style>



</head>
<body>


<?php require_once('vistas/header_admin.php'); ?>


<div class="container-xl pad">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2> <b>ADMINISTRADOR</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="agregarProd.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Agregar </span></a>									
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
			<div class="container">

			<!-- prod eliminado -->
        <?php if (isset($_GET['status']) && $_GET['status'] == "deleted") : ?>
        <div class="alert alert-success" role="alert">
            <strong>Producto eliminado.</strong>
        </div>
        <?php endif ?>

		<!-- prod fallo al eliminar -->
        <?php if (isset($_GET['status']) && $_GET['status'] == "fail_delete") : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Error al eliminar el producto.</strong>
        </div>
        <?php endif ?>
		
		<!-- prod creado -->
		<?php if (isset($_GET['status']) && $_GET['status'] == "created") : ?>
        <div class="alert alert-success" role="alert">
            <strong>Producto agregado.</strong>
        </div>
        <?php endif ?>

		<!-- prod error al crear -->
        <?php if (isset($_GET['status']) && $_GET['status'] == "fail_create") : ?>
        <div class="alert alert-danger" role="alert">
            <strong>Error al agregar producto.</strong>
        </div>
        <?php endif ?>

		<!-- prod editado -->
		<?php if (isset($_GET['status']) && $_GET['status'] == "updated") : ?>
		<div class="alert alert-success" role="alert">
			<strong>Producto editado.</strong>
			</div>
		<?php endif ?>

		<!-- prod error al editar -->
		<?php if (isset($_GET['status']) && $_GET['status'] == "fail_update") : ?>
		<div class="alert alert-danger" role="alert">
			<strong>Error al editar producto.</strong>
			</div>
		<?php endif ?>
				<thead>
					<tr>
						<th>
							
						</th>
                        <td>Prod</td>
						<th>Titulo</th>
						<th>Info</th>
						<th>Precio</th>						
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php
                            foreach ($resultado as $row) {
                            ?>

					<tr>
						<td>
						
						</td>
                        <td><?php echo $row['id_prod'] ?></td>
						<td><?php echo $row['destino']; ?></td>
						<td><?php echo $row['info']; ?></td>
						<td>$ <?php echo $row['precio']; ?> USD</td>
						
						<td>
							<a href="update.php?id=<?= $row['id_prod'] ?>" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<!-- <a href="update.php?id=<?= $row['id_prod'] ?>" class="btn btn-info">Edit</a> -->
							<a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $row['id_prod'] ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							
						</td>
					</tr>
					<?php } ?>
					
				</tbody>
			</table>

			
	
<?php require_once('vistas/js.php'); ?>

</body>
</html>