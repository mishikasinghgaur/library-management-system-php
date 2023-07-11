<?php
	session_start();	
	if(empty($_SESSION['type']));
	else if(strcmp($_SESSION['type'], "admin") == 0)
		header("Location: ../librarian/home.php");
	else if(strcmp($_SESSION['type'], "student") == 0)
		header("Location: ../member/home.php");
?>