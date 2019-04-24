<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>View Records</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
<?php
// connect to the database
include('connect-db.php');

// get results from database
$result = mysqli_query($connection, "SELECT * FROM rkostin_phonebook");
?>

<div class="container">

<div style="float: right; margin-top: 30px;">
<?php if(isset($_SESSION['username'])) { ?>
  <a href="logout.php">Logout of your User Account</a>
<?php } else { ?>
  <a href="login.php">Login to your User Account</a>
<?php } ?>
</div>

<h1>Phonebook Application</h1>
<p>Check it out.</p>

<table class="table table-striped table-bordered">
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Phone</th>
    <th>Email</th>
    <?php if(isset($_SESSION['username'])) { ?>
    <th colspan="2"><em>functions</em></th>
    <?php } ?>
  </tr>
<?php
// loop through results of database query, displaying them in the table
while($row = mysqli_fetch_array( $result )) {
?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['firstname']; ?></td>
    <td><?php echo $row['lastname']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['email']; ?></td>
<?php if(isset($_SESSION['username'])) { ?>
<td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
<td><a onclick="return confirm('Are you sure you want to delete ID: <?php echo $row["id"]; ?>?')" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
<?php } ?>
  </tr>
<?php
// close the loop
}
?>
</table>

<div>
  <br>
  <?php if(isset($_SESSION['username'])) { ?>
	  <a href="new.php">Add a new record</a>
  <?php } ?>
</div>

</div><!-- .container -->
</body>
</html>
<?php
  mysqli_free_result($result);
  mysqli_close($connection);
?>