<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Validación de Formularios con Ajax</title>
		<meta charset='UTF-8' />
		
		<!-- llamamos la librería jquery -->
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		
	</head>
	<body>
		<form id="form" method="post" action="procesa_4.php">
			Correo
			
			<!-- con el id obtenemos el valor -->
			<input type="text" name="correo" id="correo">
						
			<br><br>
			Nombre
			<input type="text" name="nombre" id="nombre">
			<br><br>
			
			<?php
				require_once('recaptchalib.php');
				/*
				 * este sistema sólo se puede probar en un dominio
				 * obtenga acá sus llaves pública y privada
				 * https://www.google.com/recaptcha/admin/create
				 */
   				$publickey = "your_public_key"; // you got this from the signup page
   				echo recaptcha_get_html($publickey);
   			?>
			
			<input type="submit" value="Enviar" />
		</form>
		
		<!-- Acá se mostrará el mensaje -->
		<div id="respuesta" style='display:none'></div>
		
		<script type="text/javascript">
			$('#form').submit(function(event){
				event.preventDefault();

				var p_correo					= $('#correo').val();
				var p_nombre					= $('#nombre').val();
				var p_captcha_code				= $('#captcha_code').val();
				var p_recaptcha					= $('#recaptcha_response_field').val();
				var p_recaptcha_challenge_field	= $('#recaptcha_challenge_field').val();
					
				$.post(
					'procesa_4.php',
					{
						correo:						p_correo,
						nombre: 					p_nombre,
						captcha_code:				p_captcha_code,
						recaptcha_response_field: 	p_recaptcha,
						recaptcha_challenge_field: 	p_recaptcha_challenge_field,
					},

					function(data){
						$('#respuesta').html(data);
						$('#respuesta').show('slow');
						//$('#respuesta').fadeToggle('slow');
					}
				);
			});
		</script>
	</body>
</html>