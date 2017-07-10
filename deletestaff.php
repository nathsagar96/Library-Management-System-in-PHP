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
		<!-- Staff Manager -->
		<div class="col s12 l4 m12" >
			<div class="card-panel orange accent-3">
				<center><img class="circle responsive-img" src="img/usericon.png"></center>
				<div class="divider"></div>
				<span class="white-text"><center><h3>Welcome <?php session_start(); echo $_SESSION['username']; ?></h3></center></span>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Home</span>
				<a href="admindashboard.php"><i class="material-icons right">send</i></a>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Staff Management</span>
				<a href="staffmanager.php"><i class="material-icons right">send</i></a>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Add Staff</span>
				<a href="addstaff.php"><i class="material-icons right">send</i></a>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Delete Staff</span>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Logout</span>
				<a href="logout.php"><i class="material-icons right">send</i></a>
			</div>
		</div>
		<div class="col s12 m12 l8">
			<div class="card-panel teal">
				<span class="white-text">Delete Staff</span>
			</div>
			<form action="deletestaff.php" method="POST">
				<div class="input-field"> 
					<div class="form-group">
						<label class="username" for="username">Enter Staff Username</label>
						<input type="text" class="form-control" id="username" name="username" required="">
					</div>
				</div>
				<button type="submit" class="btn waves-effect waves-light" name="submit">Delete Staff</button>
			</form>
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

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$query = "DELETE FROM user WHERE username = '$username'";
	$result = mysql_query($query);
	if($result){
		//success
		$message = "Staff Deleted Successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else {
		//failure
		$message = "Couldn't delete staff";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}
?>