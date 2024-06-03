

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="EstilosTablas.css">
    <link rel="stylesheet" href="LeftArrowEstilos.css">
</head>
<body>
<?php
        // Establecer la conexión a la base de datos
        $servername = "localhost";
        $username = "lujocars";
        $password = "alberto123";
        $dbname = "coches1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores seleccionados del formulario
    $coche1 = $_POST["comparador1"];
    $coche2 = $_POST["comparador2"];

    // Consulta para obtener los datos de la tabla "Coche"
    $sqlCoche = "SELECT * FROM Coche WHERE IdCoche = $coche1 OR IdCoche = $coche2";
    $resultCoche = $conn->query($sqlCoche);

    // Consulta para obtener los datos de la tabla "Prestaciones"
    $sqlPrestaciones = "SELECT * FROM Prestaciones WHERE IdCoche = $coche1 OR IdCoche = $coche2";
    $resultPrestaciones = $conn->query($sqlPrestaciones);

    // Consulta para obtener los datos de la tabla "Motor"
    $sqlMotor = "SELECT * FROM Motor WHERE IdCoche = $coche1 OR IdCoche = $coche2";
    $resultMotor = $conn->query($sqlMotor);

    // Consulta para obtener los datos de la tabla "Transmisión"
    $sqlTransmisión = "SELECT * FROM Transmisión WHERE IdCoche = $coche1 OR IdCoche = $coche2";
    $resultTransmisión = $conn->query($sqlTransmisión);

    // Imprimir la flecha hacia atrás
    echo "<a href=\"javascript:history.go(-1)\" class=\"back-arrow\"><img src=\"LeftArrow2.2.png\" alt=\"Volver atrás\"></a>";

    // Imprimir la tabla de Coche
    echo "<h2>Coches</h2>";
    if ($resultCoche->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Foto</th><th>Marca</th><th>Modelo</th><th>Año</th><th>Precio</th><th>Color</th><th>Peso</th><th>Longitud</th><th>Anchura</th><th>Altura</th><th>Número de plazas</th><th>Volumen de maletero</th><th>Puertas</th></tr>";

        while ($row = $resultCoche->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='imagenes/" . $row["Foto"] . "' alt='Descripción de la imagen'></td>";
            echo "<td>" . $row["Marca"] . "</td>";
            echo "<td>" . $row["Modelo"] . "</td>";
            echo "<td>" . $row["Año"] . "</td>";
            echo "<td>" . $row["Precio"] . "€</td>";
            echo "<td>" . $row["Color"] . "</td>";
            echo "<td>" . $row["Peso"] . "Kg</td>";
            echo "<td>" . $row["Longitud"] . "mm</td>";
            echo "<td>" . $row["Anchura"] . "mm</td>";
            echo "<td>" . $row["Altura"] . "mm</td>";
            echo "<td>" . $row["Número_de_plazas"] . "</td>";
            echo "<td>" . $row["Volumen_de_maletero"] . "Litros</td>";
            echo "<td>" . $row["Puertas"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "No se encontraron resultados en la tabla de Coche.";
    }

    // Imprimir la tabla de Prestaciones
    echo "<h2>Prestaciones</h2>";
    if ($resultPrestaciones->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Velocidad máxima</th><th>Aceleración</th><th>Distintivo medioambiental</th></tr>";

        while ($row = $resultPrestaciones->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Velocidad_máxima"] . " Km/h</td>";
            echo "<td>" . $row["Aceleración"] . " s</td>";
            echo "<td>" . $row["Distintivo_medioambiental"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron resultados en la tabla de Prestaciones.";
    }

    // Imprimir la tabla de Motor
    echo "<h2>Motor</h2>";
    if ($resultMotor->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Caballos de potencia</th><th>Torque</th><th>Cilindrada</th><th>Tipo de motor</th><th>Consumo</th><th>Combustible</th></tr>";

        while ($row = $resultMotor->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Caballos_de_potencia"] . " Cv</td>";
            echo "<td>" . $row["Torque"] . " Nm</td>";
            echo "<td>" . $row["Cilindrada"] . " cm³</td>";
            echo "<td>" . $row["Tipo_de_motor"] . "</td>";
            echo "<td>" . $row["Consumo"] . " l/100 km</td>";
            echo "<td>" . $row["Combustible"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron resultados en la tabla de Motor.";
    }

    // Imprimir la tabla de Transmisión
    echo "<h2>Transmisión</h2>";
    if ($resultTransmisión->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Caja de cambios</th><th>Número de velocidades</th><th>Tracción</th></tr>";

        while ($row = $resultTransmisión->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Caja_de_cambios"] . "</td>";
            echo "<td>" . $row["Número_de_velocidades"] . "</td>";
            echo "<td>" . $row["Tracción"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron resultados en la tabla de Transmisión.";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
</body>
</html>
