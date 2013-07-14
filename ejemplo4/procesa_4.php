<?php
	require_once('recaptchalib.php');
	/*
	 * este sistema sólo se puede probar en un dominio
	 * obtenga acá sus llaves pública y privada
	 * https://www.google.com/recaptcha/admin/create
	 */
   	$privatekey = "your_private_key";
   	$resp = recaptcha_check_answer (
   									$privatekey,
                                	$_SERVER["REMOTE_ADDR"],
                                	$_POST["recaptcha_challenge_field"],
                                	$_POST["recaptcha_response_field"]
                                	);
	
	if (empty($_POST['nombre']))
		echo 'Ingrese su nombre - ';
	elseif (empty($_POST['correo']))
		echo 'Ingrese un correo - ';
	elseif (!filter_var($_POST['correo'],FILTER_VALIDATE_EMAIL))
		echo 'Ingrese un correo válido - ';
	elseif(empty($_POST['recaptcha_response_field']))
		echo 'Ingrese el reCAPTCHA';
	elseif (!$resp->is_valid)
		echo 'El reCAPTCHA es incorrecto. Por favor inténtelo de Nuevo.';
	else
		echo 'Todo OK';
?>