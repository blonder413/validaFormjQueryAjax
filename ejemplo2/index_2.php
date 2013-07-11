<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Validación de Formularios con Ajax</title>
		<meta charset='UTF-8' />
		
		<!-- llamamos la librería jquery -->
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		
	</head>
	<body>
		<form id="form" method="post" action="procesa_2.php">
			Correo
			
			<!-- con el id obtenemos el valor -->
			<input type="text" name="correo" id="correo">
						
			<br><br>
			Nombre
			<input type="text" name="nombre" id="nombre">
			<br><br>
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
				
				$.post(
					
					//el archivo deber ser el mismo que en el action del formulario
					'procesa_2.php', {correo: p_correo, nombre: p_nombre }, // pasamos la variable 'correo' mediante post con el valor de la variable 'p_correo'
					
					function(data){
						$('#respuesta').fadeIn('slow');		// un pequeño efecto
						$('#respuesta').html(data);			// borramos el contenido anterior y agregamos el nuevo mensaje
					});
				
			});
		</script>
	</body>
</html>