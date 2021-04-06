/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.onload = function () {
  document.getElementById("guardar").addEventListener("click", fijarAficion);
  //leer la cookie para extraer la afición y chequear
  leerCookie();
};

function leerCookie() {
  let datos;

  if (document.cookie.length != 0) {
    datos = document.cookie.split("="); //leer la cookie y separar la clave del valor

    //checkear el botón
    for (let dato of document.getElementsByName("aficion")) { //recorrer los checkbox
      if (dato.value == datos[1]) { //Si el checkbox coincide con la afición de la cookie se chequea
        dato.checked = true;
        alert(`La afición que tiene es ${datos[1]}`)
      }
    }
  }
}

function fijarAficion() {
  let fecha = new Date();
  let aficion;
  fecha.setTime(fecha.getTime() + (5 * 24 * 60 * 60 * 1000)); // 5 días
  //checkear el botón
  for (let dato of document.getElementsByName("aficion")) {
    if (dato.checked) {
      aficion = dato.value;
      //guardar la cookie
      document.cookie = "aficion=" + aficion + ";expires=" + fecha;
      alert("Afición guardada")
    }
  }


}