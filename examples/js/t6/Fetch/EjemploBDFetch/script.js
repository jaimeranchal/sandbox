"use strict"

$(()=>{
   
        $("#first, #all").on("click", mostrar);

    
})
let mostrar=function(){
    let param = new FormData();
    let datos={
        perro:""
    };
    if ($(this).attr("id") == "first") {
        datos.perro= "111A";
    }
   
    param.append("perro", datos.perro)
   
    fetch("php/mostrar.php", {
            method: 'POST',
            body: param,
        })
        .then(response => response.json())
        .then((response) => {
            //limpiar
             
            $("tbody tr").remove();
            $(response.data).each((ind, ele)=>{
                $("tbody").append(`<tr><td>${ele.chip}</td><td>${ele.nombre}</td><td>${ele.raza}</td><td>${ele.fechaNac}</td></tr>`)
            })
        })
        .catch((err) => {
            Swal.fire({
                position:'top-end',
                icon:'error',
                timer:1000,
                showConfirmButton: false,
                title: "Error",
                text: err
            });

        });
    
    }
    
