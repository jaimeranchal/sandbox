<?php
// script que detecta el navegador
$navegador = $_SERVER['HTTP_USER_AGENT'];
?>

<p>Your user-agent is: <?=$navegador;?></p>

<?php
//Alternativa
echo "Your User-Agent is: " . $_SERVER['HTTP_USER_AGENT'];
?>
