<?php
/***
 * SE ENCARGA DE GENERAR UNA LISTA DE OPTIONS (DEL SELECT DE HORARIOS)
 * CON LOS TURNOS QUE YA FUERON OCUPADOS POR OTROS USUARIOS 
 */

//Toma el dato que le llega de la consulta Asincronica
$recibido = json_decode( file_get_contents("php://input"),true );

include "../conexion.php";

//verifica si entre los datos que le entragan existe "f"
if(isset($recibido["f"])){

    //la guarda como la fecha 
    $fecha = $recibido['f'];

    //consulta por la hora de todos los turnos de esa fecha 
    $SQL = "SELECT hora FROM Turno 
            WHERE fecha = '$fecha' ";

    //ejecuta la consulta
    $res = $con->query($SQL);

    //recorre el resultado hasta quedarse sin datos
    while( $fila = $res->fetch_assoc() ){
        //guarda cada elemento de fila en una posicion de a 
        $a[] = $fila['hora'];
    }
}

//Recorre de 9 a 20 porque serian los horarios de la peluqueria
for($i = 9; $i <= 20; $i++) {
    
    //se genera un texto con el numero del bucle. Ej 11:00:00
    $tiempo = "$i:00:00";
    $ocupado = false; // Variable para controlar si el tiempo está ocupado

    //foreach--> sirve para recoorer un arreglo y lo guarda en X  
    foreach($a as $x) {
        //verifica si el texto generado coincide con alguno de los turnos ocupados
        if($tiempo == $x) {
            //si es asi informa que esta ocupado
            echo "<option>Esta ocupado</option>";
            $ocupado = true;
            break; // Salir del bucle una vez que se encuentra que el tiempo está ocupado
        }
    }

    //en caso de terminar de recorrer la lista de turnos 
    //y no encontrarlo con alguno ya ocupado informa que el turno esta disponible
    if(!$ocupado) {
        echo "<option>$i:00</option>";
    }
}
