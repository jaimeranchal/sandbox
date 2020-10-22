
    "use strict";
    let long1, long2, long3;
    do {
      long1 = prompt("Introduce el primer lado: ");
      long2 = prompt("Introduce el segundo lado: ");
      long3 = prompt("Introduce el tercer lado: ");
      let mensaje = "lado1=" + long1 + " lado2=" + long2 + " lado3=" + long3;
      // Calcular lado mayor
      let ladoMayor = Math.max(long1, long2, long3);
      console.log("El lado mayor es " + ladoMayor);
      // Lado mayor < suma de los demás lados
      if (
        ladoMayor < long1 + long2 &&
        ladoMayor < long2 + long3 &&
        ladoMayor < long1 + long3
      ) {
        // Calcular tipo de triángulo
        if (long1 == long2 && long2 == long3) {
          console.log(mensaje + " El triángulo es equilátero");
        } else if (
          (long1 == long2 && long1 != long3) ||
          (long1 == long3 && long1 != long2) ||
          (long2 == long3 && long2 != long1)
        ) {
          console.log(mensaje + " El triángulo es isósceles");
        } else {
          console.log(mensaje + " El triángulo es escaleno");
        }
      } else {
        alert(mensaje + " No se puede formar un triángulo");
      }
    } while (long1 != "0" && long1);