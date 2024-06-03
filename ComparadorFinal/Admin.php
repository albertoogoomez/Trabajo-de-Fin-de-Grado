<?php
        // Establecer la conexión a la base de datos
        $servername = "localhost";
        $username = "lujocars";
        $password = "alberto123";
        $dbname = "coches1";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
?>
        <!DOCTYPE html>
<html lang="es"></html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario coche</title>
    <link rel="stylesheet" type="text/css" href="Admin.css">
</head>
<body>
<div class="section-container">
<div class="section">
<h2>Agregar Coche</h2>
<div class="section">

    <form action="insertar2.php" method="post" enctype="multipart/form-data">
        <h4>Coche</h4>
        <label for="foto">Foto:</label>
       <input type="file" name="imagen" id="imagen" accept="image/*" required>

<br>
<br>
        <label for="marca">Marca:</label>
        <input type="text" name="marca" required><br>
<br>
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" required><br>
<br>
        <label for="año">Año:</label>
        <input type="text" name="año" required><br>
<br>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" required> €<br>
<br>
        <label for="color">Color:</label>
        <input type="text" name="color" required><br>
<br>
        <label for="peso">Peso:</label>
        <input type="text" name="peso" required> Kg<br>
<br>
        <label for="longitud">Longitud:</label>
        <input type="text" name="longitud" required> mm<br>
<br>
        <label for="anchura">Anchura:</label>
        <input type="text" name="anchura" required> mm<br>
<br>
        <label for="altura">Altura:</label>
        <input type="text" name="altura" required> mm<br>
<br>
        <label for="plazas">Número de plazas:</label>
        <input type="text" name="plazas" required><br>
<br>
        <label for="volumen">Volumen de maletero:</label>
        <input type="text" name="volumen" required> Litros<br>
<br>
        <label for="puertas">Número de puertas:</label>
        <input type="text" name="puertas" required><br>
<br>
</div>
<div class="section">
        <h4>Prestaciones</h4>

        <label for="velocidad">Velocidad máxima:</label>
        <input type="text" name="velocidad" required> Km/h<br>
<br>
        <label for="aceleracion">Aceleración:</label>
        <input type="text" name="aceleracion" required> s<br>
<br>
        <label for="distintivo">Distintivo medioambiental:</label>
        <input type="text" name="distintivo" required><br>
<br>
</div>
<div class="section">
        <h4>Motor</h4>

        <label for="caballos">Caballos de potencia:</label>
        <input type="text" name="caballos" required> Cv<br>
<br>
        <label for="torque">Torque:</label>
        <input type="text" name="torque" required> Nm<br>
<br>
        <label for="cilindrada">Cilindrada:</label>
        <input type="text" name="cilindrada" required> cm³<br>
<br>
        <label for="tipo">Tipo de motor:</label>
        <input type="text" name="tipo" required><br>
<br>
        <label for="consumo">Consumo:</label>
        <input type="text" name="consumo" required> l/100 km<br>
<br>
        <label for="combustible">Combustible:</label>
        <input type="text" name="combustible" required><br>
<br>
</div>
<div class="section">
        <h4>Transmisión</h4>

        <label for="caja">Caja de cambios:</label>
        <input type="text" name="caja" required><br>
<br>
        <label for="velocidades">Número de velocidades:</label>
        <input type="text" name="velocidades" required><br>
<br>
        <label for="traccion">Tracción:</label>
        <input type="text" name="traccion" required><br>
<br>
        <input type="submit" value="Guardar">
    </form>
</div>
</div>        
</div>        

<div class="section">
<h2>Editar Coche</h2>
<div class="section">
   <form action="editar.php" method="post">
        <label for="id">Selecciona coche:</label>
        <form action="procesar.php" method="POST">
        <select name="id" id="id">       
       <?php
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
        <br>

        <label for="campo">Campo a editar:</label>
        <select name="campo">
            <option value="marca">Marca</option>
            <option value="modelo">Modelo</option>
            <option value="foto">Foto</option>
            <option value="año">Año</option>
            <option value="precio">Precio (€)</option>
            <option value="color">Color</option>
            <option value="peso">Peso</option>
            <option value="longitud">Longitud</option>
            <option value="anchura">Anchura</option>
            <option value="altura">Altura</option>
            <option value="plazas">Número de plazas</option>
            <option value="volumen">Volumen de maletero</option>
            <option value="puertas">Número de puertas</option>
            <option value="velocidad">Velocidad máxima</option>
            <option value="aceleracion">Aceleración</option>
            <option value="distintivo">Distintivo medioambiental</option>
            <option value="caballos">Caballos de potencia</option>
            <option value="torque">Torque</option>
            <option value="cilindrada">Cilindrada</option>
            <option value="tipo">Tipo de motor</option>
            <option value="consumo">Consumo</option>
            <option value="combustible">Combustible</option>
            <option value="caja">Caja de cambios</option>
            <option value="velocidades">Número de velocidades</option>
            <option value="traccion">Tracción</option>
        </select><br>

        <label for="valor">Nuevo valor:</label>
        <input type="text" name="valor" required><br>

        <input type="submit" value="Editar">
    </form>
    </div> 
    </div> 
<div class="section">
  <h2>Borrar Coche</h2>
  <div class="section">
    <form action="borrar.php" method="post">
        <label for="id">Selecciona coche:</label>
        <select name="id" id="id">       
       <?php
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
        <br>
        <input type="submit" value="Borrar" onclick="return confirmarBorrado()">
    </form>
    </div> 
    </div> 
</body>
</html>
