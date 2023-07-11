<?php
require "../connect.php";
require "../logout2.php";
require "../header.php";
?>

<html>

<head>
	<title>LMS</title>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<link rel="stylesheet" type="text/css" href="../css/form.css">
	<link rel="stylesheet" type="text/css" href="css/index_style.css">
</head>

<body>
	<form class="cd-form" method="POST" action="#">

		<h1 style="text-align: center;">Member Login</h1>

		<div class="icon">
			<input type="text" name="username" placeholder="Username" required />
		</div>

		<div class="icon">
			<input type="password" name="password" placeholder="Password" required />
		</div>

		<input type="submit" value="Login" name="submit" />

		<br /><br /><br /><br/>

		<p style="text-align:center">Don't have an account? &nbsp;<a href="register.php" style="text-decoration:none; color:red;">Register Now!</a>

		<p style="text-align:center"><a href="../index.php" style="text-decoration:none;">Go Back to Homepage</a>
	</form>
</body>

<?php
    if (isset($_POST['submit'])) {
	    $query = $con->prepare("SELECT * FROM member WHERE username = ? AND password = ?;");
	    $query->bind_param("ss", $_POST['username'], $_POST['password']);
	    $query->execute();
	    $result = $query->get_result();

	    if (mysqli_num_rows($result) != 1)
		    echo "Invalid details or Account has not been activated yet!";
	    else {

		    $_SESSION['type'] = "member";
		    $_SESSION['id'] = $resultRow[0];
		    $_SESSION['username'] = $_POST['username'];
		    header('Location: home.php');
	    }
    }

    ?>

</html>