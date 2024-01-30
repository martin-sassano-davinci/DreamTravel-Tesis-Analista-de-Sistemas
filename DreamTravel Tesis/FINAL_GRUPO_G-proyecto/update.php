<?php
require_once('modelos/Cnx.php');
session_start();
function validarForm($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if($_SESSION['user_role'] == 'admin'){
$cnx = new Cnx();
$conectar = $cnx->conectar();

$id = $_GET['id'];
$sql = 'SELECT * FROM productos WHERE id_prod = :id_prod';
$stmt = $conectar->prepare($sql);
$stmt->bindParam(":id_prod", $id);
$stmt->execute();
$prod = $stmt->fetch(PDO::FETCH_ASSOC);

$sql_img = 'SELECT img FROM productos WHERE id_prod = :id_prod';
$stmt_img = $conectar->prepare($sql_img);
$stmt_img->bindParam(":id_prod", $id);
$stmt_img->execute();
$res_img = $stmt_img->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['update'])) {
    // Obtener los valores del formulario
    $destino = validarForm($_POST['destino'] ?? null);
    $info = validarForm($_POST['info'] ?? null);
    $precio = validarForm($_POST['precio'] ?? null);
    $hospedaje = validarForm($_POST['hospedaje'] ?? null);
    $estrellas_hotel = validarForm($_POST['estrellas_hotel'] ?? null);
    $comidas = validarForm($_POST['comidas'] ?? null);
    $ideal = validarForm($_POST['ideal'] ?? null);
    $dias = validarForm($_POST['dias'] ?? null);
    $aeropuerto = validarForm($_POST['aeropuerto'] ?? null);
    $desde = validarForm($_POST['desde'] ?? null);
    $hasta = validarForm($_POST['hasta'] ?? null);


    if(!empty($hasta) && !empty($desde)){

    
    $fechaObjDesde1 = new DateTime($desde);
    $fechaObjHasta2 = new DateTime($hasta);

    // Calcula la diferencia entre las fechas
    $interval = $fechaObjDesde1->diff($fechaObjHasta2);
    $diferenciaDias = $interval->format('%a');

    // Compara la diferencia calculada con el valor ingresado en el campo 'dias'
    if ($diferenciaDias != $dias) {
        header("Location: admin.php?status=fail_update_dias");
        exit;
    }

    $fechaActual = new DateTime();

    function validateDate($date, $format = 'Y-m-d') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    // Validar que $desde sea una fecha válida y no sea mayor a $hasta
    if (!validateDate($desde) || !validateDate($hasta) || $desde >= $hasta || new DateTime($desde) < $fechaActual) {
        header("Location: admin.php?status=fail_update_fechas");
        exit;
    }

    setlocale(LC_TIME, 'es_ES.utf8', 'es_ES', 'esp');

    $fechaObjDesde = new DateTime($desde);
    $fechaFormateadaDesde = ucfirst(strftime("%a %d %b", $fechaObjDesde->getTimestamp()));
    $fechaFormateadaDesde = str_replace(array('ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'), array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'), $fechaFormateadaDesde);
    $fechaFormateadaDesde = str_replace('.', '', $fechaFormateadaDesde);

    $fechaObjHasta = new DateTime($hasta);
    $fechaFormateadaHasta = ucfirst(strftime("%a %d %b", $fechaObjHasta->getTimestamp()));
    $fechaFormateadaHasta = str_replace(array('ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'), array('Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'), $fechaFormateadaHasta);
    $fechaFormateadaHasta = str_replace('.', '', $fechaFormateadaHasta);
    
    }
    // Verificar si se seleccionó un nuevo archivo
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0 && !empty($_FILES['archivo']['name'])) {
        // Se seleccionó un nuevo archivo, procesar la imagen

        $info_img =  pathinfo($_FILES['archivo']['name']);
        $extension = $info_img['extension'];
        $nombre_archivo = $info_img['filename'];

        $nombre_archivo = preg_replace("/[^A-Za-z0-9]/", "", $nombre_archivo);
        $time = time();

        $extensiones_permitidas = array('jpg', 'jpeg', 'png');

        if (in_array($extension, $extensiones_permitidas)) {
            $origen = $_FILES['archivo']['tmp_name'];
            $destino_img = "img/{$nombre_archivo}_{$time}.{$extension}";

            move_uploaded_file($origen, $destino_img);
        } else {
            // Manejar el caso en el que la extensión del archivo no es válida
            header("Location: admin.php?status=fail_update");
            exit;
        }
    }

    // Preparar la consulta SQL
    $sql = 'UPDATE productos SET destino = :destino, info = :info, precio = :precio, hospedaje = :hospedaje, estrellas_hotel = :estrellas_hotel, comidas = :comidas, ideal = :ideal, dias = :dias, aeropuerto = :aeropuerto';

   
    if (!empty($hasta) && !empty($desde)) {
        // Agregar la columna hasta a la actualización solo si se proporcionó una nueva fecha hasta
        $sql .= ', desde = :desde';
        $sql .= ', hasta = :hasta';
    }

    if (isset($destino_img)) {
        // Agregar la columna img a la actualización solo si se proporcionó una nueva imagen
        $sql .= ', img = :img';
    }

    $sql .= ' WHERE id_prod = :id_prod';

    // Preparar y ejecutar la consulta
    $stmt = $conectar->prepare($sql);
    $stmt->bindParam(":destino", $destino);
    $stmt->bindParam(":info", $info);
    $stmt->bindParam(":precio", $precio);
    $stmt->bindParam(":hospedaje", $hospedaje);
    $stmt->bindParam(":estrellas_hotel", $estrellas_hotel);
    $stmt->bindParam(":comidas", $comidas);
    $stmt->bindParam(":ideal", $ideal);
    $stmt->bindParam(":dias", $dias);
    $stmt->bindParam(":aeropuerto", $aeropuerto);

  

    if (!empty($hasta) && !empty($desde)) {
        // Bind hasta parameter only if a new date hasta was provided
        $stmt->bindParam(":desde", $fechaFormateadaDesde);
        $stmt->bindParam(":hasta", $fechaFormateadaHasta);
        
    }

    if (isset($destino_img)) {
        // Bind image parameter only if a new image was provided
        $stmt->bindParam(":img", $destino_img);
    }

    $stmt->bindParam(":id_prod", $id);

    $stmt->execute();

    // Verificar el resultado de la consulta
    if ($stmt->rowCount() > 0) {
        header("Location: admin.php?status=updated");
    } else {
        header("Location: admin.php?status=fail_update");
    }
}} else {
    header("Location: login.php");
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
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="precio" class="col-form-label">Precio</label>
                            <input type="number" class="form-control" min="1" value="<?php echo $prod['precio']; ?>" id="precio" name="precio"  required>
                        </div>
                    
                        <div class="form-group col-md-4">
                            <label for="hospedaje" class="col-form-label">Hospedaje</label>
                            <input type="text" class="form-control" name="hospedaje" value="<?php echo $prod['hospedaje']; ?>" id="hospedaje" required>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-4">
                            <label for="estrellas_hotel" class="col-form-label">Estrellas Hotel</label>
                            <input type="number" min="2" max="7" class="form-control" name="estrellas_hotel" value="<?php echo $prod['estrellas_hotel']; ?>" id="estrellas_hotel" required>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                            <label for="comidas" class="col-form-label">Comidas</label>
                            <input type="text" class="form-control" name="comidas" value="<?php echo $prod['comidas']; ?>" id="comidas" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="ideal" class="col-form-label">Ideal</label>
                            <input type="text" class="form-control" name="ideal" value="<?php echo $prod['ideal']; ?>" id="ideal" required >
                        </div>
                        
                    <div class="form-group col-md-4">
                            <label for="dias" class="col-form-label">Dias</label>
                            <input type="number" class="form-control" name="dias" value="<?php echo $prod['dias']; ?>" id="dias" min="2" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="aeropuerto" class="col-form-label">Aeropuerto</label>
                            <input type="text" class="form-control" name="aeropuerto" value="<?php echo $prod['aeropuerto']; ?>" id="aeropuerto" required >
                        </div>

                        <div class="form-group col-md-4">
                            <label for="desde" class="col-form-label">Desde</label>
                            <input type="date" class="form-control" name="desde" value="<?php echo $prod['desde']; ?>" id="desde" >
                        </div>

                        <div class="form-group col-md-4">
                            <label for="hasta" class="col-form-label">Hasta</label>
                            <input type="date" class="form-control" name="hasta" value="<?php echo $prod['hasta']; ?>" id="hasta" >
                        </div>
                        <div class="form-group col-md-4 mt-2">
                            <label for="archivo" class="col-form-label">Archivo</label>
                            <input type="file" class="form-control-file" name="archivo" id="archivo">
                        </div>
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





