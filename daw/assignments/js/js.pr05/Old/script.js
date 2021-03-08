"use strict"
let arrayBotones = [];
let arrayBotOrd=[];
let cont=0;
window.addEventListener("load", () => {
    document.getElementById("ejecutar").addEventListener("click", comenzar)
})

let comenzar = () => {
    let i = 0;
    let numBot = document.getElementsByClassName("dato")[0].value

      
    //comprobar que es un número correcto
    if (numBot < 5 || numBot > 15) {
        mostrarTexto("Mínimo botones 5 y máximo 15", "warning")
    } else {
        //crear array de números entre 1 y 50
        
        do {
            let numero = Math.round(Math.random() * 49) +1 //generar el número aleatorio
            if (arrayBotones.indexOf(numero) ==-1) { //comprobar si el número existe en el array
                arrayBotones.push(numero);
                i++;
            } 
            
        } while (i < numBot)
        //deshabilitar botón comenzar
        document.getElementById("ejecutar").disabled=true;
        //crear una copia del array
        arrayBotOrd = arrayBotones.slice();
        //ordenar de mayor a menor
        arrayBotOrd.sort((a,b)=>b-a);
        crearBotones();

    }
}
let crearBotones = () => {
    //crear botones
    arrayBotones.forEach((ele, ind) => {
        document.getElementsByClassName("capaBotones")[0].appendChild(crearObjeto("e", "button", ind, null, null));
        document.getElementById(ind).className = "btn btn-success mr-2"
        document.getElementById(ind).innerText = ele
        document.getElementById(ind).addEventListener("click", comprobar)

    })


}
function comprobar(){
    //comprobamos el valor que tiene el boton con el primer elemento del array
    if (this.innerText==arrayBotOrd[0]){
        this.disabled=true
        arrayBotOrd.splice(0,1) //eliminamos del array el primer elemento
    }else{
        cont++;
    }
    if (arrayBotOrd.length==0){ //si no hay elementos es que hemos acabado el proceso
        mostrarTexto("Has necesitado "+ cont + " pulsaciones", "success");
        //limpiar
        document.getElementsByClassName("capaBotones")[0].innerText="" //limpiamos la capa de botones
        document.getElementsByClassName("dato")[0].value=""; //limpiar la caja de texto
        document.getElementById("ejecutar").disabled=false;  //deshabilitar botón comenzar
        arrayBotones=[]
    }
}
//función que permite mostrar mensajes con sweetAlert
let mostrarTexto = (texto, icono) => {
    Swal.fire({
        text: texto,
        position: 'top-end',
        icon: icono,
        showConfirmButton: false,
        timer: 1500,
    })
}



function crearObjeto(ele, etiqueta, id, tipo, texto) {
    let objeto
    if (ele == "e") {
        objeto = document.createElement(etiqueta);
        if (id != null) {
            objeto.setAttribute("id", id);
        }
        if (tipo != null) {
            objeto.setAttribute("type", tipo);
        }
        if (texto != null) {
            objeto.setAttribute("value", texto);
        }
    } else {
        objeto = document.createTextNode(etiqueta);
    }

    return objeto;

}