<?php
// creates the edit record form
function renderForm($id, $firstname, $lastname, $phone, $email, $error) {
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Record</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
<?php
// if there are any errors, display them
if ($error != '') {
	echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?>

<div class="container">

<h1>Add or Edit a Record</h1>
<p>Do your worst.  Then Submit.</p>

<form action="" method="post">
	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="form-group">
		<strong>ID:</strong> <?php echo $id; ?><br>
	</div>
	<div class="form-group">
		<label for="firstname">First Name: *</label> <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $firstname; ?>"/>
	</div>
	<div class="form-group">
		<label for="lastname">Last Name: *</label> <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $lastname; ?>"/>
	</div>
	<div class="form-group">
		<label for="phone">Phone: *</label> <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $phone; ?>"/>
	</div>
	<div class="form-group">
		<label for="email">Email: *</label> <input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>"/>
	</div>
	<div class="form-group">* required</div>
	<input type="submit" name="submit" class="btn btn-primary" value="Submit">
</form>

<div>
	<br>
	<a href=".">Cancel</a>
</div>

</div><!-- .container -->
</body>
</html>
<?php
}
?>