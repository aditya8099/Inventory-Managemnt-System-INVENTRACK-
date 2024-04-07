<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = 'web';
$con = mysqli_connect($host, $user, $pass, $db);
if (!$con) {
    die('Database connection error: ' . mysqli_connect_error());
} else {
    echo "Connection established successfully";
}
?>
