<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Estilos CSS */
        body {
            /* Agrega la imagen de fondo y ajusta los estilos según necesites */
            background-image: url('FotosRegistro/FondoRegistro.jpeg');
            background-size: cover;
            background-position: center;
        }
        /* Otros estilos si los necesitas */
    </style>
    <link rel="stylesheet" href="InicioSesion.css">
</head>
<body>
    <?php
    // Comprobamos si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Establecemos la conexión a la base de datos
        $conexion = new mysqli("localhost", "lujocars", "alberto123", "coches1");

        // Verificamos la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Recogemos los datos del formulario
        $email = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        // Buscamos al usuario en la base de datos
        $sql = "SELECT * FROM Usuario WHERE Email='$email'";
        $resultado = $conexion->query($sql);

        // Comprobamos si se encontró al usuario
        if ($resultado->num_rows > 0) {
            // Obtenemos los datos del usuario
            $usuario = $resultado->fetch_assoc();
            $hash=$usuario['Contrasena'];
            // Verificamos la contraseña
            if (password_verify($contrasena, $hash)) {
           // if ($contrasena == $usuario['Contrasena']) {
                   // echo "Inicio de sesión exitoso. Bienvenido, " . $usuario['Nombre'];
                   session_start(); // Inicia la sesión

// Guarda la información del usuario en variables de sesión
$_SESSION['Nombre'] = $usuario['Nombre'];
$_SESSION['Email'] = $usuario['Email'];
$_SESSION['es_admin'] = $usuario['es_admin'];
                   
                   header('Location: ../Inicio.php');
                // Aquí podrías redirigir al usuario a la página principal
            } else {
                //echo $contrasena."<br>". $usuario['Contrasena'];
                //echo "<br>".password_hash($contrasena, PASSWORD_DEFAULT);
                echo "<br>Contraseña incorrecta";
            }
        } else {
            echo "Usuario no encontrado";
        }

        // Cerramos la conexión a la base de datos
        $conexion->close();
    }
    ?>
    <section class="form-register">
    <h4>Iniciar sesión</h4>
    <form action="login.php" method="post">
    <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo">
    <input class="controls" type="password" name="contrasena" id="contrasena" placeholder="Ingrese su Contraseña">
    <input class="botons" type="submit" value="Iniciar sesión">
    <p><a href="Registro.php">Crear cuenta</a></p>
    <p><a href="../Inicio.php">Volver a Inicio</a></p>
    </form>
</section>
</body>
</html>  
 
