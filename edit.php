<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$status = $_POST['status'];
		$sql = "UPDATE admin SET username = '$username', email = '$email', status = '$status' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Data updated successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating data';
		}
	}
	else{
		$_SESSION['error'] = 'Select data to edit first';
	}

	header('location: acc_list.php');

?>