<?php
session_start();

    
include_once('vistas/css.php'); 
require_once('modelos/Cnx.php');
include_once('vistas/header.php'); 
include_once('vistas/header_admin.php'); 
include_once('vistas/js.php'); 
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


$db = new Cnx();
$conn = $db->conectar();
$id_usuario = $_SESSION['id_usuario'];


// Manejar la actualización de la reseña si se ha enviado el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar_opinion'])) {

    $id_resena = $_POST['editar_opinion'];
    $nombreEdit = $_POST['nombre'];
    $tituloEdit = $_POST['titulo'];
    $comentarioEdit = $_POST['comentario'];
    $calificacionEdit = $_POST['calificacion'];

    // Validar los campos
    if (empty($nombreEdit) || empty($tituloEdit) || empty($comentarioEdit) || empty($calificacionEdit)) {
        // Campos no válidos, puedes manejar esto según tus necesidades
        echo "
        <div class='container p-5 mx-auto text-center'>
            <p class='mt-5 alert alert-danger text-center mx-auto'>Todos los campos son obligatorios.</p>
        </div>
        ";
    } else {
        // Campos válidos, realizar el update en la base de datos
        $updateStmt = $conn->prepare("UPDATE opiniones SET nombre = :nombre, titulo = :titulo, comentario = :comentario, calificacion = :calificacion WHERE id_res = :id_resena");
        $updateStmt->bindParam(':nombre', $nombreEdit);
        $updateStmt->bindParam(':titulo', $tituloEdit);
        $updateStmt->bindParam(':comentario', $comentarioEdit);
        $updateStmt->bindParam(':calificacion', $calificacionEdit);
        $updateStmt->bindParam(':id_resena', $id_resena);

        if ($updateStmt->execute()) {
            // Update exitoso
     echo "<div class='container p-5 mx-auto text-center'>
        <p class='mt-5 alert alert-success text-center mx-auto'>Reseña actualizada.</p>
    </div>";


        } else {
            // Error en el update
            echo "<div class='container p-5 mx-auto text-center'>
            <p class='mt-5 alert alert-danger text-center mx-auto'>Error al actualizar la reseña.</p>
        </div>";
        }
    }
}

// Eliminar reseña
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_opinion'])) {
    $id_opinion_eliminar = $_POST['eliminar_opinion'];

    $sql_eliminar = "DELETE FROM opiniones WHERE id_res = :idOpinion AND id_usu = :idUsu";
    $stmt_eliminar = $conn->prepare($sql_eliminar);
    $stmt_eliminar->bindParam(':idOpinion', $id_opinion_eliminar);
    $stmt_eliminar->bindParam(':idUsu', $id_usuario);
    $stmt_eliminar->execute();

     // Mensaje de éxito
     echo "<div class='container p-5 mx-auto text-center'>
     <p class='mt-5 alert alert-success text-center mx-auto'>Reseña eliminada.</p>
 </div>";

// Esperar 5 segundos y luego redireccionar
echo "<script>
     setTimeout(function() {
         window.location.href = 'index.php';
     }, 3500);
   </script>";

exit();
}
// Insertar reseña
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['seleccionarCompra'])) {
    $id_compras = $_POST['seleccionarCompra'];
    $nombre = $_POST['nombre'];
    $titulo = $_POST['titulo'];
    $comentario = $_POST['comentario'];
    $calificacion = $_POST['calificacion'];

    if($calificacion <=5 && $calificacion >= 1){
        if(is_numeric($id_compras)){
            $sql = "INSERT INTO opiniones (id_usu, id_compras, nombre, titulo, comentario, calificacion) VALUES (:idUsu, :idCompras, :nombre, :titulo, :comentario, :calificacion)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idUsu', $id_usuario);
    $stmt->bindParam(':idCompras', $id_compras);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':comentario', $comentario);
    $stmt->bindParam(':calificacion', $calificacion);
    $stmt->execute();

      echo "<div class='container p-5 mx-auto text-center'>
     <p class='mt-5 alert alert-success text-center mx-auto'>Reseña publicada.</p>
 </div>";

// Esperar 5 segundos y luego redireccionar
echo "<script>
     setTimeout(function() {
         window.location.href = 'index.php';
     }, 3500);
   </script>";

exit();
        } else {
            echo "
            <div class='container p-5 mx-auto text-center'>
                <p class='mt-5 alert alert-danger text-center mx-auto'>Error, volve a intentarlo con una compra valida.</p>            
            </div>
            ";
        }
    
    } else {
        echo "
            <div class='container p-5 mx-auto text-center'>
                <p class='mt-5 alert alert-danger text-center mx-auto'>Error, volve a intentarlo con una calificacion valida.</p>            
            </div>
            ";
    }
    
}


// Obtener reseñas
$sql = "SELECT * FROM opiniones WHERE id_usu = :idUsu";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':idUsu', $id_usuario);
$stmt->execute();
$opiniones = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reseñas</title>
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Deja tu Reseña</h2>
    <form method="post">
    <?php
