<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "grabevent";

$connection = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if(!$connection)
//    echo "Connected";
//else
    die("Error" . mysqli_connect_error()); 

?>