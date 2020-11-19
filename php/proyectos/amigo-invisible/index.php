<?php

//si existe post
if(isset($_REQUEST['s'])){
	$ok = '<div class="green">Mensaje enviado ;) | Consulta tu correo</div>';
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>amigo invisible</title>
	<link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
	<style type="text/css" media="screen">
		body {
			font-family: Arial;
		}
		#container {
			max-width: 1170px;
			margin: 0 auto;
			text-align: center;
		}
		h1 {
			font-family: 'Bangers', cursive;
			font-size: 60px;
			text-transform: uppercase;
		}
		h2 {
			font-weight: normal;
			color: #797979;
		}
		#inputNum {
			font-size: 16px;
			margin-bottom: 10px;
			padding: 10px;
		}
		#num, #start {
			font-size: 20px;
			text-transform: uppercase;
			background-color: red;
			color: #fff;
			font-weight: bold;
			border: none;
			padding: 10px 20px;
			cursor: pointer;
		}
		#num:hover {
			background-color: #D80000;
		}
		.content {
			background: #f5f5f5;
		    padding: 20px;
		    margin-top: 20px;
		    border: 1px solid #cecece;
		}
		.inputs {
			border: 1px dotted #cecece;
			margin-bottom: 10px;
			padding: 10px;
			background: #E8E8E8;
		}
		.inputs img {
			cursor: pointer;
		}
		.email, .nom {
			font-size: 16px;
			margin: 10px;
			padding: 10px;
		}
		.send {
			font-size: 20px;
			text-transform: uppercase;
			background-color: #0089FF;
			color: #fff;
			font-weight: bold;
			border: none;
			padding: 10px 20px;
			cursor: pointer;
		}
		.send:hover {
			background: #056FCA;
		}
		.green {
			background: #17DE26;
			color: #fff;
			padding: 10px;
			text-align: center;
			margin: 20px auto;
			font-weight: bold;
    		font-size: 20px;
		}
	</style>
</head>
<body>
	<div id="container">
		<?php if(isset($ok))
		echo $ok; ?>
		<h1>
			<img src="img/invisible.png">
			amigo invisible
		</h1>
		<h2>Introduce el numero de integrantes</h2>
		<div class="numero">
			<input id="inputNum" type="number" placeholder="2" required>
			<br>
			<button id="num">Crear</button>
		</div>
		<button id="start" style="display:none">Volver a empezar</button>
		<div class="content" style="display:none">
			<form action="go.php" method="post" accept-charset="utf-8">
				<input id="numInt" type="hidden" name="num">
			</form>
		</div>
	</div>

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
	$(document).ready(function(){
		//nums
		var nums = $('#inputNum');
		$('#num').click(function(){
			$('#numInt').attr('value', nums.val());
			if(nums.val() == ''){
				alert("¡Rellena los campos!");
				return false;
			}
			if(nums.val() == 1){
				alert("¡Añade más de un integrante!");
				return false;
			}
			if(nums.val() >= 101){
				alert("No creo que tengas más de 100 amigos...");
				return false;
			}
			$('.numero').hide();
			$('h2').hide();
			$('#start').show();
			$('.content').show();
			//add to content
			for(var i=1;i<=nums.val();i++){
				$('.content form').append('<div class="inputs"><input name="input'+i+'-name" class="nom" type="text" placeholder="Nommbre '+i+'" required> &rarr; <input name="input'+i+'-mail" class="email" type="text" placeholder="@e-mail '+i+'" required></div>');
			}
			$('.content form').append('<input class="send" type="submit" value="enviar e-mail a todos">');
		});
		//restart
		$('#start').click(function(){
			location.reload();
		});
	});
</script>

</body>
</html>