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
		<form id="form" method="post" action="procesa_3.php">
			Correo
			
			<!-- con el id obtenemos el valor -->
			<input type="text" name="correo" id="correo">
						
			<br><br>
			Nombre
			<input type="text" name="nombre" id="nombre">
			<br><br>
			
			
			<img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
            <br />
            <object type="application/x-shockwave-flash" data="securimage/securimage_play.swf?audio_file=securimage/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" width="30" height="30">
				<param name="movie" value="/securimage/securimage_play.swf?audio_file=/securimage/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" />
			</object>
            <a href="#" title="Cambiar imagen" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">[ Cambiar Imagen ]</a>
            <br /><br />
            <label for="captcha_code">Digite el texto de la imagen anterior<br>(No se distinguen mayúsculas y minúsculas) <span class="obligatorio">*</span></label>
            <br />
            <input type="text" name="captcha_code" id="captcha_code" size="10" maxlength="6" AUTOCOMPLETE=OFF />
            <br /><br />
			
			
			<input type="submit" value="Enviar" />
		</form>
		
		<!-- Acá se mostrará el mensaje -->
		<div id="respuesta"></div>
		
		<script>
			$('#form').submit(function(event){
				event.preventDefault();
				
				//almacenamos el valor del input en una variable
				var p_correo = $('#correo').val();
				var p_nombre = $('#nombre').val();
				var p_captcha = $('#captcha_code').val();
				
				$.post(
					
					//el archivo deber ser el mismo que en el action del formulario
					'procesa_3.php', {
										correo: 	p_correo,	// pasamos la variable 'correo' mediante post con el valor de la variable 'p_correo'
										nombre: 	p_nombre,
										captcha:	p_captcha
									}, 
					
					function(data){
						$('#respuesta').fadeIn('slow');		// un pequeño efecto
						$('#respuesta').html(data);			// borramos el contenido anterior y agregamos el nuevo mensaje
					});
				
			});
		</script>
	</body>
</html>