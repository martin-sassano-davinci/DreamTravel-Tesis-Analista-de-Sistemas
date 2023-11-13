<?php

require_once('modelos/Cnx.php');

$db = new Cnx();
$conectar = $db->conectar();
 



// $directorio = array_slice(scandir("archivos_subidos"), 2);

if ($_POST) {

$destino = validarForm($_POST['destino'] ?? null);
$info = validarForm($_POST['info'] ?? null);
$precio = validarForm($_POST['precio'] ?? null);
$aereos = validarForm($_POST['aereos'] ?? null);
$hospedaje = validarForm($_POST['hospedaje'] ?? null);
$comidas = validarForm($_POST['comidas'] ?? null);
$personas = validarForm($_POST['personas'] ?? null);

    try {

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

        $sql = 'INSERT INTO productos(destino, info, precio, aereos, hospedaje, comidas, cant_personas, img) VALUES(:destino, :info, :precio, :aereos, :hospedaje, :comidas, :personas, :img)';
                

        $stmt = $conectar->prepare($sql);
        $stmt->bindParam(":destino", $destino);
        $stmt->bindParam(":info", $info);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":aereos", $aereos);
        $stmt->bindParam(":hospedaje", $hospedaje);
        $stmt->bindParam(":comidas", $comidas);
        $stmt->bindParam(":personas", $personas);
        $stmt->bindParam(":img", $destino_img);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: admin.php?status=created");
            exit();
        } else {
        header("Location: admin.php?status=fail_create");
        exit();
        
        }
    }
}
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: admin.php?status=fail_create");
    exit();
}

function validarForm($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>