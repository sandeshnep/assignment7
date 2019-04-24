<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

// connect to the database
include('connect-db.php');

// check if the 'id' variable is set in URL, and check that it is valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	// get id value
	$id = $_GET['id'];

	// delete the entry
	$result = mysqli_query($connection, "DELETE FROM rkostin_phonebook WHERE id=$id");

	// redirect back to the homepage to see the results
	header("Location: indexlogin.php");

} else {
	// if id isn't set, or isn't valid, redirect back to homepage
	header("Location: indexlogin.php");
}
?>