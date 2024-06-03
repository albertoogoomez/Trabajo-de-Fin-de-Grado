<?php
// Inicia la sesión
session_start();

if (isset($_SESSION['Nombre']) && isset($_SESSION['Email']) && isset($_SESSION['es_admin'])) {
    // Accede a las variables de sesión
    $nombre = $_SESSION['Nombre'];
    $email = $_SESSION['Email'];
    $es_admin = $_SESSION['es_admin'];
    // Otros datos que hayas guardado en la sesión

    // Ahora puedes utilizar $nombre, $email y otros datos en esta página
}

// Elimina todas las variables de sesión
session_unset();

// Finalmente, destruye la sesión
session_destroy();


// Redirige al usuario a la página de inicio de sesión o a cualquier otra página deseada
header("Location: Inicio.php");
exit();
?>
