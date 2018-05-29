<?php

	session_start();
	unset($_SESSION['id']);
	unset($_SESSION['user_type']);
	unset($_SESSION['username']);
	unset($_SESSION['password']);

	clearstatcache();

	session_unset();
	session_destroy();

	header("Location: ../login_admin.php"); 
    exit;
?>