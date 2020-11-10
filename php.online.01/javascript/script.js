"use strict"
function openTab(evt, tab) {
    // declaro variables
    let i, tabcontent, pagelink;

    // obtiene todos los elementos con la clase "tabcontent" y los esconde
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // obtiene todos los elementos con la clase "page-link" y elimina la clase "activa"
    pagelink = document.getElementsByClassName("page-link");
    for (i = 0; i < pagelink.length; i++) {
        pagelink[i].className = pagelink[i].className.replace(" active", "");
    }


    // Muestra la pestaña actual, y añade una clase activa al botón que abría la pestaña
    document.getElementById(tab).style.display = "block";
    evt.currentTarget.className += " active";
}
