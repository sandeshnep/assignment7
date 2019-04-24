<?php
    // 1. Create a database connection
    require_once("connect-db.php");

    // Required field names
    $required = array('firstName', 'lastName', 'email');

    // Loop over field names, make sure each one exists and is not empty
    $counter = 0;
    foreach($required as $field) {
    if (isset($_POST[$field])) {
        $counter = $counter + 1;
         
        }
    }

    if ($counter == 3) {
    
        // these are from the text INPUT fields...
        $firstName = Trim(stripslashes($_POST['firstName'])); 
        $lastName = Trim(stripslashes($_POST['lastName'])); 
        $email = Trim(stripslashes($_POST['email'])); 
        
        
        // You really should escape all strings
        $firstName = mysqli_real_escape_string($connection, $firstName);
        $lastName = mysqli_real_escape_string($connection, $lastName);
        $email = mysqli_real_escape_string($connection, $email);
        
        
        // 2. Perform database query
        $query  = "INSERT INTO subscribers (first_name, last_name, email) VALUES ('$firstName','$lastName','$email')";
        $result = mysqli_query($connection, $query);

    }

    
?>




<?php
    // 4. Step 4 is unnecessary here because we didn't 
    //    get data that needs to be released
    //mysqli_free_result($result);

    // 5. Close database connection
    mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment 06 | Thank You</title>
    <?php include 'include/html-links.inc'; ?>
</head>

<body>
  <?php include 'include/top-bar.inc'; ?>

    <main class="container white-background push-to-bottom">

        <h2>THANK YOU</h2>
        <div class="thank-you">
            You made the first step to a healthier future!

        </div>
        <div>
            In case you missed it, here are some of our other services!
        </div>    

        <div class = "learn-more">
        <a href="services.php">LEARN MORE</a>
        </div>

    </main>

    <?php include 'include/scripts.inc'; ?>
</body>

</html>