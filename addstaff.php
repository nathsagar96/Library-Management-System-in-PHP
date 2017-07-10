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
		<!-- Navbar -->
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
			</div>
			<div class="card-panel amber">
				<span class="white-text">Delete Staff</span>
				<a href="deletestaff.php"><i class="material-icons right">send</i></a>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Logout</span>
				<a href="logout.php"><i class="material-icons right">send</i></a>
			</div>
		</div>
		<div class="col s12 m12 l8">
			<div class="card-panel teal">
				<span class="white-text">Add Staff</span>
			</div>
			<!-- Add New Staff Form -->
			<div class="row">
				<form class="col s12" method="POST" action="addstaff.php">
					<div class="row">
						<div class="input-field col s12">
							<input id="username" name="username" type="text" class="validate" required="">
							<label for="username">Username</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="password" name="password" type="text" class="validate" required="">
							<label for="password">Password</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="firstname" name="firstname" type="text" class="validate" required="">
							<label for="firstname">First Name</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="lastname" name="lastname" type="text" class="validate" required="">
							<label for="lastname">Last Name</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="designation" name="designation" type="text" class="validate" required="">
							<label for="designation">Designation</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="department" name="department" type="text" class="validate" required="">
							<label for="department">Department</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="mobile" name="mobile" type="text" class="validate" required="" maxlength="10" pattern="[0-9]{10}">
							<label for="mobile">Mobile</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="email" name="email" type="email" class="validate" required="">
							<label for="email">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="type" name="type" type="text" class="validate" required="">
							<label for="type">User Type(staff/librarian)</label>
						</div>
					</div>
					<button type="submit" class="btn waves-effect waves-light" name="submit">Add Staff</button>
				</form>
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
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$designation = $_POST['designation'];
	$department = $_POST['department'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$type =$_POST['type'];
	//creating new user
	$query1 = "INSERT INTO user(username,password,type) VALUES('$username','$password','$type')";
	$result1 = mysql_query($query1);
	//selecting userid of respective user
	$query2 = "SELECT * FROM user WHERE username= '$username'";
	$result2 = mysql_query($query2);
	$row = mysql_fetch_array($result2);
	//adding staff in staff table
	$query3 = "INSERT INTO staff(user_id,username,firstname,lastname,designation,department,mobile,email) VALUES('$row[user_id]','$row[username]','$firstname','$lastname','$designation','$department',$mobile,'$email')";
	$result3 = mysql_query($query3);
	if ($result1 && $result3) {
			//success
			$message = "Staff Added Successfully";
  			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else{
			//failure
			$message = "Staff Not Added";
  			echo "<script type='text/javascript'>alert('$message');</script>";
		}
}
?>