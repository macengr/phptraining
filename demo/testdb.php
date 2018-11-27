<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";

$dbName = "alphacrm";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


if ($conn) {
    echo "Good to go";
}

?>