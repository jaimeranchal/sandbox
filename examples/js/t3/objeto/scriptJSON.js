"use strict"
//declaraciones

//objeto JSON
let persona={
   nombre:"",
   apellidos:"",
   edad:0,

   //métodos
   mostrar:function(){
    document.write("El nombre es "+ this.nombre+ " apellido es "+this.apellidos +" y tiene "+this.edad +" años")
    // document.write(`El nombre es ${this.nombre} apellido es ${this.apellidos} y tiene ${this.edad} años`)
   }
//    mostrarI:function(){
//    }
       
}

//script
persona.nombre=prompt("Introduzca el nombre");
persona.apellidos=prompt("Introduzca apellidos");
persona.edad=prompt("Introduzca edad");
persona.mostrar();
