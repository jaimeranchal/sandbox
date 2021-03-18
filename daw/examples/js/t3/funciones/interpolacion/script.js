"use strict"

function multiplicaBis(tabla, hasta=10){
    console.log("Tabla de multiplicar con dos parametros");
   
    for(let index=1; index<=hasta; index++){
        console.log(tabla + " * " + index +  " = " + tabla*index);
        console.log(`${tabla} * ${index} = ${tabla*index}`);        //Nueva forma de hacer lo mismo de arriba
    }
}

multiplicaBis(4,7);