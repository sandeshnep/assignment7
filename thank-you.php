<?php
    // 1. Create a database connection
    require_once("include/connect-db.php");

    // Required field names
    $required = array('full_name', 'location', 'email', 'question1', 'question2', 'question3');

    // Loop over field names, make sure each one exists and is not empty
    foreach($required as $field) {
    if ($_POST[$field]=='') {
        //error reporting
        error_reporting(0); //Hide ugly wamp error for empty fields
        $error = 'ERROR: Please fill in all required fields!';
        }
    }

    // these are from the text INPUT fields...
    $full_name = Trim(stripslashes($_POST['fullname']));
    $location = Trim(stripslashes($_POST['location']));
    $email = Trim(stripslashes($_POST['email']));
    $q1 = Trim(stripslashes($_POST['question1']));
    $q2 = Trim(stripslashes($_POST['question2']));
    $q3 = Trim(stripslashes($_POST['question3']));


    // You really should escape all strings
    $full_name = mysqli_real_escape_string($connection, $full_name);
    $location = mysqli_real_escape_string($connection, $location);
    $email = mysqli_real_escape_string($connection, $email);
    $q1 = mysqli_real_escape_string($connection, $q1);
    $q2 = mysqli_real_escape_string($connection, $q2);
    $q3 = mysqli_real_escape_string($connection, $q3);


    // 2. Perform database query
    $query  = "INSERT INTO survey (full_name, location, email, question1, question2, question3) VALUES ('$full_name','$location','$email', '$q1', '$q2', '$q3')";
    $result = mysqli_query($connection, $query);
    if (!$result) {
      die('Invalid query: ' . mysql_error());
        }
?>




<?php
    // 4. Step 4 is unnecessary here because we didn't
    //    get data that needs to be released
    //mysqli_free_result($result);

    // 5. Close database connection
    mysqli_close($connection);
?>

<?php include 'include/header.inc'; ?>
<title>Assignment 07 | Thank You</title>
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
