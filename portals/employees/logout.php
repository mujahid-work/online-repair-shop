<?php
	session_start();

	unset($_SESSION['logged_in_id']);
	unset($_SESSION['logged_in_name']);
	unset($_SESSION['role']);
	unset($_SESSION['logged_in_email']);
	unset($_SESSION['logged_in_pic']);

	header("Location:../../index.php");

?>