<!DOCTYPE html>
<html>

<head>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
	<!--header -->
	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper">
				<a href="#" class="brand-logo center">Library Management System</a>
			</div>
		</nav>
	</div>
	<!-- Body -->
	<div class="row">
		<!-- Left Column -->
		<div class="col s12 l4 m4">
			<div class="card-panel teal">
				<span class="white-text">Login</span>
			</div>
			<!-- Login Form -->
			<form action="index.php" method="POST">
				<div class="input-field">
					<i class="material-icons prefix">perm_identity</i>
					<input id="username" name="username" type="text" class="validate" required>
					<label for="username">Username</label>
				</div>
				<div class="input-field">
					<i class="material-icons prefix">vpn_key</i>
					<input id="password" name="password" type="password" class="validate" required>
					<label for="password">Password</label>
				</div>
				<center><button class="btn waves-effect waves-light" type="submit" name="login">Login</button></center>
			</form>
			<div class="card">
				<div class="card-image">
					<img src="img/library2.jpg">
				</div>
			</div>
		</div>
		<!-- Right Column -->
		<div class="col s12 l8 m8">
			<div class="card">
				<div class="card-image">
					<img src="img/library1.jpg">
				</div>
			</div>
			<div class="card-panel teal">A library is a collection of sources of information and similar resources, made accessible to a defined community for reference or borrowing. It provides physical or digital access to material, and may be a physical building or room, or a virtual space, or both.A library's collection can include books, periodicals, newspapers, manuscripts, films, maps, prints, documents, microform, CDs, cassettes, videotapes, DVDs, Blu-ray Discs, e-books, audiobooks, databases, and other formats. Libraries range in size from a few shelves of books to several million items.
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="page-footer orange">
		<div class="footer-copyright">
			<div class="container">
				<center>Designed using <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a></center>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>

<?php 
require 'config.php';
if (isset($_POST['login'])){
	session_start();
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
	$result = mysql_query($query);
	if (mysql_num_rows($result)==1) {
		$row = mysql_fetch_array($result);
		switch ($row['type']) {
			case 'Admin':	header("location:admindashboard.php");
			$_SESSION['userid']=$row['user_id'];
			$_SESSION['username']=$row['username'];
			die();
			break;
			case 'Staff':	header("location:staffdashboard.php");
			$_SESSION['userid']=$row['user_id'];
			$_SESSION['username']=$row['username'];
			die();
			break;
			case 'Student':	header("location:studentdashboard.php");
			$_SESSION['userid']=$row['user_id'];
			$_SESSION['username']=$row['username'];
			die();
			break;
			case 'Librarian':	header("location:librariandashboard.php");
			$_SESSION['userid']=$row['user_id'];
			$_SESSION['username']=$row['username'];
			die();
			break;
		}
	}
	else
	{
		$error = "Your Login Name or Password is invalid";
		echo "<script type='text/javascript'>alert('$error');</script>";
	}
}
?>