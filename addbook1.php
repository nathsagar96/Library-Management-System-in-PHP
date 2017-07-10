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
			</div>
			<div class="card-panel amber">
				<span class="white-text">Issue Book</span>
				<a href="issuebook.php"><i class="material-icons right">send</i></a>
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
				<span class="white-text">Add Book</span>
			</div>
			<!-- Add New Book Form -->
			<div class="row">
				<form class="col s12" method="POST" action="addbook1.php">
					<div class="row">
						<div class="input-field col s12">
							<input id="booktitle" name="booktitle" type="text" class="validate" required="">
							<label for="booktitle">Book Title</label>
						</div>
						<div class="input-field col s12">
							<input id="author" name="author" type="text" class="validate" required="">
							<label for="author">Author</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="publisher" name="publisher" type="text" class="validate" required="">
							<label for="publisher">Publisher</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="copies" name="copies" type="number" class="validate" required="">
							<label for="copies">No. Of Copies Available</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input id="category" name="category" type="text" class="validate" required="">
							<label for="category">Category</label>
						</div>
					</div>
					<button type="submit" class="btn waves-effect waves-light" name="submit">Add Book</button>
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
if(isset($_POST['submit'])){
	$booktitle = $_POST['booktitle'];
	$author = $_POST['author'];
	$publisher = $_POST['publisher'];
	$copies = $_POST['copies'];
	$category = $_POST['category'];
	//Check if book is already present
	$query = "SELECT * FROM book WHERE book_title = '$booktitle'";
	$result = mysql_query($query);
	if (mysql_num_rows($result)==1) {
		$message = "Book Already Present.Try again.";
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else
	{
		//add book
		$add = "INSERT INTO book(book_title,author,publisher,category,copies) VALUES('$booktitle','$author','$publisher','$category',$copies)";
		$addresult = mysql_query($add);
		if ($addresult) {
			//success
			$message = "Book Added Successfully";
  			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else{
			//failure
			$message = "Book Not Added";
  			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
}
?>