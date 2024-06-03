<?php
// Desactivar la visualización de "notices"
//error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);


session_start(); // Inicia la sesión
if (isset($_SESSION['Nombre']) && isset($_SESSION['Email']) && isset($_SESSION['es_admin'])) {
    // Accede a las variables de sesión
    $nombre = $_SESSION['Nombre'];
    $email = $_SESSION['Email'];
    $es_admin = $_SESSION['es_admin'];
}
else{
    // Accede a las variables de sesión del usuario
$nombre = " ";
$email = " ";
$es_admin = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparadores</title>
    <link rel="stylesheet" href="Comparador.css">
    <link rel="stylesheet" href="MenuEstilos.css">
    <link rel="stylesheet" href="LogoEstilos.css">
    <link rel="stylesheet" href="Inicio.css">
</head>
<body>
<div id="menu1" class="menu">
        
        <label for="menu-toggle" class="menu-icon"><i class="fas fa-bars"></i></label>
        <table width="100%">
        <tr>
        <td width="25%" align="left" class="logo-td"><a href="Inicio.php"><img class="logo" src="Fotos/Logo.jpg" alt="Logo de King Motors"></a></td>
        <td width="60%" align="center">
                <ul class="menu-items">
            <li><a href="Inicio.php">Inicio</a></li>
            <li><a href="zzz2.php">Productos</a></li>
            <li><a href="Comparador2.php">Comparador</a></li>
            <li><a href="Formularios/login.php">Inicio de sesión</a></li>
            <li><a href="Formularios/registro.php">Registrarse</a></li>
            <li><a href="#box">Sobre Nosotros</a></li>


<?php
 if ($es_admin == 1){echo '<li><a href="Admin.php">Admin</a></li>';}
?>



        
            
        </ul>
</td>        
<td width="15%" align="right" class="cerrarsesion-td">
            <?php if ($es_admin != '') { ?>
    
        <form action="salir.php" method="post">
            <button type="submit"  class="BotonVer2">Cerrar sesión</button>
        </form>
 
<?php } ?>
        
        </td></tr>        
        </table>
        
    </div>
    <form action="Comparador.php" method="POST">
     <br>
        <div class="container">
        <h2>Comparador </h2>
        <form action="procesar.php" method="POST">
            <div class="comparator">
                <select name="comparador1" id="comparador1">
       <?php
        // Establecer la conexión a la base de datos
        $servername = "localhost";
        $username = "lujocars";
        $password = "alberto123";
        $dbname = "coches1";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sqlform= "SELECT * FROM Coche";
        $resultCoche = $conn->query($sqlform);
 
       if ($resultCoche->num_rows > 0) {
            while ($row = $resultCoche->fetch_assoc()) {
             $id_coche = $row['IdCoche'];
             $Marca = $row['Marca'];
             $Modelo = $row['Modelo'];
    
       echo '<option value='.$id_coche.'>'.$Marca ." - ". $Modelo.'</option>';
                    

                    }
                    }
        ?>  
                </select>
                <select name="comparador2" id="comparador2">
         <?php
        $sqlform= "SELECT * FROM Coche";
        $resultCoche = $conn->query($sqlform);
        if ($resultCoche->num_rows > 0) {
            while ($row = $resultCoche->fetch_assoc()) {
             $id_coche = $row['IdCoche'];
             $Marca = $row['Marca'];
             $Modelo = $row['Modelo'];
    
       echo '<option value='.$id_coche.'>'.$Marca ." - ".$Modelo.'</option>';
                            }
                        }
                ?>  
                    
                </select>
            </div>

            <input type="submit" value="Comparar">
        </form>
    </div>
    </form>
    <script src="Comparador.js"></script>
</body>
</html>
