<?php
    session_start();
    include("/Users/larspetterbo/Documents/PHP/login-system/connection.php");
    include("/Users/larspetterbo/Documents/PHP/login-system/functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") { //Checks if post is sent
        $user_name = $_POST["user_name"]; //Saves the user name in variable
        $password = $_POST["password"]; //Saves the password in variable

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) { //Checks if they are not empty and not numeric
            //read from database
            $query = "SELECT * from users WHERE user_name = '$user_name' limit 1";// Selects all columns where user name match user name given. Limits to only 1 column retrieved

            $result = mysqli_query($connection, $query);//Fetcing the user from our db.

            if($result) {
                if($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result); //Fetching all data on our user from our db.

                    if($user_data["password"] == $password) { //Checks if passsword in db is same as password given.
                        $_SESSION["users_id"] = $user_data["users_id"];// Pass users_id to session object.
                        header("Location: homepage.php");//Redirects to homepage
                        die();//Ends and exit script.
                    }
                };
            }
            echo "Username or password is incorrect";
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
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="box">
        <form action="" method="post">
            <h2 id="header">Login</h2>
            <input id="text" type="text" name="user_name"><br><br>
            <input id="text" type="password" name="password"><br><br>
            <input id="button" type="submit" value="Login"><br><br>
            <a href="signup.php">Click to Signup</a><br><br>
        </form>
    </div>
</body>
</html>