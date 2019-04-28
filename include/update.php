<?php
include 'connect-db.php';

if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($connection, $_POST["value"]);
 $query = "UPDATE survey SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connection, $query))
 {
  echo 'Data Updated';
 }
}
?>
