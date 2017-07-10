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
		<div class="col s12 l4 m12" >
			<div class="card-panel orange accent-3">
				<center><img class="circle responsive-img" src="img/usericon.png"></center>
				<div class="divider"></div>
				<span class="white-text"><center><h3>Welcome <?php session_start(); echo $_SESSION['username']; ?></h3></center></span>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Home</span>
				<a href="librariandashboard.php"><i class="material-icons right">send</i></a>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Search Book</span>
				<a href="searchbook.php"><i class="material-icons right">send</i></a>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Issue Book</span>
				<a href="issuebook.php"><i class="material-icons right">send</i></a>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Return Book</span>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Add Book</span>
				<a href="addbook1.php"><i class="material-icons right">send</i></a>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Logout</span>
				<a href="logout.php"><i class="material-icons right">send</i></a>
			</div>
		</div>
		<div class="col s12 m12 l8">
			<div class="card-panel teal">
				<span class="white-text">Return Book</span>
			</div>
			<form action="returnbook.php" method="POST">
				<div class="input-field"> 
					<div class="form-group">
						<label class="control-label" for="bookid">Book ID</label>
						<input type="text" class="form-control" id="bookid" name="bookid" required="">
					</div>
				</div>
				<div class="input-field"> 
					<div class="form-group">
						<label class="control-label" for="userid">User ID</label>
						<input type="text" class="form-control" id="userid" name="userid">
					</div>
				</div>
				<button type="submit" class="btn waves-effect waves-light" name="submit">Return Book</button>
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

if (isset($_POST['submit'])) {
	$bookid = $_POST['bookid'];
	$userid = $_POST['userid'];

	$sql = "SELECT * FROM book where book_id = '$bookid'";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	$copies = $row['copies'];

	$f = "SELECT * FROM borrow where book_id ='$bookid' AND user_id = '$userid' AND status = 'pending'";
	$rf = mysql_query($f);
	$r = mysql_fetch_array($rf);

	$now = strtotime(date("Y-m-d"));
	$return = strtotime($r['return_date']);
	$days = round(($now - $return)/86400);
	if ($days < 0) {
		$fine = 0 ;
	}
	else{
		$fine = 3*$days;
	}
	$returneddate = date('Y-m-d');

	$query = "UPDATE borrow SET status = 'returned',returned_on = '$returneddate', fine ='$fine' WHERE book_id = '$bookid' AND user_id = '$userid' AND status = 'pending'";
	$result = mysql_query($query);

	if ($result && $fine==0) {
		$update = "UPDATE book SET copies='".($copies+1)."' WHERE book_id = '$bookid'";
		$ures = mysql_query($update);
		$msg = "Book Successfully Returned";
		echo "<script type='text/javascript'>alert('$msg');</script>";
	} elseif ($fine>0) {
		$msg = "Collect Fine = ".$fine."rs";
		echo "<script type='text/javascript'>alert('$msg');</script>";
	} else{
		$msg = "Unable to return book";
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	}	
?>