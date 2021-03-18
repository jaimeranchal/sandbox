"use script"

window.addEventListener("load", () => {
    let objRaiz = document.documentElement;
    mostrarArbol(objRaiz);
});

// función recursiva
let mostrarArbol=(nodo) =>{
    for (let ele of nodo.childNodes) {
        if (ele.nodeName != "#text") {
            document.write(ele.nodeName + "<br>");
            if (ele.hasChildNodes()) {
                mostrarArbol(ele)
            }
        } else {
            document.write(ele.nodeValue + "<br>")
        }

    }
}
