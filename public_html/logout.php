<?php
    session_start();
	unset($_SESSION['id']);
	unset($_SESSION['name']);
	unset($_SESSION['type']);
	session_destroy();

	header("Refresh: 1, url=index.php")
?>