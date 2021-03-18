"use script"

window.addEventListener("load", ()=>{
    //leer la estructra de la página
    let html =document.documentElement //estructura inicial
    //mostrar los hijos html
    console.log(html.childNodes.length);
    let head=html.firstChild; //establecer en head la primera rama de html
    console.log (head.nodeType + " "+ head.nodeName + " "+ head.nodeValue)
    let body=html.lastChild //establecer en body la última rama de html
    console.log (body.nodeType + " "+ body.nodeName + " "+ body.nodeValue)

    //recorrer los hijos de Body
     for(let ele of body.childNodes){
         console.log( ele.nodeName + " tipo= "+  ele.nodeType)
     }
})