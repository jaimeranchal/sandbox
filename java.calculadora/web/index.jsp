<%-- 
    Document   : index
    Created on : 17-ago-2020, 13:34:38
    Author     : javier
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="estilo.css" />
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Calculadora Web - 2ºDAWS</title>
    </head>
    <body>
        <h1>Calculadora - 2ºDAWS</h1>
     <div class="centrar">
         <form action="Controlador"  method="POST">
         <table>
                                     
                    <tr>
                        <td width="150px"><b>Número 1: </b></td>
                        <td width="10px"><input type="text" name="num1" size="20" Value="Número 1" onclick="this.value=''" />
                        </td>
                    </tr>
					 <tr>
                        <td width="150px"><b>Número 2: </b></td>
                        <td width="10px"><input type="text" name="num2" size="20" Value="Número 2" onclick="this.value=''" />
                        </td>
                    </tr>

					<tr>
                        <td height="50px" width="50px"> 
						
                        </td>
                    </tr>       
</table>
        
         <div class="centrarboton">   
             <input type="submit" name="btnsuma" value="SUMAR" class="boton">
            <input type="submit" name="btnresta" value="RESTAR" class="boton">
            
              </form>
    </body>
</html>
