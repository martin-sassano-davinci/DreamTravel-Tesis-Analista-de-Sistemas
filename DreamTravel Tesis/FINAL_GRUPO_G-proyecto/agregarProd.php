<?php 
session_start();
if($_SESSION['user_role'] == 'admin'){
        
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/favicon.png">
    <title>Add product</title>
    <!-- Bootstrap core CSS -->
    <?php require_once("vistas/css.php") ?>
  </head>
  <body>

    <?php 
    require_once("vistas/header.php");
    ?>
    

    <div class="container">
        <a href="admin.php" class="btn btn-light mb-3 m-5"><< Go Back</a>
        
        <!-- Create Form -->
        <div class="card border-danger">
            <div class="card-header bg-danger text-white">
                <strong><i class="fa fa-plus"></i> Add New Product</strong>
            </div>
            <div class="card-body">
                <form action="addProd.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="destino" class="col-form-label">Destino</label>
                            <input type="text" class="form-control" id="destino" name="destino" placeholder="Destino" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="info" class="col-form-label">Info</label>
                            <textarea name="info" id="info" rows="5" class="form-control" placeholder="Info" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="precio" class="col-form-label">Precio</label>
                            <input type="number" class="form-control" min="1" id="precio" name="precio" placeholder="Precio" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="hospedaje" class="col-form-label">Hospedaje</label>
                            <input type="text" class="form-control" name="hospedaje" id="hospedaje"  placeholder="hospedaje" required>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-4">
                            <label for="estrellas_hotel" class="col-form-label">Estrellas Hotel</label>
                            <input type="number" min="2" max="7" class="form-control" name="estrellas_hotel"  id="estrellas_hotel" placeholder="estrellas_hotel" required>
                        </div>
                    

                    <div class="form-group col-md-4">
                            <label for="comidas" class="col-form-label">Comidas</label>
                            <input type="text" class="form-control" name="comidas"  id="comidas" placeholder="comidas" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="ideal" class="col-form-label">Ideal</label>
                            <input type="text" class="form-control" name="ideal"  id="ideal" placeholder="ideal" required >
                        </div>
                        
                    <div class="form-group col-md-4">
                            <label for="dias" class="col-form-label">Dias</label>
                            <input type="number" class="form-control" name="dias"  id="dias" placeholder="dias" min="2" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="aeropuerto" class="col-form-label">Aeropuerto</label>
                            <input type="text" class="form-control" name="aeropuerto" id="aeropuerto" placeholder="aeropuerto" required >
                        </div>

                        <div class="form-group col-md-4">
                            <label for="desde" class="col-form-label">Desde</label>
                            <input type="date" class="form-control" name="desde"  id="desde" >
                        </div>

                        <div class="form-group col-md-4">
                            <label for="hasta" class="col-form-label">Hasta</label>
                            <input type="date" class="form-control" name="hasta"  id="hasta" >
                        </div>
                    <div class="form-group col-md-4 mt-3">
                            <label for="archivo" class="col-form-label">Archivo</label>
                            <input type="file" class="form-control-file" name="archivo" id="archivo" required>
                        </div>
                        </div>
                    <br>
                    <button name="add" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button>
                </form>
            </div>
        </div>
        <!-- End create form -->
        <br>
    </div><!-- /.container -->
<?php 
}else{
    header("Location: login.php"); 
}
include("vistas/footer.php");
 ?>
<?php include("vistas/js.php") ?>
</body>
</html>