<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Reserva tu turno</h1>

    <form action="guardar.php" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido">

        <label for="fecha">Fecha</label>
        <input type="date" name="fecha">

        <label for="hora">Hora</label>
        <select name="hora">
            <?php
                for($i=9; $i<=20 ; $i++){
                    echo "<option>$i:00</option>";
                }
            ?>        
        </select>
        

        <label for="contacto">Contacto</label>
        <input type="tel" name="telefono">

        <input type="submit" value="Reservar">
    </form>
    <br>

    <a href="eliminar.php">Eliminar turno</a> 
    <br>
    <a href="">Modificar turno</a>
</body>
</html>