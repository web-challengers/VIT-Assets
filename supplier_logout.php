<?php
	session_start();
	if (!isset($_SESSION['name'])) {
		header("Location: ./login.php");
	}

		session_start();
		// session_unset();
		session_destroy();
	

		header('Location: ./supplier_login.php');
		// echo isset($_SESSION[''])
?>