// Obtén la información de las compras del usuario desde la base de datos
$id_usuario = $_SESSION['id_usuario'];
$consultaCompras = $conn->prepare("SELECT c.id_compras, c.destino, c.fecha_de_compra, c.precio FROM compras c WHERE c.id_usu = :idUsu AND c.id_compras NOT IN (SELECT DISTINCT o.id_compras FROM opiniones o WHERE o.id_usu = :idUsu)");
$consultaCompras->bindParam(':idUsu', $id_usuario);
$consultaCompras->execute();
$compras = $consultaCompras->fetchAll(PDO::FETCH_ASSOC);


?>


<div class="form-group">
    <label for="seleccionarCompra">Selecciona una compra realizada:</label>
    <select class="form-control" name="seleccionarCompra" id="seleccionarCompra">
        
        <?php 
        if(empty($compras)): ?>
            <option value="" disabled selected>No has realizado ninguna compra</option>
        <?php else:
            foreach ($compras as $compra): ?>
                <option value="<?php echo $compra['id_compras']; ?>">
                    <?php echo $compra['destino'] . ' - ' . $compra['fecha_de_compra'] . ' -  $' . $compra['precio']. ' USD'; ?>
                </option>
            <?php endforeach;
        endif; ?>
    </select>
</div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo de la reseña:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="comentario">Comentario:</label>
            <textarea class="form-control" id="comentario" name="comentario" required></textarea>
        </div>
        <div class="form-group">
            <label for="calificacion">Calificación:</label>
            <input type="number" class="form-control" id="calificacion" name="calificacion" min="1" max="5" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Reseña</button>
    </form>

    <hr>

    <h2>Reseñas Recientes</h2>
    <?php
    if (!empty($opiniones)) {
        foreach ($opiniones as $opinion) {
            echo "<div class='card mb-3'>
                    <div class='card-body'>
                        <h5 class='card-title'>" . $opinion['nombre'] . " - " . $opinion['titulo'] . " - Calificación: " . $opinion['calificacion'] . "</h5>
                        <p class='card-text'>" . $opinion['comentario'] . "</p>
                        
                        <!-- Botón para abrir la ventana modal -->
                        <button class='btn btn-warning editar-resena-btn' 
                        data-bs-toggle='modal' 
                        data-bs-target='#editarResenaModal'
                        data-id='" . $opinion['id_res'] . "' 
                        data-nombre='" . $opinion['nombre'] . "'
                        data-titulo='" . $opinion['titulo'] . "'
                        data-comentario='" . $opinion['comentario'] . "' 
                        data-calificacion='" . $opinion['calificacion'] . "'>Editar</button>
                        
                        <form method='post' style='display:inline;'>
                            <input type='hidden' name='eliminar_opinion' value='" . $opinion['id_res'] . "'>
                            <button type='submit' class='btn btn-danger'>Eliminar</button>
                        </form>
                    </div>
                  </div>";
        }
    } else {
        echo "<p>No hay reseñas disponibles.</p>";
    }

    ?>
</div>

<!-- Ventana modal para la edición de reseñas -->
<div class="modal fade" id="editarResenaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarResenaModalLabel">Editar Reseña</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulario de edición de reseñas -->
        <form method="post" action="" id="editarResenaForm">
          <input type="hidden" name="editar_opinion" id="editar_opinion_input" value="">
          <!-- Campos de edición -->
          <input type="hidden" name="id_resena" id="editar_opinion_input">
          <div class="form-group">
                        <label for="nombreEditModal">Nombre:</label>
                        <input type="text" class="form-control" id="nombreEditModal" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="tituloEditModal">Título:</label>
                        <input type="text" class="form-control" id="tituloEditModal" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="comentarioEditModal">Comentario:</label>
                        <textarea class="form-control" id="comentarioEditModal" name="comentario" rows="10"  required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="calificacionEditModal">Calificación:</label>
                        <input type="number" class="form-control" id="calificacionEditModal" name="calificacion" min="1" max="5" required>
                    </div>
          <button type="submit" class="btn btn-success m-2">Guardar Cambios</button>
        <button type="button" class="btn btn-secondary m-2" data-bs-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
}}
?>

<!-- Jquery -->
<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<!-- Script para manejar eventos de clic en el botón de edición -->
<script>
    $(document).ready(function () {
        // Manejar el evento show de la ventana modal
        $('#editarResenaModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var idResena = button.data('id');
            var nombre = button.data('nombre');
            var titulo = button.data('titulo');
            var comentario = button.data('comentario');
            var calificacion = button.data('calificacion');

            // Llenar los campos del formulario con los datos de la reseña
            $('#editar_opinion_input').val(idResena);
            $('#nombreEditModal').val(nombre);
            $('#tituloEditModal').val(titulo);
            $('#comentarioEditModal').val(comentario);
            $('#calificacionEditModal').val(calificacion);
        });
    });
</script>
</body>
</html>
