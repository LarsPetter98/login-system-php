<?php
session_start(); //In order to use the session object we have to run session_start.

if(isset($_SESSION["users_id"])) { // If the users_id is set, aka we're logged in
    session_unset(); // then we unset the variables given to the session object.
}; // This will make the user logged out.

header("Location: login.php"); // we redirect to login page
die(); // and ends and exit the script