<?php 
	$servidor	= "localhost";
	$usuario 	= "root";
	$password	= "";
	$bd			= "academico";

	$conn= new mysqli($servidor,$usuario,$password,$bd);
	if($conn->connect_error){
		die("connection failed:".$conn->connect_error);
	}
	setlocale(LC_CTYPE, 'C');
	setlocale(LC_ALL,"es_PE");
	setlocale(LC_TIME, "spanish");
	date_default_timezone_set('America/Lima');

 ?>