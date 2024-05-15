<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Reserva tu turno</h1>

    <form action="" method="post">
        <label for="nombre"> Nombre</label>
        <input type="text" name="nombre">

        <label for="apellido"> Apellido</label>
        <input type="text" name="apellido">

        <label for="fecha"> Fecha</label>
        <input type="date" name="fecha" id='fecha'>
        <input type="button" value="Verificar" id="btn_ver">

        <label for="hora">Hora</label>
        
        <?php
        include "conexion.php";


        if(isset($_REQUEST["fecha"])){
            $fecha = $_REQUEST["fecha"];

            $SQL = "SELECT hora FROM Turno 
                    WHERE fecha = '$fecha' ";

            $res = $con->query($SQL);


            while( $fila = $res->fetch_assoc() ){
                //echo "<p>$fila[hora]</p>";
                $a[] = $fila['hora'];
            }
            //var_dump($a);
        }
        
        echo "<select name='hora'>";
        for($i = 9; $i <= 20; $i++) {
            $tiempo = "$i:00:00";
            $ocupado = false; // Variable para controlar si el tiempo está ocupado
        
            foreach($a as $x) {
                if($tiempo == $x) {
                    echo "<option>Esta ocupado</option>";
                    $ocupado = true;
                    break; // Salir del bucle una vez que se encuentra que el tiempo está ocupado
                }
            }
        
            if(!$ocupado) {
                echo "<option>$i:00</option>";
            }
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
    <a href="modificar.php">Modificar turno</a>

    <h1 id="h1"></h1>
    <script src="js/index.js"></script>
</body>
</html>