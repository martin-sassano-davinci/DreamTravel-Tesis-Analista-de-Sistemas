<?php
require_once('modelos/Cnx.php');

function validarForm($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$cnx = new Cnx();
$conectar = $cnx->conectar();

$id = $_GET['id'];
$sql = 'SELECT destino, info, precio, aereos, hospedaje, comidas, cant_personas FROM productos WHERE id_prod = :id_prod';
$stmt = $conectar->prepare($sql);
$stmt->bindParam(":id_prod", $id);
$stmt->execute();
$prod = $stmt->fetch(PDO::FETCH_ASSOC);

$sql_img = 'SELECT img FROM productos WHERE id_prod = :id_prod';
$stmt_img = $conectar->prepare($sql_img);
$stmt_img->bindParam(":id_prod", $id);
$stmt_img->execute();
$res_img = $stmt_img->fetch(PDO::FETCH_ASSOC);


if(isset($_POST['update'])) 
     {
    
    $destino = validarForm($_POST['destino'] ?? null);
    $info = validarForm($_POST['info'] ?? null);
    $precio = validarForm($_POST['precio'] ?? null);
    $aereos = validarForm($_POST['aereos'] ?? null);
    $hospedaje = validarForm($_POST['hospedaje'] ?? null);
    $comidas = validarForm($_POST['comidas'] ?? null);
    $personas = validarForm($_POST['cant_personas'] ?? null);

    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {
    
        $info_img =  pathinfo($_FILES['archivo']['name']); //info de la imagen
        $extension = $info_img['extension']; //extension de la imagen
        $nombre_archivo = $info_img['filename']; //nombre de la imagen sin extension 
    
        $nombre_archivo = preg_replace("/[^A-Za-z0-9]/", "", $nombre_archivo); //eliminamos caracteres especiales, solo permite caracteres alfanumericos
    
        $time = time(); // tiempo transcurrido en segundos desde 1970-01-01
    
        $extensiones_permitidas = array('jpg', 'jpeg', 'png'); //extensiones permitidas
       
        if(in_array($extension, $extensiones_permitidas)){
    
            $origen = $_FILES['archivo']['tmp_name'];
            $destino_img = "img/{$nombre_archivo}_{$time}.{$extension}";
    
           move_uploaded_file( $origen, $destino_img);
    
            // $ruta = "img/".$nombre_archivo.".".$extension;
            // move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);
            // echo "Archivo subido correctamente";


  
  $sql = 'UPDATE productos SET destino = :destino, info = :info, precio = :precio, aereos = :aereos, hospedaje = :hospedaje, comidas = :comidas, cant_personas = :cant_personas, img = :img WHERE id_prod = :id_prod';
  $stmt = $conectar->prepare($sql);
    $stmt->bindParam(":destino", $destino);
    $stmt->bindParam(":info", $info);
    $stmt->bindParam(":precio", $precio);
    $stmt->bindParam(":aereos", $aereos);
    $stmt->bindParam(":hospedaje", $hospedaje);
    $stmt->bindParam(":comidas", $comidas);
    $stmt->bindParam(":cant_personas", $personas);
    $stmt->bindParam(":id_prod", $id);
    $stmt->bindParam(":img", $destino_img);
    $stmt->execute();
  if ($stmt->execute()) {

   
    header("Location: admin.php?status=updated");
  } else {
    header("Location: admin.php?status=fail_update");
  }

        }
    }
}

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/favicon.png">
    <title>Update</title>
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
                <strong> Update Product</strong>
            </div>
            <div class="card-body">
                <form  action='update.php?id=<?php echo $_GET['id'] ?>' method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="destino" class="col-form-label">Destino</label>
                            <input type="text" class="form-control" value="<?php echo $prod['destino']; ?>"  id="destino" name="destino"  required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="info" class="col-form-label">Info</label>
                            <textarea name="info" id="info" rows="5" class="form-control" required><?php echo $prod['info']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="precio" class="col-form-label">Precio</label>
                            <input type="number" class="form-control" min="1" value="<?php echo $prod['precio']; ?>" id="precio" name="precio"  required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="aereos" class="col-form-label">Aereos</label>
                            <input type="text" class="form-control" name="aereos" value="<?php echo $prod['aereos']; ?>" id="aereos"  required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="hospedaje" class="col-form-label">Hospedaje</label>
                            <input type="text" class="form-control" name="hospedaje" value="<?php echo $prod['hospedaje']; ?>" id="hospedaje" required>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-4">
                            <label for="comidas" class="col-form-label">Comidas</label>
                            <input type="text" class="form-control" name="comidas" value="<?php echo $prod['comidas']; ?>" id="comidas" required>
                        </div>
                    <div class="form-group col-md-4">
                            <label for="cant_personas" class="col-form-label">Personas</label>
                            <input type="number" class="form-control" min="1" name="cant_personas" value="<?php echo $prod['cant_personas']; ?>" id="cant_personas" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="archivo" class="col-form-label">Archivo</label>
                            <input type="file" class="form-control-file" name="archivo" id="archivo" required>
                        </div>
                        
                    <br>
                    <button name='update' class="btn btn-success"><i class="fa fa-check-circle"></i> Update</button>
                </form>
            </div>
        </div>
        <!-- End create form -->
        <br>
    </div><!-- /.container -->

<?php include("vistas/js.php") ?>
</body>
</html>





