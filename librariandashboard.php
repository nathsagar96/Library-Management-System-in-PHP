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
				<span class="white-text">Issued Books</span>
			</div>
			<table class="responsive-table bordered">
				<thead>
					<tr>
						<th>Borrow Id</th>
						<th>Book Id</th>
						<th>Book Title</th>
						<th>Username</th>
						<th>Issue Date</th>
						<th>Return Date</th>
						<th>Returned On</th>
						<th>Status</th>
						<th>Fine</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require 'config.php';
					$query = "SELECT a.borrow_id, a.book_id, b.book_title, c.username, a.issue_date, a.return_date, a.returned_on, a.status, a.fine FROM borrow a INNER JOIN book b on a.book_id = b.book_id INNER JOIN user c on a.user_id = c.user_id ORDER BY return_date";
					$result = mysql_query($query);
					while($row = mysql_fetch_array($result)){
						//Creates a loop to loop through results
						echo "<tr><td>".$row['borrow_id']."</td><td>".$row['book_id']."</td><td>".$row['book_title']."</td><td>".$row['username']."</td><td>".$row['issue_date']."</td><td>".$row['return_date']."</td><td>".$row['returned_on']."</td><td>".$row['status']."</td><td>".$row['fine']."</td></tr>";
						//$row['index'] the index here is a field name
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