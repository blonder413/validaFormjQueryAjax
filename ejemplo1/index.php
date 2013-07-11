<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Validación de Formularios con Ajax</title>
		<meta charset='UTF-8' />
		
		<!-- llamamos la librería jquery -->
		<script src="jquery-1.10.2.js"></script>
		
	</head>
	<body>
		<form id="form" method="post" action="procesa.php">
			Valor<br>
			
			<!-- con el id obtenemos el valor -->
			<input type="text" name="valor" id="valor">
			
			<br><br>
			<input type="submit" value="Enviar" />
		</form>
		
		<!-- Acá se mostrará el mensaje -->
		<div id="mensaje"></div>
		
		<script>
			$('#form').submit(function(event){
				event.preventDefault();
				
				//almacenamos el valor del input en una variable
				var p_valor = $('#valor').val();
				
				$.post(
					
					//el archivo deber ser el mismo que en el action del formulario
					'procesa.php', {valor: p_valor },	// pasamos la variable 'valor' mediante post con el valor de la variable 'p_valor'
					
					function(data){
						$('#mensaje').fadeIn('slow');	// pequeño efecto
						$('#mensaje').append(data);		// agregamos el nuevo mensaje
					});
				
			});
		</script>
	</body>
</html>