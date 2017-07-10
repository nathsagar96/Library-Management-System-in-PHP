<?php
require 'config.php';
session_start();
if (isset($_POST['submit'])) {
	$username = $_SESSION['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$designation = $_POST['designation'];
	$department = $_POST['department'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	//updation in user table
	$query1 = "UPDATE user SET password = '$password' WHERE username = '$username'";
	$result1 = mysql_query($query1);
	//updating staff in staff table
	$query2 = "UPDATE  staff SET firstname = '$firstname',lastname = '$lastname', designation = '$designation', department = '$department' , mobile = '$mobile', email = '$email' WHERE username = '$username'";
	$result2 = mysql_query($query2);
	if ($result1 && $result2) {
			//success
			$message = "Profile Updated Successfully";
  			echo "<script type='text/javascript'>alert('$message');</script>";
  			header("location:staffdashboard.php");
		}
		else{
			//failure
			$message = "Profile Not Updated";
  			echo "<script type='text/javascript'>alert('$message');</script>";
  			header("location:staffdashboard.php");
		}
}
?>