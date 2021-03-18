"use strict";

/* Ejercicio para crear elementos a partir de un html vacío */ 

let n = 1; // contador de lista

window.addEventListener("load", () => {
    // crearBotones();
    crearBotones2();
    crearLista();
})

let crearBotones = () =>{
    let boton, boton1, boton2, boton3;
    let capa = document.createElement("div") // crear nodo
    capa.setAttribute("id", "capaBotones"); // fijar atributos
    document.body.appendChild(capa); // añadimos la capa al body
    
    // botón añadir
    boton = document.createElement("input");
    boton.id="anadir";
    boton.value="añadir";
    boton.setAttribute("type", "button");
    // capa.appendChild(boton);
    document.getElementById("capaBotones").appendChild(boton);

    /* Clonado manual de elementos */
    //boton modificar (con clonado)
    // boton1 = boton.cloneNode(true);
    // boton1.id = "modificar";
    // boton1.value="modificar";
    // capa.appendChild(boton1);

    //boton anadirAntes (con clonado)
    // boton2 = boton.cloneNode(true);
    // boton2.id = "anadirAntes";
    // boton2.value="añadir antes";
    // capa.appendChild(boton2);

    //boton eliminar (con clonado)
    // boton3 = boton.cloneNode(true);
    // boton3.id = "eliminar";
    // boton3.value="eliminar";
    // capa.appendChild(boton3);
}

let crearBotones2 = () =>{
    document.body.appendChild(crearObjeto("div", "capaBotones", null, null));
    document.getElementById("capaBotones").appendChild(crearObjeto("input", "anadir", "button", "Añadir"));
    document.getElementById("capaBotones").appendChild(crearObjeto("input", "modificar", "button", "Modificar"));
    document.getElementById("capaBotones").appendChild(crearObjeto("input", "eliminar", "button", "Eliminar"));
    document.getElementById("capaBotones").appendChild(crearObjeto("input", "anadirA", "button", "Añadir antes"));
    // asignar eventos
    document.getElementById("anadir").addEventListener('click', addElemento);
    document.getElementById("modificar").addEventListener('click', updateElemento);
    document.getElementById("eliminar").addEventListener('click', delElemento);
    document.getElementById("anadirA").addEventListener('click', addElementoAntes);

    // controlar que no genere modificar o eliminar si no hay elementos de lista
    toggleBotones(true);
}
let crearObjeto = (ele, id, tipo, valor) => {
    let objeto = document.createElement(ele);
    if (tipo != null) {
        objeto.type = tipo;
    }
    if (id != null) {
        objeto.id = id;
    }
    if (valor != null) {
        objeto.value = valor;
    }
    return objeto;
}

let addElemento = () => {
    let texto, li;
    // texto = document.createTextNode("Elemento de lista");
    // texto = document.createTextNode(prompt("Nombre: "));
    texto = document.createTextNode("Elemento "+n);
    li = crearObjeto("li", null, null, null);
    li.appendChild(texto);

    document.getElementById("listaElementos").appendChild(li);

    // incrementar n
    n++;

    // habilitar botones para manejar los elementos de la lista
    // if (n>1) {
    if (document.getElementById("listaElementos").hasChildNodes()) {
        toggleBotones(false);
    }

    
}
let updateElemento = () => {
    // con replaceChild(new, old)
    let texto = document.createTextNode("Elemento "+n);
    let nodoNuevo = crearObjeto("li", null, null, null);
    nodoNuevo.appendChild(texto);
    let nodoViejo = document.getElementById("listaElementos").lastChild;
    document.getElementById("listaElementos").replaceChild(nodoNuevo, nodoViejo);
    n++;
}
let delElemento = () => {
    // removeChild(old)
    let nodoEliminado = document.getElementById("listaElementos").lastChild;
    // si quisieramos uno especial
    // let nodoEliminado = document.getElementById("listaElementos").childNodes[2];
    document.getElementById("listaElementos").removeChild(nodoEliminado);
    n--;

    // deshabilita los botones de manejar elementos
    if (document.getElementById("listaElementos").childNodes.length == 0){
        toggleBotones(true);
        //n=1;
    }
}
let addElementoAntes = () => {
    // insertBefore(new, ref)
    let texto = document.createTextNode("Elemento "+n);
    let nodoNuevo = crearObjeto("li", null, null, null);
    nodoNuevo.appendChild(texto);
    let nodoViejo = document.getElementById("listaElementos").lastChild;

    document.getElementById("listaElementos").insertBefore(nodoNuevo, nodoViejo);
    n++;
}

let crearLista = () =>{
    document.body.appendChild(crearObjeto("div", "capaLista", null, null));
    document.getElementById("capaLista").appendChild(crearObjeto("ul", "listaElementos", null, null));
}

let toggleBotones = (valor) => {
    document.getElementById("eliminar").disabled = valor;
    document.getElementById("modificar").disabled = valor;
    document.getElementById("anadirA").disabled = valor;
}


