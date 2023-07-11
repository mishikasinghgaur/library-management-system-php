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
	<?php
    if (isset($_POST['submit'])) {
	    $query = $con->prepare("SELECT rollNo FROM member WHERE rollNo = ?");
	    $query->bind_param("s", $_POST['rollNo']);
	    $query->execute();
	    if (mysqli_num_rows($query->get_result()) != 0)
		    echo "The roll number you entered is already exist in the database", "rollNo";
	    else
		    $query = $con->prepare("INSERT INTO member(rollNo, username, password, name, email) VALUES(?, ?, ?, ?, ?);");
	    $query->bind_param("dssss", $_POST['rollNo'], $_POST['username'], $_POST['password'], $_POST['name'], $_POST['email']);
	    if ($query->execute())
		    echo "Details submitted, soon you'll will be notified after verifications!";
	    else
		    echo "Couldn\'t record details. Please try again later";
    }
    ?>

	<div>
		<a href="http://localhost/LibraryManagementSystem/member/index.php" style="text-align: center; padding:40%;">GO BACK TO LOGIN HOMEPAGE</a>
	</div>
</body>

</html>