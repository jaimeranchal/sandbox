"use strict"
//declaracion 
let aNum=[];
function validarNum(num){
    
    while (num!=null && (isNaN(num)||num<1 || num>100)){
        num=prompt("¡¡Error!! Vuelva a introducir número [1-100]");
    }
    return num;
}
function crearArray(){
    let numero;
    let i=0;
    numero=validarNum(prompt("Introduzca Numero"));
    while (numero!=null){
        //aNum[i]=numero;
        //i++;
        aNum.push(numero)
        numero=validarNum(prompt("Introduzca Numero"));
    }
} 
function mostrarArray(){
    for (let index = 0; index < aNum.length; index++) {
        console.log(aNum[index]);
        
    }
}
//body
crearArray();
mostrarArray();
