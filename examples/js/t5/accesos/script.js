"use strict"

window.addEventListener("load", () => {
    document.getElementsByTagName("input")[3].addEventListener('click', mostrar);
    document.getElementsByName("rad");    
})
let mostrar = () => {
    // imprime el valor de todos los radio buttons
    // for (let ele of document.getElementsByName("rad")) {

    // imprime solo los radios que tienen la clase "edad"
    // for (let ele of document.getElementsByClassName("edad")) {

    // imprime solo los radios que tienen el id "radx"
    // QuerySelector usa los selectores de CSS
    for (let ele of document.querySelectorAll("input[id*='rad']")){
        console.log(ele.value);
        // establecer evento click a los radios
        ele.addEventListener('click', cambioObjeto);
    }
}
// function cambioObjeto(){
let cambioObjeto = function() {
    // this.type = "button";
    this.setAttribute("type", "button");
    // borramos el span
    this.nextSibling.innerHTML="";
    // establecer evento click
    this.addEventListener('click', ()=>{
        Swal.fire("Ha pulsado el botón " + this.value);
    })
  
}
