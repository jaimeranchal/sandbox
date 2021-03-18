"use strict"
window.addEventListener("load", ()=>{
    document.getElementById("capa").addEventListener("click", ()=>{
       // alert("capa Padre burbujeo, parámetro false")
       alert("capa Padre captura parámetro true")
    }, true)
    document.getElementById("capaII").addEventListener("click", (e)=>{
        alert("Capa Hijo II");
        // Descomentar esta línea para DETENER la propagación
        // del burbujeo; después de hacer click, no se expande
        // e.stopPropagation();
    })
})
