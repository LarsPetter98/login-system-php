<?php
    session_start(); //In order to use the session object we have to run session_start.

    include("/Users/larspetterbo/Documents/PHP/login-system/connection.php"); //Importing connections.php
    include("/Users/larspetterbo/Documents/PHP/login-system/functions.php"); //Importing functions.php

    $user_data = check_login($connection); //Running the function that checks if user is logged in.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My website</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>This is the index page</h1>
    <br>
    <div>Hello <?php echo $user_data["user_name"]?></div> <!--Using php to print out the user's name-->
</body>
</html>