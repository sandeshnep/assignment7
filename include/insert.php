
<?php
include 'connect-db.php';
if(isset($_POST["full_name"], $_POST["location"], $_POST["email"], $_POST["question1"], $_POST["question2"], $_POST["question3"]))
{
 $full_name = mysqli_real_escape_string($connection, $_POST["full_name"]);
 $location = mysqli_real_escape_string($connection, $_POST["location"]);
 $email = mysqli_real_escape_string($connection, $_POST["email"]);
 $question1 = mysqli_real_escape_string($connection, $_POST["question1"]);
 $question2 = mysqli_real_escape_string($connection, $_POST["question2"]);
 $question3 = mysqli_real_escape_string($connection, $_POST["question3"]);
 $query = "INSERT INTO survey (full_name, location, email, question1, question2, question3) VALUES('$full_name', '$location', '$email', '$question1', '$question2', '$question3')";
 if(mysqli_query($connection, $query))
 {
  echo 'Data Inserted';
 }
}
?>
