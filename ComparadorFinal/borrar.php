<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se ha enviado el ID del registro a borrar
    if (isset($_POST['id'])) {
        // Establecer la conexión a la base de datos
        $servername = "localhost";
        $username = "lujocars";
        $password = "alberto123";
        $dbname = "coches1";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Verifica la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Escapa el ID del registro para prevenir inyección SQL
        $id = $conn->real_escape_string($_POST['id']);

        // Comienza la transacción
        $conn->begin_transaction();

        // Intenta borrar registros de las cuatro tablas
        $borrado_exitoso = true;

        // Borrar registros de la tabla prestaciones
        $sql_prestaciones = "DELETE FROM prestaciones WHERE IdCoche = '$id'";
        if (!$conn->query($sql_prestaciones)) {
            $borrado_exitoso = false;
        }

        // Borrar registros de la tabla transmision
        $sql_transmision = "DELETE FROM transmisión WHERE IdCoche = '$id'";
        if (!$conn->query($sql_transmision)) {
            $borrado_exitoso = false;
        }

        // Borrar registros de la tabla motor
        $sql_motor = "DELETE FROM motor WHERE IdCoche = '$id'";
        if (!$conn->query($sql_motor)) {
            $borrado_exitoso = false;
        }

        // Borrar registros de la tabla coche
        $sql_coche = "DELETE FROM coche WHERE IdCoche = '$id'";
        if (!$conn->query($sql_coche)) {
            $borrado_exitoso = false;
        }

        // Verificar si el borrado fue exitoso
        if ($borrado_exitoso) {
            // Si todas las consultas se ejecutaron correctamente, se confirma la transacción
            $conn->commit();
            echo "Registros borrados correctamente.";
        } else {
            // Si hubo algún error, se revierten los cambios
            $conn->rollback();
            echo "Error al borrar los registros.";
        }

        // Cierra la conexión
        $conn->close();
    } else {
        echo "Error: No se recibió el ID del registro a borrar.";
    }
} else {
    echo "Error: El formulario no se ha enviado correctamente.";
}
?>

