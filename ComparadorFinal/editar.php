<?php
// Datos de conexión a la base de datos
        // Establecer la conexión a la base de datos
        $servername = "localhost";
        $username = "lujocars";
        $password = "alberto123";
        $dbname = "coches1";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener datos del formulario
$id = $_POST['id'];
$campo = $_POST['campo'];
$valor = $_POST['valor'];

// Actualizar el campo correspondiente en la tabla "Coche"
$sql = "UPDATE Coche SET $campo = '$valor' WHERE IdCoche = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Campo actualizado correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
