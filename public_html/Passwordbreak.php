<?php
    error_reporting(0);
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    unset($_SESSION['type']);
    unset($_SESSION['email']);
    session_destroy();?>
    <script>
	    window.location.replace("login.php");
	</script>