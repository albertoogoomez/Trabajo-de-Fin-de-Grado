<?php
// Desactivar la visualización de "notices"
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

session_start(); // Inicia la sesión
if (isset($_SESSION['Nombre']) && isset($_SESSION['Email']) && isset($_SESSION['es_admin'])) {
    // Accede a las variables de sesión
    $nombre = $_SESSION['Nombre'];
    $email = $_SESSION['Email'];
    $es_admin = $_SESSION['es_admin'];
}
else{
    // Accede a las variables de sesión del usuario
$nombre = $_SESSION['Nombre'];
$email = $_SESSION['Email'];
$es_admin = $_SESSION['es_admin'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="zzz.css">
    <link rel="stylesheet" href="Inicio.css">
    <script src="https://kit.fontawesome.com/d5097a28fe.js" crossorigin="anonymous"></script>
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
    <div>
    <article class="nike">
        <p class="tituloPa">Nuestros coches</p>
        <p>¡Descubre nuestros coches destacados y lleva tu experiencia de conducción al siguiente nivel!
            <br>
            Explora nuestra selección de coches de alta gama que combinan elegancia, potencia y tecnología de vanguardia.
        </p>
        <section class="recomendados2">
<?php
        // Establecer la conexión a la base de datos
        $servername = "localhost";
        $username = "lujocars";
        $password = "alberto123";
        $dbname = "coches1";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

        // Consulta para obtener los datos de la tabla "Coche"
        $sqlCoche = "SELECT * FROM Coche";
        $resultCoche = $conn->query($sqlCoche);
        $x = 1;
        while ($row = $resultCoche->fetch_assoc()) {
            if ($x < 4){
                
                    ?>
                <section class="card">
                               <img src="./imagenes/<?php echo $row["Foto"];?>" alt="">
                               <p class="NombrePaquete2"><?php echo $row["Marca"];?> <?php echo $row["Modelo"];?></p>
                               <p class="precio2"> Año: <?php echo $row["Año"];?></p>
                               <p class="textDescription2">
                               <strong><?php echo "Precio: " . $row["Precio"];?> €</p></strong>
                               <p><a href="Inicio.php" class="BotonVer">Comprar</a> <a href="Comparador2.php" class="BotonVer">Comparar</a></p>
                           </section>   
               
               <?php
               $x++;
            }
            else{
$x=2;             
?>
</section>
</article>  
<article class="nike">
<section class="recomendados2">          
<section class="card">
                               <img src="./imagenes/<?php echo $row["Foto"];?>" alt="">
                               <p class="NombrePaquete2"><?php echo $row["Marca"];?> <?php echo $row["Modelo"];?></p>
                               <p class="precio2"> Año: <?php echo $row["Año"];?></p>
                               <p class="textDescription2">
                               <strong><?php echo "Precio: " . $row["Precio"];?> €</p></strong>
                               <p><a href="Inicio.php" class="BotonVer">Comprar</a> <a href="Comparador2.php" class="BotonVer">Comparar</a></p>
                           </section>   
<?php
 }
 }
 ?>
 </section>
</articule>
</div>


    <article class="banner3"></article>

    <article class="nike">
        <p class="tituloPa">¿Por qué usar ejemplo?</p>
        <p>Descubre el poder de la comparación automotriz en un solo lugar: ¡Tu guía definitiva para elegir el mejor coche!
        </p>
    </article>
    <footer class="pie-pagina">
        <div class="grupo1">
            
            <div class="box">
                <figure>
                    <a href="#menu1">
                        <img src="Fotos/LogoSinFondo.png" alt="Logo de Decimas">
                    </a>
                </figure>
            </div>

            <div id="box" class="box">
                <h2>SOBRE NOSOTROS</h2>
                <p>es una empresa con un amplio catálogo de vehículos deportivos donde puedes comparar tus coches favoritos.</p>
                <p>Somos una empresa nueva que proporcionamos la mejor información de todo tipos de coches a nuestros clientes.</p>
                <p>Empresa original de Madrid (España).</p>
                <p>Telefono atención al cliente: +34 658 34 60 55.</p>
            </div>

            <div class="box">
                <h2>SIGUENOS</h2>
                <div class="red-social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-youtube"></a>
                </div>
            </div>

        </div>
        <div class="grupo2">
            <small>&copy; 2023 <b>Nombre empresa</b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>
</body>
</html>
