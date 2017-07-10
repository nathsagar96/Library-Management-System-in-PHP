<!DOCTYPE html>
<html>

<head>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
	<!--Header-->
	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper">
				<a href="#" class="brand-logo center">Library Management System</a>
			</div>
		</nav>
	</div>
	<!-- Body -->
	<div class="row">
		<!-- Staff Panel -->
		<div class="col s12 l4 m12" >
			<div class="card-panel orange accent-3">
				<center><img class="circle responsive-img" src="img/usericon.png"></center>
				<div class="divider"></div>
				<span class="white-text"><center><h3>Welcome <?php session_start(); echo $_SESSION['username']; ?></h3></center></span>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Profile</span>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Search Book</span>
				<a href="searchbook1.php"><i class="material-icons right">send</i></a>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Books Issue History</span>
				<a href="staffissuehistory.php"><i class="material-icons right">send</i></a>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Logout</span>
				<a href="logout.php"><i class="material-icons right">send</i></a>
			</div>
		</div>
		<div class="col s12 m12 l8">
			<div class="card-panel teal">
				<span class="white-text">Profile</span>
			</div>
			<?php
			require 'config.php';
			$username = $_SESSION['username'];

			$query = "SELECT a.username,a.password,b.firstname,b.lastname,b.designation,b.department,b.mobile,b.email FROM user a INNER JOIN staff b ON a.user_id = b.user_id WHERE a.username = '$username'";
			$result = mysql_query($query);
			$row = mysql_fetch_array($result);
			?>
			<form action="staffprofile.php" method="POST">
				<div class="input-field"> 
					<div class="form-group">
						<label class="control-label" for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username" value="<?php echo $row['username'];?>" disabled>
					</div>
				</div>
				<div class="input-field"> 
					<div class="form-group">
						<label class="control-label" for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password'];?>">
					</div>
				</div>
				<div class="input-field"> 
					<div class="form-group">
						<label class="control-label" for="firstname">First Name</label>
						<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['firstname'];?>">
					</div>
				</div>
				<div class="input-field"> 
					<div class="form-group">
						<label class="control-label" for="lastname">Last Name</label>
						<input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $row['lastname'];?>">
					</div>
				</div>
				<div class="input-field"> 
					<div class="form-group">
						<label class="control-label" for="designation">Designation</label>
						<input type="text" class="form-control" id="designation" name="designation" value="<?php echo $row['designation'];?>">
					</div>
				</div>
				<div class="input-field"> 
					<div class="form-group">
						<label class="control-label" for="department">Department</label>
						<input type="text" class="form-control" id="department" name="department" value="<?php echo $row['department'];?>">
					</div>
				</div>
				<div class="input-field"> 
					<div class="form-group">
						<label class="control-label" for="mobile">Mobile</label>
						<input type="number" class="form-control" id="mobile" name="mobile" pattern="[0-9]{10}" maxlength="10" value="<?php echo $row['mobile'];?>">
					</div>
				</div>
				<div class="input-field"> 
					<div class="form-group">
						<label class="control-label" for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'];?>">
					</div>
				</div>
				<button type="submit" class="btn waves-effect waves-light" name="submit">Update Profile</button>
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