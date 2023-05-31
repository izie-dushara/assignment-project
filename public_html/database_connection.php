<?php
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'website';

	$connection = mysqli_connect($hostname, $username, $password, $database);

	if($connection === false){
		die('Error connecting to database' .mysqli_connect_error());
	}
	