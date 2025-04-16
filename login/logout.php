<?php
session_start();
	if(isset($_SESSION['tipo_utente_agenzia'])) 
	{
		session_destroy();
		$_SESSION = array();
		header("Location: http://localhost/agenzia_immobiliare/index/index.html");
		exit();
	} 	
	else 
	{
		session_destroy();
		exit();
	}
?>