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
				<span class="white-text">Search Book</span>
			</div>
			<h5>Search By Book Id</h5>
			<form action="searchbook.php" method="POST">
				<div class="input-field"> 
					<div class="form-group">
						<label class="control-label" for="bookid">Enter Book Id</label>
						<input type="text" class="form-control" id="bookid" name="bookid" required="">
					</div>
				</div>
				<button type="submit" class="btn" name="submit1">Search</button>
			</form>
			<h5>Search By Book Name</h5>
			<form action="searchbook.php" method="POST">
				<div class="input-field"> 
					<div class="form-group">
						<label class="control-label" for="bookname">Enter Book Name</label>
						<input type="text" class="form-control" id="bookname" name="bookname" required="">
					</div>
				</div>
				<button type="submit" class="btn" name="submit2">Search</button>
			</form>
			<?php
			require 'config.php';
			if (isset($_POST['submit1'])) {
				$bookid = $_POST['bookid'];
				
				$query1 = "SELECT * FROM book where book_id = $bookid";
				$result1 = mysql_query($query1);

				echo '<table class="responsive-table bordered">
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
				<tbody>';
				
				while($row1 = mysql_fetch_array($result1)){
						//Display the Result
						echo "<tr><td>".$row1['book_id']."</td><td>".$row1['book_title']."</td><td>".$row1['author']."</td><td>".$row1['publisher']."</td><td>".$row1['category']."</td><td>".$row1['copies']."</td></tr>";  //$row['index'] the index here is a field name
						}
				echo "</tbody></table>";
			}

			if (isset($_POST['submit2'])) {
				$booktitle = $_POST['bookname'];
				
				$query2 = "SELECT * FROM book where book_title = '$booktitle'";
				$result2 = mysql_query($query2);

				echo '<table class="responsive-table bordered">
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
				<tbody>';
				
				while($row2 = mysql_fetch_array($result2)){
						//Display the Result
						echo "<tr><td>".$row2['book_id']."</td><td>".$row2['book_title']."</td><td>".$row2['author']."</td><td>".$row2['publisher']."</td><td>".$row2['category']."</td><td>".$row2['copies']."</td></tr>";  //$row['index'] the index here is a field name
						}
				echo "</tbody></table>";
			}
			?>
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