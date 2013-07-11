<?php
	if(isset($_POST['valor'])){
		$valor = $_POST['valor'];
	
		// el valor se imprimirá en el div mensaje indicado en index.php
		echo $valor;
	}
?>