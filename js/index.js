//buscando el obj boton 
let btn = document.getElementById('btn_ver')

//agrego un evento y le digo que funcion ejecuta
btn.addEventListener("click", buscar )

//declaro funcion
function buscar(){
    let fecha = document.getElementById('fecha').value
    console.log(fecha)

    fetch('verificar_horario.php', {
        method: 'POST',
        body: data2 
    })








    .then(function(data){

        return data.json();
    })
    .then(myJson => { 

        console.log(myJson);

    });
}