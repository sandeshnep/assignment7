<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment 07 | User Survey</title>
    <?php include 'include/html-links.inc'; ?>
</head>

<body>



    <?php include 'include/top-bar.inc'; ?>

    <main class="container white-background push-to-bottom">

        <h2>Please fill out this quick survey</h2>

        <div class="form-wrapper">
            <form method="POST" action="thank-you.php" class="form-grid">
                <label for="fullname">Full Name:</label>
                <input type="text" name="fullname" id="fullname" required placeholder="John">

                <label for="location">Location:</label>
                <input type="text" name="location" id="location" required placeholder="cityname">

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required placeholder="email@example.com">

                 <label for="question1">What type of motivation works for you? </label>
                <input type="text" name="question1" id="question1">

                <label for="question2">Are you driven by extrinsic motivation or intrinsic? </label>
                <input type="text" name="question2" id="question2">

                 <label for="question3">Do you think money motivates you more or internal happiness? </label>
                <input type="text" name="question3" id="question3">

                <input type="submit" value="Submit" class="submit-button">

            </form>


        </div>

    </main>

    <?php include 'include/scripts.inc'; ?>
</body>

</html>