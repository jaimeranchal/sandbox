"use strict"
//declaraciones
let aAlumnos=[]; 

let entradaDatos=()=>{
    let nombre=prompt("Introduzca nombre [Cancelar->Fin]");
    //let i=0;
    while(nombre!=null){
        let apellidos=prompt("Introduza apellidos");
        let edad=parseInt(prompt("Introduzca Edad"));
        //añadir datos al array
        // aAlumnos[i]=[];
        // aAlumnos[i][0]=nombre;
        // aAlumnos[i][1]=apellidos;
        // aAlumnos[i][2]=edad
        
        // i++;
        aAlumnos.push([nombre, apellidos, edad]);
        nombre=prompt("Introduzca nombre [Cancelar->Fin]");
    }

}
let mostrarDatos=()=>{
    aAlumnos.forEach(element => {
        console.log(`${element[1]}, ${element[0]} tiene ${element[2]} años`);
    });

}

//script principal
entradaDatos();
//ordenar el array descendente por apellidos
aAlumnos.sort((a,b)=>{
    return b[2]-a[2] //por edad(números) de forma descente
   // return b[1].localeCompare(a[1]) //carácteres alfabéticos
}
)
mostrarDatos();