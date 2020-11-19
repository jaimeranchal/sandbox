<?php

//
if(isset($_POST)){
	//vars
	$num = $_POST['num'];
	//nombres
	for($i=1;$i<=$num;$i++){
		$nombres[] = $_POST['input'.$i.'-name'];
		$emails[] = $_POST['input'.$i.'-mail'];
	}

	$arrM = array();
	$arrN = array();

	for($j=0;$j<=$num-1;$j++){

		a:
		$randomMails = $emails[rand(0, $num-1)];
		$randomNames = $nombres[rand(0, $num-1)];

		if($emails[$j] != $randomMails && !in_array($randomMails, $arrM) && $nombres[$j] != $randomNames && !in_array($randomNames, $arrN)){
			//echo $emails[$j].' -> '.$randomNames.'<br>';
			//email
			$fecha = date('Y');
			$msn = "<html>
			<head>
			<link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet' type='text/css'>
			<style>
				img {
					width: 70%;
				}
				h1 {
					color: #333;
				}
				b {
					color: red;
				}
			</style>
			</head>
			<body>
			<img src='http://webcamp.es/ejemplos/invisible/img/top-logo.png'>
			<h1>Te ha tocado el/la: <b>".$randomNames."</b></h1>
			</body>
			</html>";
			$email = $emails[$j];
			$asunto = 'Amigo Invisible '.$fecha;
			$cabeceras = "From: info@webcamp.es\r\nContent-type: text/html\r\n";

			mail($email,$asunto,$msn,$cabeceras);
			//
			array_push($arrM, $randomMails);
			array_push($arrN, $randomNames);
		}else{
			goto a;
		}

	}
	header('Location:index.php?s=');

}

?>