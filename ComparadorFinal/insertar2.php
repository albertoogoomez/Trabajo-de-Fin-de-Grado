<?php
// Desactivar la visualización de "notices"
error_reporting(E_ALL & ~E_NOTICE);

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
//$foto = $_POST['foto'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$año = $_POST['año'];
$precio = $_POST['precio'];
$color = $_POST['color'];
$peso = $_POST['peso'];
$longitud = $_POST['longitud'];
$anchura = $_POST['anchura'];
$altura = $_POST['altura'];
$plazas = $_POST['plazas'];
$volumen = $_POST['volumen'];
$puertas = $_POST['puertas'];
$velocidad = $_POST['velocidad'];
$aceleracion = $_POST['aceleracion'];
$distintivo = $_POST['distintivo'];
$caballos = $_POST['caballos'];
$torque = $_POST['torque'];
$cilindrada = $_POST['cilindrada'];
$tipo = $_POST['tipo'];
$consumo = $_POST['consumo'];
$combustible = $_POST['combustible'];
$caja = $_POST['caja'];
$velocidades = $_POST['velocidades'];
$traccion = $_POST['traccion'];

//Sacamos el siguiente Id de la tabla coche para que coincida con el resto de las tablas.
$sql_autoincrement = "SHOW TABLE STATUS LIKE 'coche'";
$result = $conn->query($sql_autoincrement);
if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
                $siguiente_id = $row["Auto_increment"];
        }
} else {
        echo "No se encontraron resultados";
    }  




// Subir archivo
if(isset($_FILES['imagen'])){
        $file_name = $_FILES['imagen']['name'];
        $file_size = $_FILES['imagen']['size'];
        $file_tmp = $_FILES['imagen']['tmp_name'];
        $file_type = $_FILES['imagen']['type'];
        $file_ext = strtolower(end(explode('.',$_FILES['imagen']['name'])));
    
        // Verificar tipo de archivo (puedes añadir más extensiones si es necesario)
        $extensions = array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
            echo "Extensión no permitida, por favor elige una imagen JPEG, JPG, o PNG.";
            exit();
        }
        
        // Guardar imagen en la carpeta 'imagenes'
        move_uploaded_file($file_tmp,"./imagenes/".$file_name);      
    
        // Renombrar la imagen con el auto_increment de la tabla 'coche'
        $new_name = $siguiente_id.".".$file_ext;
        rename("./imagenes/".$file_name, "./imagenes/".$new_name);
    
        // Actualizar la base de datos si es necesario
        // Puedes añadir tu código de inserción o actualización aquí si deseas registrar la imagen en la base de datos
        
      //  echo "Imagen subida correctamente y renombrada como ".$new_name;
    }
    //$new_name = explode($new_name);
    //$new_name = strtolower(end($new_name));

// Insertar datos en la tabla "Coche"
$sql = "INSERT INTO Coche (Foto, Marca, Modelo, Año, Precio, Color, Peso, Longitud, Anchura, Altura, Número_de_plazas, Volumen_de_maletero, Puertas)
        VALUES ('$new_name', '$marca', '$modelo', '$año', '$precio', '$color', '$peso', '$longitud', '$anchura', '$altura', '$plazas', '$volumen', '$puertas')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    // Insertar datos en la tabla "Prestaciones"
    $sql = "INSERT INTO Prestaciones (idPrestaciones, IdCoche, Velocidad_máxima, Aceleración, Distintivo_medioambiental)
            VALUES ('$siguiente_id', '$last_id', '$velocidad', '$aceleracion', '$distintivo')";
    $conn->query($sql);

    // Insertar datos en la tabla "Motor"
    $sql = "INSERT INTO Motor (idMotor, IdCoche, Caballos_de_potencia, Torque, Cilindrada, Tipo_de_motor, Consumo, Combustible)
            VALUES ('$siguiente_id', '$last_id', '$caballos', '$torque', '$cilindrada', '$tipo', '$consumo', '$combustible')";
    $conn->query($sql);

    // Insertar datos en la tabla "Transmisión"
    $sql = "INSERT INTO Transmisión (idTransmisión, IdCoche, Caja_de_cambios, Número_de_velocidades, Tracción)
            VALUES ('$siguiente_id', '$last_id', '$caja', '$velocidades', '$traccion')";
    $conn->query($sql);

    echo "Datos ingresados correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
