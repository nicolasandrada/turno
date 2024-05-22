//buscando el obj boton 
let btn = document.getElementById('btn_ver')

//agrego un evento y le digo que funcion ejecuta
btn.addEventListener("click", buscar )

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
        return data.json();
    })
    //Respuesta del archivo consultado
    .then(respuesta => { 
        console.log(respuesta);
    })
}