<?php
	
	error_reporting(error_reporting() & ~E_NOTICE);
	
	date_default_timezone_set('America/Sao_Paulo');	

	require_once "bd/bd.php";
	require_once "classes/user.php";
	require_once "classes/mercadorias.php";
		
?>