<?php 
	session_start();
	$db = mysqli_connect('localhost', 'manjith', '123456', 'crud');

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$edit_state = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		$query = "INSERT INTO info (name, address) VALUES ('$name', '$address')"; 
		mysqli_query($db, $query);
		$_SESSION['msg'] = "address saved"; 
		header('location: rate.php');
	}


	if (isset($_POST['update'])) {
		$name = mysqli_real_escape_string($_POST['name']);
		$address = mysqli_real_escape_string($_POST['address']);
		$id = mysqli_real_escape_string($_POST['id']);

		mysqli_query($db, "UPDATE info SET name='$name', address='$address' WHERE id=$id");
		$_SESSION['msg'] = "address update";
		header('location: rate.php');
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM info WHERE id=$id");
		$_SESSION['msg'] = "address deleted!"; 
		header('location: rate.php');
	}

	$result = mysqli_query($db, "SELECT * FROM info");



?>