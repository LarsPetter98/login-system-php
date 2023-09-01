<?php
function check_login ($connection) {
    if(isset($_SESSION["users_id"])) { //isset checks if the value is declared and not null. Returns true if it is set
        $id = $_SESSION["users_id"];
        $query = "SELECT * FROM users WHERE users_id = '$id' LIMIT 1";

        $result = mysqli_query($connection, $query); //Retriving a column from mysql databse
        if($result && mysqli_num_rows($result) > 0) { //If result is positive and is bigger than 0
            $user_data = mysqli_fetch_assoc($result); //Fetching the associative array from the database
            return $user_data;
        };
    };
    // Redirect to login
    header("Location: login.php");
    die();

};

/* 
        Explained in simple steps
       ============================
    1. Checking if $_SESSION["user_id"] exist
    2. Checking if $_SESSION["user_id"] match a user_id in the databse
    3. Returning the user data
    4. It any of the steps don't succed, we redirect to login page 
*/















// $query explained:
// $query is a sql query string. This string retrieves all columns from the table users where the column
// user_id match the value inside $id. 
// select * from users: we retrieve all columns (*) from the table named users
// where user_id = '$id': This is a condition that filters the result. We check the user_id column against
// the the value inside $id.
// limit 1: This limits the result to only return one row.