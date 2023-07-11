<?php
require "../connect.php";
require "identity_verification.php";
require "header.php";
?>

<html>

<head>
	<title>Library Management System</title>
	<link rel="stylesheet" type="text/css" href="../css/common.css" />
	<link rel="stylesheet" type="text/css" href="../css/form.css" />
	<link rel="stylesheet" type="text/css" href="css/home.css" />
	<style>
		body {
			margin: 0;
			padding: 0;
			background: url("C:/xampp/htdocs/LibraryManagementSystem/images/library.jpg");
			background-size: cover;
			background-position: center;
			font-family: sans-serif;
		}

		@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

		body {
			font-family: 'Poppins', sans-serif;
			background: #fafafa;
		}

		p {
			font-family: 'Poppins', sans-serif;
			font-size: 1.1em;
			font-weight: 300;
			line-height: 1.7em;
			color: #999;
		}

		a,
		a:hover,
		a:focus {
			color: inherit;
			text-decoration: none;
			transition: all 0.3s;
		}

		.navbar {
			padding: 15px 10px;
			background: #fff;
			border: none;
			border-radius: 0;
			margin-bottom: 40px;
			box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
		}

		.navbar-btn {
			box-shadow: none;
			outline: none !important;
			border: none;
		}

		.line {
			width: 100%;
			height: 1px;
			border-bottom: 1px dashed #ddd;
			margin: 40px 0;
		}

		.wrapper {
			display: flex;
			width: 100%;
			align-items: stretch;
		}

		#sidebar {
			min-width: 250px;
			max-width: 250px;
			background: #7386D5;
			color: #fff;
			transition: all 0.3s;
		}

		#sidebar.active {
			margin-left: -250px;
		}

		#sidebar .sidebar-header {
			padding: 20px;
			background: #6d7fcc;
		}

		#sidebar ul.components {
			padding: 20px 0;
			border-bottom: 1px solid #47748b;
		}

		#sidebar ul p {
			color: #fff;
			padding: 10px;
		}

		#sidebar ul li a {
			padding: 10px;
			font-size: 1.1em;
			display: block;
		}

		#sidebar ul li a:hover {
			color: #7386D5;
			background: #fff;
		}

		#sidebar ul li.active>a,
		a[aria-expanded="true"] {
			color: #fff;
			background: #6d7fcc;
		}

		a[data-toggle="collapse"] {
			position: relative;
		}

		.dropdown-toggle::after {
			display: block;
			position: absolute;
			top: 50%;
			right: 20px;
			transform: translateY(-50%);
		}

		ul ul a {
			font-size: 0.9em !important;
			padding-left: 30px !important;
			background: #6d7fcc;
		}

		ul.CTAs {
			padding: 20px;
		}

		ul.CTAs a {
			text-align: center;
			font-size: 0.9em !important;
			display: block;
			border-radius: 5px;
			margin-bottom: 5px;
		}

		a.download {
			background: #fff;
			color: #7386D5;
		}

		a.article,
		a.article:hover {
			background: #6d7fcc !important;
			color: #fff !important;
		}

		#content {
			width: 100%;
			padding: 20px;
			min-height: 100vh;
			transition: all 0.3s;
			text-align: -webkit-center;
		}

		@media (max-width: 768px) {
			#sidebar {
				margin-left: -250px;
			}

			#sidebar.active {
				margin-left: 0;
			}

			#sidebarCollapse span {
				display: none;
			}
		}
	</style>
</head>

<body>
	<div class="wrapper">

		<!-- Sidebar  -->
		<nav id="sidebar">
			<div class="sidebar-header">
				<h3>Welcome!</h3>
			</div>

			<ul class="list-unstyled components">
				<li class="active">
					<a href="http://localhost/LibraryManagementSystem/librarian/home.php">Add Books</a>
				</li>
				<li>
					<a href="http://localhost/LibraryManagementSystem/librarian/display.php">View Book Details</a>
				</li>
				<li>
					<a href="http://localhost/LibraryManagementSystem/librarian/update.php">Update Book Details</a>
				</li>
				<li>
					<a href="http://localhost/LibraryManagementSystem/librarian/remove.php">Remove Books</a>
				</li>
				<li>
				    <a href="../logout.php">Logout</a>
				</li>
			</ul>
		</nav>

		<!-- Page Content  -->
		<div id="content">
			<h3>Book details</h3>
			<?php
            $query = $con->prepare("SELECT * FROM book WHERE TITLE = ?");
            $query->bind_param("s", $_POST['title']);
            $query->execute();
            $result = $query->get_result();
            if (!$result)
	            die("ERROR: Couldn't fetch books");
            $rows = mysqli_num_rows($result);
            if ($rows == 0)
	            echo "<h2 align='center'>No books available</h2>";
            else {
	            echo "<form class='cd-form'>";
	            echo "<div class='error-message' id='error-message'>
						<p id='error'></p>
					</div>";
	            echo "<table width='100%' cellpadding=10 cellspacing=10>";
	            echo "<tr>
				
						<th>ISBN<hr></th>
						<th>Book Title<hr></th>
						<th>Author<hr></th>
						<th>Publisher<hr></th>
						<th>Price<hr></th>
                        <th>Quantity<hr></th>
					</tr>";
	            for ($i = 0; $i < $rows; $i++) {
		            $row = mysqli_fetch_array($result);
		            echo "<tr>
							";
		            for ($j = 0; $j < 6; $j++)
			            if ($j == 4)
				            echo "<td>Rs." . $row[$j] . "</td>";
			            else
				            echo "<td>" . $row[$j] . "</td>";

		            echo "</tr>";
	            }
	            echo "</table>";

	            echo "</form>";
            }
            ?>
		</div>
	</div>
</body>

</html>