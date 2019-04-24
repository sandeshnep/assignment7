<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

include('renderform.php');

// connect to the database
include('connect-db.php');

// check if the form (from renderform.php) has been submitted. If it has, process the form and save it to the database
if (isset($_POST['submit'])) {
	// confirm that the 'id' value is a valid integer before getting the form data
	if (is_numeric($_POST['id'])) {
		// get form data, making sure it is valid
		$id = $_POST['id'];
		$firstname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['firstname']));
		$lastname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['lastname']));
		$phone = mysqli_real_escape_string($connection, htmlspecialchars($_POST['phone']));
		$email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));

		// check that firstname/lastname fields are both filled in
		if ($firstname == '' || $lastname == '' || $phone == '' || $email == '') {
			// generate error message
			$error = 'ERROR: Please fill in all required fields!';

			//error, display form
			renderForm($id, $firstname, $lastname, $phone, $email, $error);

		} else {
			// save the data to the database
			$result = mysqli_query($connection, "UPDATE rkostin_phonebook SET firstname='$firstname', lastname='$lastname' , phone='$phone' , email='$email' WHERE id='$id'");

			// once saved, redirect back to the homepage page to view the results
			header("Location: indexlogin.php");
		}
	} else {
		// if the 'id' isn't valid, display an error
		echo 'Error!';
	}
} else {
	// if the form (from renderform.php) hasn't been submitted yet, get the data from the db and display the form
	// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
		// query db
		$id = $_GET['id'];
		$result = mysqli_query($connection, "SELECT * FROM rkostin_phonebook WHERE id=$id");
		$row = mysqli_fetch_array( $result );

		// check that the 'id' matches up with a row in the databse
		if($row) {
			// get data from db
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$phone = $row['phone'];
			$email = $row['email'];

			// show form
			renderForm($id, $firstname, $lastname, $phone, $email, '');
		} else {
			// if no match, display result
			echo "No results!";
		}
	} else {
		// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
		echo 'Error!';
	}
}
?>