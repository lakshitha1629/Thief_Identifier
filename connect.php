<?php
// $hostname = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'provisio';

$hostname = 'us-cdbr-east-02.cleardb.com';
$username = 'bc6dc4cac25344';
$password = 'fbdaa639';
$dbname = 'heroku_a973c674fb547fe';

$con = new mysqli($hostname, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
