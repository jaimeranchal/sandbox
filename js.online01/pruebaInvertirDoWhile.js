
      "use strict";
      let num;
      let numInvertido = 0;
      do {
        // Uso parseInt para asegurarme de que
        // se introduce un número y no cualquier cadena
        num = parseInt(prompt("Introduce un número de 3 cifras: "));
        numInvertido = "";
        if (num > 100 && num < 1000) {
        //if (num.toString().length == 3) {
          // invierte num y comprueba si son iguales
          for (var i = 2; i >= 0; i--) {
          //for (var i = num.toString().length - 1; i >= 0; i--) {
            numInvertido += num.toString()[i];
          }
          //console.log("El número inverso de " + num + " es " + numInvertido);
          if (numInvertido.charAt(0) == num.toString().charAt(0)) {
            console.log(
              "El número inverso de " + num + " es igual al original"
            );
          } else
            console.log(
              "El número inverso de " + num + " no es igual al original"
            );
        } else {
          // mensaje de error
          console.log("El número " + num + " no es de 3 cifras");
        }
        // vuelve a pedir datos (debería ir antes?)
      } while (num != 0 && num);