"use strict"

$(()=>{
   
        $("#first, #all").on("click", mostrar);

    
})
let mostrar=function(){
    let datos={
        perro:""
    };
    if ($(this).attr("id") == "first") {
        datos.perro= "111A";
    }
    $.ajax({
        url: "php/mostrar.php",
        type: "GET",
        data:datos,
        dataType:"json"

    })
        .done(function (responseText, textStatus, jqXHRs) {
           
            //limpiar
            
            $("tbody tr").remove();
            $(responseText.data).each((ind, ele)=>{
                $("tbody").append(`<tr><td>${ele.chip}</td><td>${ele.nombre}</td><td>${ele.raza}</td><td>${ele.fechaNac}</td></tr>`)
            })
        })
        .fail(function (response, textStatus, errorThrown) {
            Swal.fire({
                position:'top-end',
                icon:'error',
                timer:1000,
                showConfirmButton: false,
                title: textStatus,
                text: errorThrown
            });
        })
    }
    
