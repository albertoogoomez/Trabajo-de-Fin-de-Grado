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
    <link rel="stylesheet" href="FormularioRegistro.css">
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
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['correo'];
        $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
      // Buscamos al usuario en la base de datos
      $sql = "SELECT * FROM Usuario WHERE Email='$email'";
      $resultado = $conexion->query($sql);

      // Comprobamos si se encontró al usuario
      if ($resultado->num_rows > 0) {
          // Obtenemos los datos del usuario
          echo "El usuario ya existe";
//  
}
else{
        // Preparamos la consulta SQL para insertar los datos en la base de datos
        $sql = "INSERT INTO Usuario (Nombre, Apellidos, Email, Contrasena) VALUES ('$nombre', '$apellidos', '$email', '$contrasena')";

        // Ejecutamos la consulta
        if ($conexion->query($sql) === TRUE) {
            header('Location: login.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }
        // Cerramos la conexión a la base de datos
        $conexion->close();
    }
    ?>
    <!-- Formulario de registro -->
    <section class="form-register">
        <h4>Formulario Registro</h4>
        <form action="registro.php" method="post">
        <input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingrese su Nombre">
        <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese sus Apellidos">
        <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo electrónico">
        <input class="controls" type="password" name="contrasena" id="contrasena" placeholder="Ingrese su Contraseña">
        <p><input class="boton" type="checkbox" name="Terminos y Condiciones" id="Terminos y Condiciones" placeholder="Terminos y Condiciones"> <a href="#">Términos y Condiciones</a></p>
        <input class="botons" type="submit" value="Registrar">
        <p><a href="login.php">Ya tengo una Cuenta</a></p>
        <p><a href="../Inicio.php">Volver a Inicio</a></p>
        </form>
    </section>
</body>
</html>
