<?php
	require "../connect.php";
	require "../header.php";
?>

<html>
	<head>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="../css/common.css">
		<link rel="stylesheet" type="text/css" href="../css/form.css">
		<link rel="stylesheet" href="css/register_style.css">
	</head>
	<body>
		<form class="cd-form" method="POST" action="registerResult.php">
			<h1 style="text-align: center;">Member Registration</h1>
			    <div class="icon">
					<input class="m-name" type="text" name="rollNo" placeholder="Student ID" required />
				</div>

				<div class="icon">
					<input class="m-name" type="text" name="username" placeholder="Username" required />
				</div>

				<div class="icon">
					<input class="m-pass" type="password" name="password" id="password" placeholder="Password" required />
				</div>
				
				<div class="icon">
					<input class="m-user" type="text" name="name" id="name" placeholder="Full Name" required />
				</div>
				
				<div class="icon">
					<input class="m-email" type="email" name="email" placeholder="Email ID" required />
				</div>
				
				<br />
				<input type="submit" name="submit" value="Submit" />
		</form>
	</body>
	
	
	
</html>