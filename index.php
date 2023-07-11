<?php
	require "connect.php";
	require "header.php";
	session_start();
	
	if(empty($_SESSION['type']));
	else if(strcmp($_SESSION['type'], "admin") == 0)
		header("Location: librarian/home.php");
	else if(strcmp($_SESSION['type'], "student") == 0)
		header("Location: member/home.php");
?>

<html>
	<head>
		<title>Library Management System</title>
		<link rel="stylesheet" type="text/css" href="css/index.css" />
		<link rel="stylesheet" href="5.css" />
	</head>
	<body>
	    <div id="content">
			<div id="member">
				<a href="member" class="button" style="background-color: rgb(82, 82, 245)">STUDENT LOGIN</a>
			</div>
			<div id="verticalLine">
			<div id="librarian">
				<a id="librarian-link" href="librarian" class="button">ADMIN LOGIN</a>
			</div>
			</div>
		</div>
	</body>
</html>