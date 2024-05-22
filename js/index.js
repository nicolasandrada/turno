//buscando el obj boton 
let i_fecha = document.getElementById('fecha')

//agrego un evento y le digo que funcion ejecuta
i_fecha.addEventListener("change", buscar)

//declaro funcion
function buscar(){
    let fecha = document.getElementById('fecha').value
    console.log(fecha)

    //Consulta asincronica
    fetch('ajax/verificar_horario.php', {
        method: 'POST',
        body: JSON.stringify({
            'f':fecha
        }) 
    })
    //como va a estar codificada la info
    .then(function(data){
        return data.text();
    })
    //Respuesta del archivo consultado
    .then(respuesta => { 
        //console.log(respuesta);
        document.getElementById('hora').innerHTML = respuesta
    })
}