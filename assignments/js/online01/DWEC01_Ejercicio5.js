"use strict";
let nota;
nota = parseInt(prompt("Introduce la nota del alumno/a [1-10]: "));
while (nota != 0 && nota) {
  if (nota > 0 && nota < 11) {
    switch (nota) {
      case 1:
      case 2:
      case 3:
      case 4:
        console.log(nota + "->Insuficiente");
        break;
      case 5:
      case 6:
        console.log(nota + "->Aprobado");
        break;
      case 7:
      case 8:
        console.log(nota + "->Notable");
        break;
      case 9:
      case 10:
        console.log(nota + "->Sobresaliente");
        break;
      default:
    }
    nota = parseInt(prompt("Introduce la nota del alumno/a [1-10]: "));
  } else {
    nota = prompt("Error\nVuelve a introducir la nota [1-10]");
  }
}

