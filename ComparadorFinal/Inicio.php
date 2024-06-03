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
    <header class="parallax">
        <div class="parallax-text">
            <h2>King Motors</h2>
            <p>Descripción</p>
        </div>
        <div class="abajo">
            <div class="desliza">
                <p>Desliza hacia abajo</p>
                <img src="Fotos/DownArrow2.png" alt="">
            </div>
        </div>
    </header>


    <article class="nike">
        <p class="tituloPa">Coches destacados</p>
        <p>¡Descubre nuestros coches destacados y lleva tu experiencia de conducción al siguiente nivel!
            <br>
            Explora nuestra selección de coches de alta gama que combinan elegancia, potencia y tecnología de vanguardia.
        </p>
        <section class="recomendados2">
            <section class="card">
                <img src="Fotos/Afa Romeo Giulia GTA.png" alt="">
                <p class="NombrePaquete2">Afa Romeo Giulia GTA</p>
                <p class="precio2">194.000 €</p>
                <p class="textDescription2">
                    El Alfa Romeo Giulia GTA es un sedán deportivo de alto rendimiento con un diseño agresivo y un motor V6 biturbo de más de 500 caballos de fuerza. Ofrece una experiencia de conducción emocionante con su carrocería ensanchada, detalles de fibra de carbono y tecnología avanzada. Combina lujo y deportividad en su interior, convirtiéndolo en el sueño de los amantes de los automóviles de alto rendimiento.</p>
                <a href="Comparador2.php" class="BotonVer">Comparar</a>
            </section>

            <section class="card">
                <img src="Fotos/McLaren 765 LT Spider.png" alt="">
                <p class="NombrePaquete2">McLaren 765 LT Spider</p>
                <p class="precio2">450.000 €</p>
                <p class="textDescription2">El McLaren 765LT Spider es un descapotable de alto rendimiento con un motor V8 twin-turbo de más de 750 caballos de fuerza. Su diseño aerodinámico y agresivo se combina con un techo retráctil para una experiencia de conducción al aire libre. Con tecnología avanzada y una aceleración impresionante, el 765LT Spyder ofrece lujo y emoción en un automóvil descapotable de élite.</p>
                <a href="Comparador2.php" class="BotonVer">Comparar</a>
            </section>

            <section class="card">
                <img src="Fotos/Ferrari 812 Superfast.png" alt=""> 
                <p class="NombrePaquete2">Ferrari 812 Superfast</p>
                <p class="precio2">339.000 €</p>
                <p class="textDescription2">
                    El Ferrari 812 Superfast es un superdeportivo icónico con un motor V12 de más de 800 caballos de fuerza. Su diseño aerodinámico combina elegancia y agresividad. En el interior del depotivo, hay una mezcla de alcántara y fibra de carbono. Ofrece una experiencia de conducción emocionante con una velocidad impresionante de más de 340 km/h. Es la combinación perfecta de lujo y rendimiento.</p>  
                <a href="Comparador2.php" class="BotonVer">Comparar</a>                 
            </section>
        </section>
    </article>  


    <aside class="bannerPromo">
        <div class="info">
            <h2>Mercedes, una marca de confianza</h2>
        </div>
    </aside>


    <article class="MejoresOfertas">
        <br>
        <p class="TituloPag">NUESTRO COMPARADOR</p>
            
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
                <section class="card">
                    <img src="#" alt="">
                    <p class="NombrePaquete">Ejemplo</p>
                    
                    <p class="textDescription">Con nuestro comparador de coches podrás comparar tus coches favoritos.</p>
                    <a href="Comparador2.php" class="BotonVer">Comparar</a>
                </section>

                
            
    </article>

    


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
            <small>&copy; 2023 <b>Nomvre empresa</b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>
</body>
</html>
