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
				<a href="admindashboard.php"><i class="material-icons right">send</i></a>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Book Management</span>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Add Book</span>
				<a href="addbook.php"><i class="material-icons right">send</i></a>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Delete Book</span>
				<a href="deletebook.php"><i class="material-icons right">send</i></a>
			</div>
			<div class="card-panel amber">
				<span class="white-text">Logout</span>
				<a href="logout.php"><i class="material-icons right">send</i></a>
			</div>
		</div>
		<div class="col s12 m12 l8">
			<div class="card-panel teal">
				<span class="white-text">Books Avilable</span>
			</div>
			<table class="responsive-table bordered">
				<thead>
					<tr>
						<th>Book Id</th>
						<th>Book Title</th>
						<th>Author</th>
						<th>Publisher</th>
						<th>Category</th>
						<th>Copies Available</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require 'config.php';
					$query = "SELECT * FROM book";
					$result = mysql_query($query);
					while($row = mysql_fetch_array($result)){
						//Creates a loop to loop through results
						echo "<tr><td>".$row['book_id']."</td><td>".$row['book_title']."</td><td>".$row['author']."</td><td>".$row['publisher']."</td><td>".$row['category']."</td><td>".$row['copies']."</td></tr>";  //$row['index'] the index here is a field name
						}
					?>
				</tbody>
			</table>
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