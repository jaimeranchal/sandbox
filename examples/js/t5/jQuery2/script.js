"use strict"
$(()=>{ // window.addEventListener("load",()=>{})
  //funcionalidad al botón
  $("#ejecutar").on("click", mostrar);
})

let mostrar=()=>{
    let texto="<b>1.- Seleccionar todos los módulos de primero y mostrar los nombres</b>"
    $("ul:first li a").each((ind,ele)=>{
    //$("a").each((ind,ele)=>{
       // texto+="<br>" + ele.innerText
       texto+="<br>" + $(ele).text()
    });
     texto+="<br><b>2.- Seleccionar el módulo de Sistemas Informáticos</b>"
   //  texto +="<br>"+ $("[href='SImod.html']").text();
   texto +="<br>"+ $("ul:first li:nth-child(3)").text(); 

   texto+="<br><b>3.- Seleccionar los módulos que están detrás de  Sistemas Informáticos</b>"
  
    $("ul:first li:gt(2)").each((ind,ele)=>{
      texto+="<br>" + $(ele).text()
    });

    texto+="<br><b>4.- Seleccionar los módulos que tengan atributo href</b>"
  
    $("a[href]").each((ind,ele)=>{
      texto+="<br>" + $(ele).text()
    });
    texto+="<br><b>5.- Seleccionar los módulos que no tengan atributo href</b>"
  
    $("a").not("[href]").each((ind,ele)=>{
      texto+="<br>" + $(ele).text()
    });
    texto+="<br><b>5.- Seleccionar los módulos BD y LM</b>";
    $("[href^='mod']").each((ind,ele)=>{
      texto+="<br>" + $(ele).text()
    });
    texto+="<br><b>6.-  Todas las horas de los módulos de segundo</b>";
    $("ul>li>ul").find ("li:contains('horas')").each((ind,ele)=>{
      texto+="<br>" + $(ele).text()
    });
    texto+="<br><b>7.-  Seleccionar los li vacíos y se establerá el texto 'Nodo vacío'</b>";
    $("li:empty").text("Nodo vacío");
    
    $(".capaMostrar").html(texto);
}   