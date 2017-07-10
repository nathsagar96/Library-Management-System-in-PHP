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
			</div>
			<div class="card-panel amber">
				<span class="white-text">Return Book</span>
				<a href="returnbook.php"><i class="material-icons right">send</i></a>
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
				<span class="white-text">Issue Book</span>
			</div>
			<form action="issuebook.php" method="POST">
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
				<label class="control-label" for="issuedate">Issue Date</label>
				<input type="date" class="datepicker" id="issuedate" name="issuedate" required="">
				<label class="control-label" for="returndate">Return Date</label>
				<input type="date" class="datepicker" id="returndate" name="returndate" required="">
				<button type="submit" class="btn waves-effect waves-light" name="submit">Issue Book</button>
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
	$issuedate = $_POST['issuedate'];
	$returndate = $_POST['returndate'];

	$query1 = "SELECT * FROM book WHERE book_id = '$bookid'";
	$result1 = mysql_query($query1);
	$row1 = mysql_fetch_array($result1);
	if ($row1['copies'] == 0) {
		$msg = "Book Out of Stock or Book Not Avilable";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		exit();
	}
	
	$query2 = "SELECT * FROM user where user_id = '$userid'";
	$result2 = mysql_query($query2);
	if (!$result2) {
		$msg = "User Does Not Exist";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		exit();
	}

	$f = "SELECT * FROM borrow where book_id ='$bookid' AND user_id = '$userid' AND status = 'pending'";
	$rf = mysql_query($f);
	$r = mysql_fetch_array($rf);
	if (mysql_num_rows($rf)==1) {
		$msg = "Book is already issued to user";
		echo "<script type='text/javascript'>alert('$msg');</script>";
	} else{
	$query3 = "INSERT INTO borrow(book_id,user_id,issue_date,return_date) VALUES('$bookid','$userid','$issuedate','$returndate')";
	$result3 = mysql_query($query3);
	if ($result3) {
		$msg = "Book Issued";
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	$copies = $row1['copies'];
	$query4 ="UPDATE book SET copies='".($copies-1)."' WHERE book_id = '$bookid'";
	$result4 = mysql_query($query4);
	}
}
?>