"use script";

window.addEventListener("load", ()=>{
    document.getElementById("enviar").addEventListener("click", ejecutar);
})

let ejecutar=()=> {
    let objeto=document.getElementById("mostrar");
    //diferentes formas de acceder al valor de la caja de texto
    // 1ª mediante el nombre del formulario y el nombre de la caja de texto
    objeto.innerHTML = document.formNameBusq.entradaName.value;
    document.formNameBusq.entradaName.value="Nuevo dato";

    // Indica cuántos elementos tiene el formulario (menos divs y labels)
    //2ª mediante la colección de elementos del formulario
    objeto.innerHTML += `<br>Nº de elementos del formulario ${document.formNameBusq.elements.length}`

    // Recupera e imprime el valor del primer elemento del formulario
    // 1.Por posición en el array
    objeto.innerHTML += `<br>${document.formNameBusq.elements[0].value}`;

    // mediante la colección de elementos del formulario
    // 2.Por el atributo name
    objeto.innerHTML += `<br>${document.formNameBusq.elements["entradaName"].value}`;
    // 3. Por su id
    objeto.innerHTML += `<br>${document.getElementById("entrada").value}`;

}
