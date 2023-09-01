<?php
    session_start();
    include("/Users/larspetterbo/Documents/PHP/login-system/connection.php");
    include("/Users/larspetterbo/Documents/PHP/login-system/functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") { //Checks if post is sent
        $user_name = $_POST["user_name"];//Saves the user name in variable
        $password = $_POST["password"];//Saves the password in variable

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) { //Checks if they are not empty and not numeric
            //save to database
            $users_id = random_int(5, 20); // Generating a random number to use as user_id
            $query = "insert into users (users_id, user_name, password) values ('$users_id', '$user_name', '$password')";

            mysqli_query($connection, $query);//Inserts users_id, user_name and password in our db

            header("Location: login.php");//Redirects to login page
            die();//Ends and exit script.
        }
        else {
            echo "Username or password is incorrect";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="box">
        <form action="" method="post">
            <h2 id="header">Signup</h2>
            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>
            <input id="button" type="submit" value="Signup"><br><br>
            <a href="login.php">Click to Login</a><br><br>
        </form>
    </div>
</body>
</html>