

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

    <?php require_once("vistas/header.php") ?>

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
                            <label for="aereos" class="col-form-label">Aereos</label>
                            <input type="text" class="form-control" name="aereos" id="aereos" placeholder="Aereos" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="hospedaje" class="col-form-label">Hospedaje</label>
                            <input type="text" class="form-control" name="hospedaje" id="hospedaje" placeholder="Hospedaje" required>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-4">
                            <label for="comidas" class="col-form-label">Comidas</label>
                            <input type="text" class="form-control" name="comidas" id="comidas" placeholder="Comidas" required>
                        </div>
                    <div class="form-group col-md-4">
                            <label for="personas" class="col-form-label">Personas</label>
                            <input type="number" class="form-control" min="1" name="personas" id="personas" placeholder="Personas" required>
                        </div>
                    <div class="form-group col-md-4">
                            <label for="archivo" class="col-form-label">Archivo</label>
                            <input type="file" class="form-control-file" name="archivo" id="archivo" required>
                        </div>
                        
                    <br>
                    <button name="add" class="btn btn-success"><i class="fa fa-check-circle"></i> Save</button>
                </form>
            </div>
        </div>
        <!-- End create form -->
        <br>
    </div><!-- /.container -->
<?php include("vistas/footer.php") ?>
<?php include("vistas/js.php") ?>
</body>
</html>