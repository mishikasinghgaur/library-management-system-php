<?php
require "../connect.php";
require "../logout2.php";
require "../header.php";
?>

<html>

<head>
	<title>Library Management System</title>
	<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/form_styles.css">
	<link rel="stylesheet" type="text/css" href="css/index_style.css">
</head>

<body>
	<form class="cd-form" method="POST" action="#">

		<h2 style="text-align:center">Librarian Login</h2>

		<div class="icon">
			<input class="l-user" type="text" name="username" placeholder="Username" required />
		</div>

		<div class="icon">
			<input class="l-pass" type="password" name="password" placeholder="Password" required />
		</div>

		<input type="submit" value="Login" name="login" />
	</form>
	<p style="text-align:center"><a href="../index.php" style="text-decoration:none;">Return To Homepage</a>
</body>

<?php
if (isset($_POST['login'])) {
	$query = $con->prepare("SELECT id FROM librarian WHERE username = ? AND password = ?;");
	$query->bind_param("ss", $_POST['username'], sha1($_POST['password']));
	$query->execute();
	if (mysqli_num_rows($query->get_result()) != 1)
		echo error_without_field("Invalid username/password combination");
	else {
		$_SESSION['type'] = "librarian";
		$_SESSION['username'] = $_POST['l_user'];
		header('Location: home.php');
	}
}
?>

</html>