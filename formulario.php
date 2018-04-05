<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
</head>
	<body>

	<div id="header">
		<div class="container">

	<?php require_once "Funciones/apply_filters.php"; ?>


	<?php
		for ($i=1; $i <4 ; $i++) { 
			if (ctype_alpha($_POST['t'.$i])) {
				$_POST['t'.$i];
			}
		}

		if (is_numeric($_POST['n1'])) {
			$_POST['n1'];
		}else{
			$_POST['n1']="";
		}

		$Asunto= trim($_POST['t3']);
		$Asunto= explode(" ", $_POST['t3']);
		$Longitud= count($Asunto);


	?>
			<div id="logo">
				<h1><a><?php 

					for ($i=0; $i < $Longitud ; $i++) { 
						if (ctype_alpha($Asunto[$i])) {
							echo $frase= $Asunto[$i]." ";
						}
					}
				
				 ?> </a></h1>

				<?php

					if (!empty($_POST['t3'])) {
						echo "<span>¡Envio exitoso!</span>";
					}else{
						echo "<span>¡Sin Asunto!</span>";
					}

				?>
				
			</div>

	</div>
		</div>

			
	<div id="main">
		<div class="container">
			<div class="newClass"><b><?php 

				if (!empty($_POST['t1'])) {
					//echo strtoupper($_POST['t1']." ");
					alphaSpace($_POST['t1']);

					if (!empty($_POST['t2'])) {
						alphaSpace($_POST['t2']);
					}
				}

				
				//include "Funciones/apply_filters.php";

				if (isset($_POST['e1']) && is_email($_POST['e1'])) {
					$correo= $_POST['e1']; 
					echo "<p class='email'><span>$correo</span></p>";
				}

				if (!empty($_POST['n1'])) {
					$celular= $_POST['n1'];
					echo "<p class='email'><span>$celular</span></p>";
				}

			?></b>
			</div>

			<div class="Mensaje">
				<?php
					if (!empty($_POST['txt1'])) {
						echo $_POST['txt1'];
					}
				?>
			</div>
		</div>
	</div>

	<div id="copyright">
			<div class="container">
				Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
			</div>
	</div>

	<!--Prueba de envio correo electronico-->
	<!--<?php  
		/*$destino= "serogra15121999@gmail.com";	
		$Asu= $Asunto;


		$MSM="
			Email: $_POST['e1']
			Mensaje: $_POST['txt1']
		";

		$headers= 'From:'.$_POST['e1']."\r\n".
		'Reply-To:'.$_POST['e1']."\r\n".
		'X-Mailer: PHP/'.phpversion();

		mail($destino, $Asu, $MSM, $headers);*/


	?>-->

</body>
</html>