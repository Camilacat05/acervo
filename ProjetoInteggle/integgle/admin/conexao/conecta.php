<?php
	try{
		$conexao = new PDO('mysql:host=localhost;dbname=integgle', 'integgle', 'kc2s^+U1');
		$conexao ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo 'ERROR: ' . $e->getMessage();
	}
?>