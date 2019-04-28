<?php
include 'connect-db.php';
if(isset($_POST["id"]))
{
 $query = "DELETE FROM survey WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connection, $query))
 {
  echo 'Data Deleted';
 }
}
?>
