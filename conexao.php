<?php
	//conexão com o banco de dados
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "hospinfo";

	$conn = new mysqli($host,$user,$pass,$db) or die($conn->error);

	?>