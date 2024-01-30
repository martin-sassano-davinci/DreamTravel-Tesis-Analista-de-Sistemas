<?php
 include_once('vistas/css.php');
 include_once('vistas/js.php');  
// Conexión a la base de datos utilizando PDO 
session_start();
include_once('modelos/Cnx.php');

$db = new Cnx();
$pdo = $db->conectar();

// Verifica si se proporciona un token en la URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Busca el usuario con el token proporcionado
    $stmt = $pdo->prepare("SELECT id_usu, nombre FROM usuarios WHERE reset_token = :token AND token_expire_date > NOW()");
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $user_id = $row['id_usu'];
        $username = $row['nombre'];

        // Procesamiento del formulario de restablecimiento de contraseña
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            // Verifica si las contraseñas coinciden
            if ($new_password === $confirm_password && !empty($new_password)) {

                $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
            if(preg_match($password_regex, $new_password) == 0){

                echo "<p class='mt-5 alert alert-danger text-center'>Las contraseñas no cumplen con los requisitos. Deben contener una mayuscula, una minuscula, un numero y un caracter especial.</p>";
            } else {

                 // Actualiza la contraseña en la base de datos utilizando PDO
                 $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                 $update_sql = "UPDATE usuarios SET pass = :password, reset_token = NULL, token_expire_date = NULL WHERE id_usu = :user_id";
 
                 $stmt = $pdo->prepare($update_sql);
                 $stmt->bindParam(':password', $hashed_new_password, PDO::PARAM_STR);
                 $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
 
                 if ($stmt->execute()) {
                     echo "
                     <div class='container p-5 mx-auto text-center'>
                        <p class='mt-5 alert alert-success text-center mx-auto'>Contraseña restablecida con éxito. Puedes iniciar sesión con tu nueva contraseña.</p>
                        <a href='login.php' class='btn btn-primary text-center mx-auto'>Iniciar sesión</a>
                     </div>
                     ";
                     
                     // Puedes redirigir al usuario a la página de inicio de sesión, por ejemplo.
                 } else {
                     echo "<p class='mt-5 alert alert-danger text-center'>Error al restablecer la contraseña.</p>";
                 }
    
                 
            }
               
            } else {
                echo "<p class='mt-5 alert alert-danger text-center'>Las contraseñas no coinciden.</p>";
            }
        } else {
            // Muestra el formulario de restablecimiento de contraseña
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
</head>
<body>
    
    <div class="container mt-3">
      <p class="h2 text-center">Restablecer Contraseña</p>
    <form action="" method="post" class="needs-validation" novalidate>
        <div class="form-row">
            <div class="col-8 m-4 mx-auto">
                <input type="password" name="new_password" class="form-control " placeholder="Ingresa tu nueva contraseña" required>
                <div class="invalid-feedback m-3 h3 alert alert-danger text-center">Por favor ingresa una contraseña válida.</div>
            </div>
            <div class="col-8 m-4 mx-auto">
                <input type="password" name="confirm_password" class="form-control " placeholder="Confirma tu nueva contraseña" required>
                <div class="invalid-feedback m-3 h3 alert alert-danger text-center">Las contraseñas no coinciden.</div>
            </div>
            <div class="col-4 m-4 mx-auto">               
                <input type="submit" value="Confirmar cambio de Contraseña" class="btn btn-warning">
            </div>

        </div>
    </form>
</div>

</body>
</html>
<?php
        }
    } else {
        echo "<p class='mt-5 alert alert-danger text-center'>Token inválido o expirado. Por favor, solicita un nuevo enlace de restablecimiento.</p>";
    }
} else {
    echo "<p class='mt-5 alert alert-danger text-center'>Token no proporcionado en la URL.</p>";
}

// Cierra la conexión a la base de datos
$pdo = null;
?>