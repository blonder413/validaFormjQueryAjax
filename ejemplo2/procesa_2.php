<?php
	//print_r($_POST);exit;
	
	if (empty($_POST['nombre']))
		echo 'Ingrese su nombre - ';
	else
		echo 'su nombre es: ' . $_POST['nombre'] . ' - ';
	
	if (empty($_POST['correo']))
		echo 'Ingrese un correo';
	elseif (!filter_var($_POST['correo'],FILTER_VALIDATE_EMAIL))
		echo 'Ingrese un correo válido';
	else
		echo 'Felicidades, el correo es válido';
?>