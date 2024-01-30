<?php
session_start();

if($_SESSION['user_role'] == 'admin'){
require_once('modelos/Cnx.php');

$db = new Cnx();
$conectar = $db->conectar();
 
function validarForm($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// $directorio = array_slice(scandir("archivos_subidos"), 2);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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

try {
    $fechaObjDesde1 = new DateTime($desde);
    $fechaObjHasta2 = new DateTime($hasta);

    // Calcula la diferencia entre las fechas
    $interval = $fechaObjDesde1->diff($fechaObjHasta2);
    $diferenciaDias = $interval->format('%a');

    // Compara la diferencia calculada con el valor ingresado en el campo 'dias'
    if ($diferenciaDias != $dias) {
        header("Location: admin.php?status=fail_create");
        exit;
    }

    $fechaActual = new DateTime();

    function validateDate($date, $format = 'Y-m-d') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    // Validar que $desde sea una fecha válida y no sea mayor a $hasta
    if (!validateDate($desde) || !validateDate($hasta) || $desde >= $hasta || new DateTime($desde) < $fechaActual) {
        header("Location: admin.php?status=fail_create");
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

    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {
        $info_img = pathinfo($_FILES['archivo']['name']);
        $extension = $info_img['extension'];
        $nombre_archivo = $info_img['filename'];

        $nombre_archivo = preg_replace("/[^A-Za-z0-9]/", "", $nombre_archivo);
        $time = time();

        $extensiones_permitidas = array('jpg', 'jpeg', 'png');

        if (in_array($extension, $extensiones_permitidas)) {
            $origen = $_FILES['archivo']['tmp_name'];

            // Leer el contenido del archivo en forma de bytes
            $imagen_binaria = file_get_contents($origen);

            // Preparar la consulta SQL para insertar en la base de datos
            $sql = 'INSERT INTO productos(destino, info, precio, hospedaje, estrellas_hotel, comidas, ideal, dias, aeropuerto, desde, hasta, img) VALUES(:destino, :info, :precio, :hospedaje, :estrellas_hotel, :comidas, :ideal, :dias, :aeropuerto, :desde, :hasta, :img)';

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
            $stmt->bindParam(":desde", $fechaFormateadaDesde);
            $stmt->bindParam(":hasta", $fechaFormateadaHasta);
            $stmt->bindParam(":img", $imagen_binaria, PDO::PARAM_LOB); // Almacenar el contenido binario en el campo BLOB
            $stmt->execute();

            if ($stmt->rowCount()) {
                header("Location: admin.php?status=created");
                exit();
            } else {
                header("Location: admin.php?status=fail_create");
                exit();
            }
        } else {
            // Manejar el caso en el que la extensión del archivo no es válida
            header("Location: admin.php?status=fail_create");
            exit();
        }
    }
} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
} }}else {
    header("Location: login.php");
    exit();
}
?>