<?php
session_start();
require_once('modelos/Cnx.php');

if (!isset($_SESSION['user_role'])) {
    header('location: login.php');
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Cuenta</title>
    <script>
        function confirmarEliminacion() {
            var confirmacion = confirm("¿Estás seguro que quieres eliminar tu cuenta?");
            if (confirmacion) {
                document.getElementById("deleteForm").submit();
            } else {
                alert("No se eliminó la cuenta.");
                setTimeout(() => {
                    location.href = "index.php"
                }, 500);
            }
        }
    </script>
</head>
<body>
    <h2>Eliminar Cuenta</h2>

    <?php
$db = new Cnx();
$conectar = $db->conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar la confirmación del lado del servidor
    if (isset($_POST['confirmar']) && $_POST['confirmar'] === 'ELIMINAR') {
        // Aquí deberías realizar las operaciones necesarias para eliminar la cuenta

        // Reemplaza esta sección con tu lógica de eliminación de cuenta
        $id_usuario_a_borrar = $_SESSION['id_usuario']; // Asegúrate de tener una sesión iniciada

        // Corrección: La sintaxis correcta no incluye el asterisco (*) y no se necesita FETCH
        $usuDlt = $conectar->prepare("DELETE FROM usuarios WHERE id_usu = :id_usuarioDlt LIMIT 1");
        $usuDlt->execute(array(':id_usuarioDlt' => $id_usuario_a_borrar));

        
        session_destroy();
        // Mostrar alerta y redirigir al usuario
        echo '<script>';
        echo 'alert("Cuenta eliminada correctamente. Serás redirigido al inicio de sesión.");';
        echo 'window.location.href = "login.php";';
        echo '</script>';

        // Asegúrate de salir después de redirigir para evitar ejecución adicional del script
        exit();
    } else {
        echo "<p class='mt-5 alert alert-danger text-center'>Confirmación incorrecta. No se eliminó la cuenta.</p>";
    }
}
?>

    <form id="deleteForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <!-- Agregamos un campo oculto para enviar la confirmación junto con el formulario -->
        <input type="hidden" name="confirmar" value="ELIMINAR">
        <input type="button" value="Eliminar Cuenta" onclick="confirmarEliminacion()">
    </form>
</body>
</html>
