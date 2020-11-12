"use strict"
// variables
let arrAlumnos=[];

let entradaDatos=()=>{
    let nombre = prompt("Introduzca nombre [Cancelar -> Fin]");
    while (nombre != null) {
        let apellidos = prompt("Introduzca sus apellidos");
        let edad = parseInt(prompt("Introduzca su edad"));
        // añadir al array
        // primera forma
        // arrAlumnos[i]=[];
        // arrAlumnos[i][0]=nombre;
        // arrAlumnos[i][1]=apellidos;
        // arrAlumnos[i][2]=edad;
        // i++;

        arrAlumnos.push([nombre, apellidos, edad]);
        nombre = prompt("Introduzca nombre [Cancelar -> Fin]");

    }
}

let mostrarDatos=()=>{
    arrAlumnos.forEach(element => {
        console.log(`${element[1]}, ${element[0]} tiene ${element[2]} años`)
    });
}

// cuerpo del script
entradaDatos();

// ordenar el array por apellidos desc
arrAlumnos.sort((a,b)=>{
    //return b[2]-a[2]; // números forma desc (aquí te lo ordena por Edad)
    return b[1].localeCompare(a[1]); // caracteres alfabéticos
})

mostrarDatos();
