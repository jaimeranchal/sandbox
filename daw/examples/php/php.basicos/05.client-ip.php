<?php
//Si la ip es de una internet compartida
/* Si se ejecuta en LOCALHOST, da un error de índice no
 * encontrado con 'HTTP_CLIENT_IP'; para obtener la ip
 * hay que usar getenv()
 */
if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
    {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } 
// Si la ip es de un proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
    { 
        $ip =  $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
// si la ip es de una dirección remota
else 
    {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
echo $ip;
?>
