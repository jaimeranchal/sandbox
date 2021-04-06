"use strict";
let mes;

mes = parseInt(prompt("Introduce el número del mes (1-12): "));
while (mes != 0 && mes) {
  if (mes > 0 && mes < 13) {
    switch (mes) {
      case 1:
        console.log(mes + "->Enero");
        break;
      case 2:
        console.log(mes + "->Febrero");
        break;
      case 3:
        console.log(mes + "->Marzo");
        break;
      case 4:
        console.log(mes + "->Abril");
        break;
      case 5:
        console.log(mes + "->Mayo");
        break;
      case 6:
        console.log(mes + "->Junio");
        break;
      case 7:
        console.log(mes + "->Julio");
        break;
      case 8:
        console.log(mes + "->Agosto");
        break;
      case 9:
        console.log(mes + "->Septiembre");
        break;
      case 10:
        console.log(mes + "->Octubre");
        break;
      case 11:
        console.log(mes + "->Noviembre");
        break;
      case 12:
        console.log(mes + "->Diciembre");
        break;

      default:
    }
    mes = parseInt(prompt("Introduce el número del mes (1-12): "));
  } else {
    mes = parseInt(
      prompt("Número incorrecto\nIntroduce el número del mes (1-12): ")
    );
  }
}

