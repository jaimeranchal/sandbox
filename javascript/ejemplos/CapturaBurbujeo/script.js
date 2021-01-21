"use strict"
window.addEventListener("load", ()=>{
    document.getElementById("capa").addEventListener("click", ()=>{
        alert("capa Padre burbujeo, parámetro false")
       // alert("capa Padre captura parámetro true")
    })
    document.getElementById("capaII").addEventListener("click", (e)=>{
        alert("Capa Hijo II");
        //e.stopPropagation();
    })
})