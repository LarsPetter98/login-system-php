<?php

$db_server = "127.0.0.1";
$db_user = "root";
$db_password = "";
$db_name = "login-sample-db";

//Creates a connection to our db
if(!$connection = mysqli_connect($db_server, $db_user, $db_password, $db_name)) {
    die("Failed to connect");
};