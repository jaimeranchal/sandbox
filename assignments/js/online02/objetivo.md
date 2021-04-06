# Tarea 2


## Ejercicio 1: crea ventanas

Realizar un script en un fichero externo que permita:

- Crear 10 ventanas desde la ventana principal, indicando el texto "Ventana Secundaria 1", "Ventana Secundaria 2"...
- El tamaño de la ventana será 300pxX300px
- En la ventana secundaria tendrá un botón Cerrar que permitirá cerrar esa ventana secundaria.

## Ejercicio 2: cumpleaños domingueros
Crear un script en fichero externo que:

- pida fechas de nacimientos (dd/mm/yyyy) 
- muestre por consola los años donde el cumpleaños va a caer en domingo desde este año hasta el año 2100.
- Si la fecha no es correcta se mostrará un error y volverá a pedir el dato.
- El script no avanzará hasta que el dato no sea correcto.
- El proceso se repetirá hasta que el usuario desee acabar, para ello se utilizará el método `confirm()`. 

## Ejercicio 3: lotería
Crear un script en fichero externo que **jugar a la "Lotería primitiva"**:

- se pedirá al usuario que introduzca 6 números enteros comprendidos entre el 1 y el 49 ambos incluidos.
    - Otro datos será incorrecto.
    - Se utilizará un bucle para controlar que el dato sea correcto.
    - No estará permitido repetir número.
- Una vez elegido los 6 números, nos mostrará los números elegidos, así como la Combinación ganadora.
    - La combinación ganadora constará de 6 números entre 1 y 49 elegidos al azar por el programa.
- Finalmente el script indicará cuántos aciertos hemos tenido.
- El juego se repetirá hasta que el usuario desee acabar.

## Ejercicio 4: imprime en bucle
Crear un script en un fichero externo que nos pida introducir una cadena mediante la función `prompt()`.

- Cada 3 segundos se irá mostrando ese mensaje en la página.
- Cuando transcurra 20 segundos se acabará de mostrar esos mensajes.
- Se utilizará el método `setInterval()`

```javascript
//Ejemplo

setInterval() //imprime: 1.- JavaScript es un lenguaje debilmente tipado.
setInterval() //imprime: 2.- JavaScript es un lenguaje debilmente tipado.
     ........
setInterval() //imprime: n.- JavaScript es un lenguaje debilmente tipado.
```

## Ejercicio 5: transformar cadenas
Crear un script en un fichero externo que pida al usuario el **nombre** y **apellidos** y:

- muestre por pantalla:
    - El tamaño del nombre más los apellidos (sin contar espacios)
    - La cadena en minúsculas y en mayúsculas.
- Dividir el nombre y los apellidos , los muestre en 3 líneas donde indique; Nombre:XXX; Apellido1:XXXX Apellido2:XXXX
- Mostrar una propuesta de nombre de usuario, compuesto por la inicial del nombre, el primer apellido y la inicial del segundo apellido: Ejemplo// Juan Holgado Pérez sería jholgadop.
- Mostrar una propuesta de nombre de usuario compuesto por las tres primeras letras del nombre y de los dos apellidos: ejemplo juaholper
