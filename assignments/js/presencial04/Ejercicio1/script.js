"use strict"

let guardar = document.getElementById("guardar");

window.addEventListener('load', ()=>{
    muestraAficion();
    guardar.addEventListener('click', actualizarCookie);
})

let actualizarCookie = () => {
    // referencia a las opciones
    let eleccion = document.getElementsByName("aficion");
    let valor = "";
    // busca la opción seleccionada
    eleccion.forEach(ele=>{
        if (ele.checked) {
            valor = ele.value;
        }
    })
    creaCookie(valor);
}

// crea la cookie con la aficion escogida
let creaCookie = (aficion) => {
    let fecha = new Date();
    let clave = "aficion";
    fecha.setTime(fecha.getTime()+432000000);
    document.cookie=clave+ "="+aficion+";expires="+fecha+" GMT";       
}

let muestraAficion = () => {
    let aficion = ""; 
    // referencia a las opciones
    let eleccion = document.getElementsByName("aficion");
    aficion = leerCookie();

    // marca la opción guardada en la cookie
    eleccion.forEach(ele=>{
        if (ele.value === aficion) {
            ele.checked = true;
        }
    })
    alert(`Su mayor afición es ${aficion}`);
};


// lee la cookie y devuelve el número de intentos
let leerCookie = () => {
    let arrCookies, aficion = 0;
    // Si ya hay una cookie, busca la clave "aficion"
    if (document.cookie !=""){
        arrCookies = document.cookie.split(";");
        arrCookies.forEach(ele=>{
            // separamos cada fila del array resultante en 
            // clave [0] = valor [1]
            let claveArray=ele.split("=");
            if(claveArray[0].trim() == "aficion"){
                aficion=claveArray[1];
            }
        });
    } 
    return aficion;
}
